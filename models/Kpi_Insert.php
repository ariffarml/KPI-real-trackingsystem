<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use mdm\autonumber\Behavior;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/*this model is used for K1KPI insert table*/
/* @property string $id
* @property string $kpi_id
* @property int $kpi_number
* @property string $kpi_desc
* @property string $kpi_year
* @property string $datetime 
*/
class Kpi_Insert extends ActiveRecord {
    
    public static function tableName()
    {
        return 'K1KPI_insert';
        
    }

    //kiv first autonumber
    /*public function behaviors()
    { [];
        return[
            TimestampBehavior::className(),
            /*[
                'class' => 'mdm\autonumber\Behavior',
                'attribute' =>'kpi_id',
                'value' => 'KPI/SAD 00' . date('Y') . '/' . date('M') .'/?',
                'digit' => 5,
            ],
        ];  
    }*/

    public function rules()
    {
        return [
            [['kpi_number', 'kpi_desc', 'kpi_year'], 'required'],
            [['id'], 'integer'],
            [['kpi_year','datetime'], 'safe'],
            [['kpi_desc'], 'string', 'max'=>255],
            [['kpi_id'], 'unique'],
            [['kpi_id', 'kpi_number'],'string', 'max' => 100]
        ];


    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_id' => 'KPI ID',
            'kpi_number' => 'KPI Number', 
            'kpi_desc' => 'KPI Description',
            'kpi_year' => 'KPI Year',
            'datetime' => 'Date and Time',
        ];
    }

    /*public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->kpi_id = Yii::$app->security->generateRandomString(8);
            }
            return true;
        }
        return false;
    } */

    //function after added at controller to fetch kpi description data from
   public function getActivities(){
    return $this->hasMany(AddActivity::class, ['KPI_id'=>'kpi_id']);
   }
   


}

?>