<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $token
 * @property integer $status
 * @property string $createdAt
 */
class User extends CActiveRecord {

    public static $statuses = array(
        0 => 'Inactive',
        1 => 'Active'
    );

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'User';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, password', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('email', 'length', 'max' => 128),
            array('email', 'email'),
            array('email', 'unique'),
            array('password', 'length', 'max' => 256),
            array('salt, token', 'length', 'max' => 45),
            array('createdAt', 'date', 'format' => 'yyyy-M-d H:m:s'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, password, salt, token, status, createdAt', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'profile' => array(self::HAS_ONE, 'Profile', 'userID')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'salt' => 'Salt',
            'token' => 'Token',
            'status' => 'Status',
            'createdAt' => 'Created At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('token', $this->token, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('createdAt', $this->createdAt, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getStatusText() {
        return isset($this->status) ? self::$statuses[$this->status] : null;
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->salt = mt_rand(1000000000, 9999999999999);
            $this->token = mt_rand(1000000000, 9999999999999);
            $this->createdAt = new CDbExpression("NOW()");
            $this->password = self::hashPassword($this->password, $this->salt);
        }
        return parent::beforeSave();
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            $this->profile->userID = $this->id;
        }
        return parent::afterSave();
    }

    public static function hashPassword($password, $salt) {
        return sha1($salt . strlen($password) . $password);
    }

    public function register() {
        if ($this->save()) {
            $mail = new InternalMailQueue();
            $mail->setTemplate('Test Template');
            $mail->variables = array(
                'fullName' => $this->profile->fullName,
                'company' => "Test"
            );
            $mail->userID = $this->id;
            $mail->emailID = $this->email;
            $mail->subject = "User Registered, Verify Your Account.";
            return $mail->generateMail();
        }
        return false;
    }

}
