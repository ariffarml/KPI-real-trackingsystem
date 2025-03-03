<?php

namespace app\controllers;

use Yii;
use app\models\AddActivity;
use app\models\AddSubActivity;
use app\models\Kpi_Insert;
use app\models\SADStaff;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class SubactivityController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionShow() {
        //return "Hello world";

        $model = new AddSubActivity();

        //fetch act desc
        $actDesc = AddActivity::find()->select(['activity_id', 'activity_desc'])->asArray()->all();
        $actDesc = ArrayHelper::map($actDesc, 'activity_id', 'activity_desc');

        $kpiYear = AddActivity::find()->select(['activity_id', 'kpi_year'])->asArray()->all();
        $kpiYear = ArrayHelper::map($kpiYear, 'kpi_year', 'kpi_year');

        $officers = SADStaff::find()->select(['id','staff_name'])->asArray()->all();
        $list = ArrayHelper::map($officers,'staff_name','staff_name');

        if ($model->load(Yii::$app->request->post())) {

            date_default_timezone_set('Asia/Kuala_Lumpur');
            $model->datetime = date('Y-m-d H:i:s');

            $picNames = Yii::$app->request->post('PIC') ?? [];
            
            if(is_array($picNames)) {
                $model->PIC = implode(", ", $picNames);
                
            }

            /*echo '<pre>';
            var_dump(Yii::$app->request->post());
            //var_dump($model ->PIC);
            echo '</pre>';
            exit; */

            if ($model->validate()) {

                if ($model ->save()) {
                    Yii::$app->session->setFlash('success', 'Sub-Activity successfully added');
                    return $this->redirect(['site/options']);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save subactivity. Try again.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Validation failed. Errors: ' . json_encode($model->errors));
            }
        }

        return $this -> render ('subactform', [
            'model' => $model,
            //'dataProviderKpi' => $dataProviderKpi,
            //'dataProviderAct' => $dataProviderActivity,
            'kpiYear' => $kpiYear,
            'actDesc' => $actDesc,
            'officers' => $officers,
            'list' => $list,
        ]);

    }

    public function actionUpdate($subactivity_id){
        $model = $this->findModel($subactivity_id);

        if ($model -> load(Yii::$app->request->post())) {
            
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $model->datetime = date('Y-m-d H:i:s');

            if (is_array($model -> PIC)) //check whether the PIC value is array or not
            { 
                $model -> PIC = implode(",", $model->PIC); //if yes, change it to string.
            }

            $model->save();
            /*return $this->redirect('update', [
                'model' -> $model,
            ]); */
        }
    }

    public function actionOpen(){
        //to test
        return "Say hi";
    }
}
?>