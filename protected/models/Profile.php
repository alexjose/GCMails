<?php

/**
 * This is the model class for table "Profile".
 *
 * The followings are the available columns in table 'Profile':
 * @property string $userID
 * @property string $firstName
 * @property string $lastName
 * @property string $timeZoneID
 * @property integer $countryID
 */
class Profile extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Profile';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userID, firstName, lastName', 'required'),
            array('countryID, timeZoneID', 'numerical', 'integerOnly' => true),
            array('userID', 'length', 'max' => 10),
            array('firstName, lastName', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('userID, firstName, lastName, timeZoneID, countryID', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::HAS_ONE, 'User', 'id'),
            'timeZone' => array(self::BELONGS_TO, 'TimeZone', 'timeZoneID'),
            'coutnry' => array(self::BELONGS_TO, 'Country', 'countryID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'userID' => 'User',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'timeZoneID' => 'Time Zone',
            'countryID' => 'Country',
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

        $criteria->compare('userID', $this->userID, true);
        $criteria->compare('firstName', $this->firstName, true);
        $criteria->compare('lastName', $this->lastName, true);
        $criteria->compare('timeZoneID', $this->timeZoneID, true);
        $criteria->compare('countryID', $this->countryID);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Profile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getFullName() {
        return $this->firstName . " " . $this->lastName;
    }

}
