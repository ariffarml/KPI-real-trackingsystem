<?php 

namespace app\controllers;

use Yii;
use app\models\AddActivity;
use app\models\Kpi_Insert;
use app\models\KPISearch;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


class ActivityController extends Controller {
   
    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /*public function actionView()
    {
        $searchModel = new KpiSearch(); // If you have a search model
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); // Or manually create a DataProvider

        return $this->render('kpi/view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } */

    public function actionCreate() {

        $dataProvider = new ActiveDataProvider([
            'query' => Kpi_Insert ::find(),
        ]);  //maybe can put to other function.
 
        //return "Hello world";
        $model = new AddActivity();

        //fetch kpi desc from kpi table
        $kpiDesc = Kpi_Insert::find()->select(['kpi_id', 'kpi_desc'])->asArray()->all();
        //convert data to format suitable for dropdown //list of kpi
        $kpiList = ArrayHelper::map($kpiDesc, 'kpi_id', 'kpi_desc');
        //year of existed kpi
        $kpiYear = Kpi_Insert::find()->select(['kpi_id', 'kpi_year'])->asArray()->all();
        $kpiYear = ArrayHelper::map($kpiYear, 'kpi_year','kpi_year');

        /*$kpis = Kpi_Insert::find()->orderBy(['kpi_number' => SORT_ASC])->all();
        $dropdownData = [];
        
        foreach ($kpis as $kpi) {
            $dropdownData[$kpi->kpi_number][] = $kpi->kpi_desc; 
            /*$kpiList = [];
            foreach ($kpi ->  as $kpi) {
                $kpiList[$kpi->kpi_id] = $kpi -> kpi_desc; 
            } 

            //$dropdownData[$kpi->kpi_id] = $kpiList; 
        } 
        */
        if ($model->load(Yii::$app->request->post())){

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $model->datetime = date('Y-m-d H:i:s');

            /*echo '<pre>';
            print_r($model);
            exit;*/

        if ($model->validate()) 
        {
            if ($model -> save()) {
                Yii::$app->session->setFlash('success', 'Activity successfully added');
                return $this->redirect(['subactivity/show']);
            
            } else {
                Yii::$app->session->setFlash('error', 'Failed to save activity. Try again.');

            }
        } else {
            Yii::$app->session->setFlash('error', 'Validation failed. Errors: ' . json_encode($model->errors));
        }

    }

        return $this -> render('/activity/activityform', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            //'kpiList' => $kpiList,
            'kpiList' => $kpiList,
            'kpiYear' => $kpiYear,
            //'dropdownData' => $dropdownData,
            //'kpis' => $kpis,
        ]);
    }

    public function actionGetYearByKpi($id){

        //fetch the subactivity along w the related detail
        $kpi = Kpi_Insert::findOne($id);
        if ($kpi) {
            return $this->asJson(['kpi_year' => $kpi->kpi_year]);
        }  else {
            return $this->asJson(['kpi_year' => null]);
        }

        //fetch kpi for that subactivity
        /*$kpi = AddActivity::find()
        ->with('KpiDescription')
        ->hasOne(); */

        /*if ($kpi) {

            // Data was retrieved
            var_dump($subactivity->attributes);
            var_dump($subactivity->activity->attributes);
            
            return $this->asJson([
                //'subdesc' =>$subactivity -> subactivity_desc,
                'kpiyear' => $kpi->kpi_year,
                //'kpitarget' => $subactivity->KPI_target,
                //'activitydesc' => $subactivity->activity->activity_desc,
                'kpidesc'=>$kpi->kpi_desc,
            ]) ;
        } else {
            return $this-> asJson([
                'error' => 'Related activity not found'
            ]);
        }*/
    }
    

}

?>
