<?php

/**
 * This is the model class for table "Country".
 *
 * The followings are the available columns in table 'Country':
 * @property string $id
 * @property string $name
 * @property integer $timeZoneID
 * @property integer $status
 * 
 */
class Country extends CActiveRecord {

    public static $statuses = array(
        0 => 'Inactive',
        1 => 'Active'
    );

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Country';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('status, timeZoneID', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, status, timeZoneID', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'profiles' => array(self::HAS_MANY, 'Profile', 'countryID'),
            'users' => array(self::HAS_MANY, 'User', array('userID' => 'id'), 'through' => 'profiles'),
            'userCount' => array(self::STAT, 'Profile', 'countryID'),
            'timeZone' => array(self::BELONGS_TO, 'TimeZone', 'timeZoneID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'timeZoneID' => 'Time Zone'
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('timeZoneID', $this->timeZoneID);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Country the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function scopes() {
        return array(
            'active' => array(
                'condition' => 'status = 1'
            ),
        );
    }

    public function getStatusText() {
        return isset($this->status) ? self::$statuses[$this->status] : null;
    }

}
