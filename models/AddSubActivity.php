<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%K3KPI_subactivity}}".
 *
 * @property int $id
 * @property string $activity_id
 * @property string $subactivity_id
 * @property string $subactivity_desc
 * @property int $KPI_target
 * @property string $PIC
 * @property string $datetime
 *
 * @property K2KPIActivity $activity
 * @property K4KPIDetail $k4KPIDetail
 */
class AddSubActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%K3KPI_subactivity}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id','subactivity_desc','subactivity_number', 'KPI_target', 'PIC', 'kpi_year', 'datetime'], 'required'],
            [['KPI_target', 'subactivity_number'], 'integer'],
            [['subactivity_number'], 'number'],
            [['kpi_year','datetime'], 'safe'],
            [['activity_id', 'subactivity_id'], 'string', 'max' => 100],
            [['PIC'], 'string', 'max' => 100],
            [['PIC'], 'safe'],
            [['subactivity_desc'], 'string', 'max' => 255],
            [['subactivity_id'], 'unique'],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddActivity::class, 'targetAttribute' => ['activity_id' => 'activity_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' => 'Activity Description',
            'subactivity_id' => 'Subactivity ID',
            'subactivity_desc' => 'Subactivity Description',
            'KPI_target' => 'KPI Target',
            'PIC' => 'PIC',
            'kpi_year' => 'KPI Year',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * Gets query for [[Activity]].
     *
     * @return \yii\db\ActiveQuery|K2KPIActivityQuery
     */
    public function getActivity()
    {
        return $this->hasOne(AddActivity::class, ['activity_id' => 'activity_id']);
    }

    //to retrive year from subactivity table 
    public static function getYearsSub(){
        return AddSubActivity::find()
        ->select('kpi_year')
        ->distinct()
        ->orderBy('kpi_year')
        ->column(); //return array of years
    }

    public static function getSubActDesc(){
        
        $subActivities = AddSubActivity::find()
        ->select('subactivity_id','subactivity_desc')
        ->distinct()
        ->indexBy('subactivity_id')
        ->asArray()  //to return string
        ->all();

        return ArrayHelper::map($subActivities, 'subactivity_desc', 'subactivity_id'); //remark: in the () the second place is for what you want the user to see in this case, the subactivity desc.

    }

    /**
     * Gets query for [[K4KPIDetail]].
     *
     * @return \yii\db\ActiveQuery|K4KPIDetailQuery
     */
    /*public function getK4KPIDetail()
    {
        return $this->hasOne(K4KPIDetail::class, ['subactivity_id' => 'subactivity_id']);
    } */

    /**
     * {@inheritdoc}
     * @return AddSubactivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddSubactivityQuery(get_called_class());
    }
}
