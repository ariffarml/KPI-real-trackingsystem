<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AddActivity;
use app\models\AddSubActivity;
use app\models\Kpi_Insert;
use app\models\Kpi_month;
use app\models\UpdateProgress;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class UpdateController extends Controller {

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

    public function actionView(){
        /*$dataProviderUpdateTable = new ActiveDataProvider([
            'query' => UpdateProgress::find(),
        ]); */

        //$searchModel = new UpdateProgress();

        //$dataProviderUpdateTable = $searchModel->search(Yii::$app->request->queryParams);

        return $this -> render ('updateopen', [
            //'model' => $model,
            //'dataProviderUpdateTable' => $dataProviderUpdateTable,
            //'searchModelprogress' => $searchModel,
        ]);//, [
            //'model' => $this->getSubactivity(),
        //]);
    }

    public function actionCreate(){

        $model = new UpdateProgress();
        
        $kpiYear = AddSubActivity::find()->select(['subactivity_id', 'kpi_year'])->asArray()->all();
        $kpiYear = ArrayHelper::map($kpiYear, 'kpi_year', 'kpi_year');
        $monthsupdate = Kpi_month::find()->select(['id', 'month'])->orderBy(['id' => SORT_ASC])->asArray()->all();
        $monthsupdate = ArrayHelper::map($monthsupdate, 'month','month');
        $activities = AddActivity::find()->with('subactivities') -> all();
        //$subActivities = AddSubActivity::find()->with('activity') -> all();
        
        $dropdownData = [];
        
        foreach ($activities as $activity) {
            $subActivityList = [];
            foreach ($activity -> subactivities as $subActivity) {
                $subActivityList[$subActivity->subactivity_id] = $subActivity -> subactivity_desc; 
            }

            $dropdownData[$activity->activity_id] = $subActivityList;
        }
    
        if ($model->load(Yii::$app->request->post())) {
            //$lis = [];
            //foreach ($activities as $activity)


            /*if ($subactivity !== null) {
                $fetchdata = [
                    'activity_id' => $subactivity ->activity_id,

                ];
                return \yii\helpers\Json::encode($fetchdata);
            } */
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $model->update_date = date('Y-m-d H:i:s');

            /*echo '<pre>';
            var_dump(Yii::$app->request->post());
            //var_dump($model);
            echo '</pre>';
            exit;*/

            if ($model->validate()) {

                if ($model ->save()) {
                    Yii::$app->session->setFlash('success', 'Progress successfully updated and saved');
                    return $this->redirect(['site/options']);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save progress for KPI. Try again.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Validation failed. Errors: ' . json_encode($model->errors));
            }
        }
        return $this -> render ('progressform', [
            'model' => $model,
            'kpiYears' => $kpiYear,
            'dropdownData' => $dropdownData,
            'monthsupdate' => $monthsupdate,
        ]);
    }

    public function actionGetSubactivityDetails($id){

        //fetch the subactivity along w the related detail
        $subactivity = AddSubActivity::find()
        ->where(['subactivity_id' => $id])
        ->with('activity.kpi') //relation in update model to retrieve activity from other table 
        ->one();

        //fetch kpi for that subactivity
        /*$kpi = AddActivity::find()
        ->with('KpiDescription')
        ->hasOne(); */

        if ($subactivity) {

            /*// Data was retrieved
            var_dump($subactivity->attributes);
            var_dump($subactivity->activity->attributes);
            */
            return $this->asJson([
                'subdesc' =>$subactivity -> subactivity_desc,
                'kpiyear' => $subactivity->kpi_year,
                'kpitarget' => $subactivity->KPI_target,
                'activitydesc' => $subactivity->activity->activity_desc,
                'kpidesc'=>$subactivity->activity->kpi->kpi_desc,
            ]) ;
        } else {
            return $this-> asJson([
                'error' => 'Related activity not found'
            ]);
        }
    }


}
?>