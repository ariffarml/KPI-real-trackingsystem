<?php 

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%K4KPI_detail}}".
 *
 * @property string $detail_id
 * @property string $subactivity_id
 * @property string $subactivity_desc
 * @property string $kpi_year
 * @property string $kpi_desc
 * @property string $activity_desc
 * @property string $month
 * @property int $kpi_target
 * @property int $progress
 * @property string $notes
 * @property string $update_date
 *
 * @property K3KPISubactivity $subactivity
 */

class UpdateProgress extends ActiveRecord {

    public static function tableName()
    {
        return '{{%K4KPI_detail}}';
    }

    public function rules(){
        return [
            [['subactivity_id', 'subactivity_desc', 'kpi_year', 'kpi_desc', 'activity_desc', 'month', 'kpi_target', 'progress', 'notes', 'update_date'], 'required'],
            [['kpi_year', 'update_date'], 'safe'],
            [['kpi_target', 'progress'], 'integer'],
            [['id','detail_id', 'subactivity_id', 'month'], 'string', 'max' => 100],
            [['subactivity_desc', 'kpi_desc', 'activity_desc', 'notes'], 'string', 'max' => 255],
            [['subactivity_id'], 'unique'],
            [['detail_id'], 'unique'],
            [['subactivity_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddSubactivity::class, 'targetAttribute' => ['subactivity_id' => 'subactivity_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'detail_id' => 'Detail ID',
            'subactivity_id' => 'Subactivity Description',
            'subactivity_desc' => 'Subactivity Description',
            'kpi_year' => 'KPI Year',
            'kpi_desc' => 'KPI Description',
            'activity_desc' => 'Activity Description',
            'month' => 'Month',
            'kpi_target' => 'KPI Target',
            'progress' => 'Progress',
            'notes' => 'Notes',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * Gets query for [[Subactivity]].
     *
     * @return \yii\db\ActiveQuery|K3KPISubactivityQuery
     */

    public function getActivity() //get activity for subact
    {
        return $this->hasOne(AddActivity::class, ['subactivity_id' => 'activity_id']);
    }

    public function getKpi() {
        return $this->hasOne(AddActivity::class, ['kpi_desc'=> 'KPI_id']);
    }

    public function getMonth() {
        return $this->hasMany(Kpi_month::class, ['month' => 'month']); //try to establish relationship w month table.
    }

    /* can delete later
    public function getYearTableSub() {
        return $this->hasmany(AddSubActivity::class, ['kpi_year'=>'kpi_year']);
    } */

    /**
     * {@inheritdoc}
     * @return UpdateProgressQuery the active query used by this AR class.
     */
    /*public static function find()
    {
        return new UpdateProgressQuery(get_called_class());
    } */



}
?>