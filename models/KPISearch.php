<?php
namespace app\models;

use Yii;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\Kpi_Insert;

//for searching KPI by year

class KPISearch extends Kpi_Insert
{
    public function rules(){
        return [
            [['id','kpi_id', 'kpi_desc', 'kpi_year', 'datetime'], 'required'],
            [['id'], 'integer'],
            [['datetime'], 'safe'],
            [['kpi_desc'], 'string', 'max'=>255],
        ];
    }

    public function search($params)
    {
        $query = UpdateProgress::find();

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            //if validation fails, return all records
            return $dataProvider;
        }

        //filter conditions
        $query->andFilterWhere([
            'detail_id' => $this->id,
            'kpi_year' => $this ->kpi_year,
        ]);

        $query-> andFilterWhere(['like', 'kpi_id', $this->kpi_id]);
              //-> andFilterWhere(['like', 'kpi_desc', $this ->kpi_desc])
              //-> andFilterWhere(['like', 'datetime', $this ->datetime]);
    
        return $dataProvider;
    }
}
?>