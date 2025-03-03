<?php

namespace app\models;

use Yii;
use app\models\Kpi_Insert;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%K2KPI_activity}}".
 *
 * @property int $id
 * @property string $KPI_id
 * @property string $activity_id
 * @property string $activity_desc
 * @property string $datetime
 *
 * @property K3KPISubactivity $k3KPISubactivity
 * @property K1KPIInsert $kPI
 */
class AddActivity extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%K2KPI_activity}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KPI_id','activity_number' ,'activity_desc', 'kpi_year', 'datetime'], 'required'],
            [['kpi_year', 'datetime'], 'safe'],
            [['activity_number'], 'number'],
            [['KPI_id', 'activity_id'], 'string', 'max' => 100],
            [['activity_desc'], 'string', 'max' => 255],
            [['activity_id'], 'unique'],
            [['KPI_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kpi_Insert::class, 'targetAttribute' => ['KPI_id' => 'kpi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'KPI_id' => 'KPI Description',
            'activity_id' => 'Activity ID',
            'activity_number' => 'Activity Number',
            'activity_desc' => 'Activity Description',
            'kpi_year' => 'KPI Year',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * Gets query for [[K3KPISubactivity]].
     *
     * @return \yii\db\ActiveQuery|\app\models\Kpi_Insert\K3KPISubactivityQuery
     */
    public function getSubactivities() //establish relationship 1 act can have many subact
    {
        return $this->hasMany(AddSubActivity::class, ['activity_id' => 'activity_id']); //from column in Subactivity table to column in this model (what it refers to?) //they share the same values
    }

    public function getkpis() {
        return $this->hasOne(Kpi_Insert::class, ['kpi_id' =>'KPI_id']);
    }

    /*public function getKpi(){
        return $this->hasOne(Kpi_Insert::class,['kpi_id' =>'KPI_id']);
    }*/

    /**
     * Gets query for [[KPI]].
     *
     * @return \yii\db\ActiveQuery|\app\models\Kpi_Insert\K1KPIInsertQuery
     */
    public function getKpi()
    {
        return $this->hasOne(Kpi_Insert::class, ['kpi_id' => 'KPI_id']); //from table K1 to table K2
    }

    public function getActivityId() {
        return $this->hasMany(Kpi_Insert::class, ['kpi_id' => 'activity_id']);
    }

    public function getKpiYear() {
        return $this->hasMany(Kpi_Insert::class, ['kpi_year' => 'kpi_year']);
        //return $this->hasMany(Kpi_Insert::class, ['kpi_year'=> 'kpi_id']);
    }
    //return $this->hasOne(Kpi_Insert::class, ['kpi_year' => 'kpi_year']);

    /**
     * {@inheritdoc}
     * @return \app\models\Kpi_Insert\AddActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Kpi_Insert\AddActivityQuery(get_called_class());
    }
}
