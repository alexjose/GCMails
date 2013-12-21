<?php

/**
 * This is the model class for table "InternalMailQueue".
 *
 * The followings are the available columns in table 'InternalMailQueue':
 * @property string $id
 * @property integer $userID
 * @property integer $templateID
 * @property string $emailID
 * @property string $subject
 * @property string $body
 * @property integer $status
 * @property string $createdAt
 * @property string $lastAttempt
 */
class InternalMailQueue extends CActiveRecord {

    public $variables = array();

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'InternalMailQueue';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userID, templateID, emailID, subject, body', 'required'),
            array('userID, templateID, status', 'numerical', 'integerOnly' => true),
            array('emailID', 'length', 'max' => 128),
            array('subject', 'length', 'max' => 256),
            array('lastAttempt', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, userID, templateID, emailID, subject, body, status, createdAt, lastAttempt', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'template' => array(self::BELONGS_TO, 'InternalMailTemplate', 'templateID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'userID' => 'User',
            'templateID' => 'Template',
            'emailID' => 'Email',
            'subject' => 'Subject',
            'body' => 'Body',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'lastAttempt' => 'Last Attempt',
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
        $criteria->compare('userID', $this->userID);
        $criteria->compare('templateID', $this->templateID);
        $criteria->compare('emailID', $this->emailID, true);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('createdAt', $this->createdAt, true);
        $criteria->compare('lastAttempt', $this->lastAttempt, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return InternalMailQueue the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function setTemplate($name) {
        $this->templateID = InternalMailTemplate::model()->findByName($name)->id;
        if ($this->templateID) {
            return true;
        } else {
            return false;
        }
    }

    public function generateMail() {
        $this->body = self::replaceVariables($this->template->template, $this->variables);
        return $this->save();
    }

    protected function replaceVariables($body, $variables) {
        foreach ($variables as $key => $value) {
            $body = str_replace("{@" . $key . "}", $value, $body);
        }
        return $body;
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->createdAt = new CDbExpression("NOW()");
        }
        return parent::beforeSave();
    }

}
