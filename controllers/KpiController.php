<?php

namespace app\controllers;

use app\models\AddActivity;
use app\models\Kpi_Insert;
use Yii;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\KPIDetail;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class KpiController extends Controller{

    public function behaviors()
    {
        //restrict delete function to only post request -security
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    //test
    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Kpi_Insert::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($kpi_id){
        return $this -> render('view', [
            'model' => $this->findModel($kpi_id),
        ]);

    }

    //not needed bcs already defined in SiteController
    /*public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => KPIDetail::find(), //query table from kpi_detail

        ]);

        return $this -> render ('options', [
            'dataProvider' => $dataProvider,
        ]);
    } */


    //for opening KPI_insert form
    public function actionCreate() {
        //echo "Hello World";
    
        $model = new Kpi_Insert(); //for kpi
    
        if ($model->load(Yii::$app->request->post())){
            /*echo '<pre>';
            print_r($model);
            exit;*/

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $model->datetime = date('Y-m-d H:i:s');

            //to test output
            /*if (Yii::$app->request->post()) {
                print_r(Yii::$app->request->post());
                exit; // Temporarily stop execution to inspect the posted data
            } */

            if ($model->validate()) {
                if ($model -> save()) {
                    Yii::$app->session->setFlash('success', 'Done! KPI successfully saved.');
                    return $this ->redirect(['activity/create']);
                
                }else {
                    Yii::$app->session->setFlash('error', 'Failed to save KPI. Errors: ' . json_encode($model->errors));
                }
            } else {
                Yii::$app->session->setFlash('error', 'Validation failed. Errors: ' . json_encode($model->errors));
            }

        }

        return $this ->render ('create', [
            'model'=> $model,
            
        ]);
    }


    public function actionUpdate($kpi_id) {
        $model = $this->findModel($kpi_id);

        if (!$model) {
            Yii::error('Model not found for kpi_id: ' . $kpi_id);
        }

        if ($this->request->isPost) {

            if (Yii::$app->request->post('save-button') && $model->load($this->request->post())) {

            } if($model->validate()) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'KPI successfully updated.');
                    return $this->redirect (['view', 'kpi_id' =>$model->kpi_id]);
                }else {
                    Yii::$app->session->setFlash('error', 'Failed to save KPI. Errors: ' . json_encode($model->errors));
                }
                
            }else {
                Yii::$app->session->setFlash('error', 'Validation failed. Errors: ' . json_encode($model->errors));
            }
        }
        return $this -> render('update', [ //in kpi's view
            'model' => $model,
        ]);
    } 


    public function actionDelete($kpi_id){
        $this->findModel($kpi_id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($kpi_id) {
        if (($model = Kpi_Insert::findOne(['kpi_id' => $kpi_id])) !== null) {
            return $model;
        }
        else {
            return ("The requested page does not exist.");
        }
    
    }


    //this is from model gii
    /*public function actionInsertkpiform()
    {
        $model = new \app\models\InsertKpi();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model -> save()) {
                    Yii::$app->session->setFlash('success', 'KPI successfully saved.');
                    return $this ->redirect(['site/options']);
                
                }else {
                    Yii::$app->session->setFlash('error', 'Failed to save KPI.');
                }
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('_insertkpiform', [
            'model' => $model,
        ]);
    } */



}
?>