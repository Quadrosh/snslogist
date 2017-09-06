<?php

namespace app\modules\admin\controllers;

use app\models\Feedback;
use app\models\TestPage;
use app\models\TestTarget;
use Yii;
use app\models\Test;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestController implements the CRUD actions for Test model.
 */
class TestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Test models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $dataProvider = new ActiveDataProvider([
            'query' => Test::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPublish($id){

        $model = Test::find()->where(['id'=>$id])->one();
        $model->publish = true;
        $now = new \DateTime();
        $date=$now->format('H:i_d-m-Y');
        $model->start_date = $date;
        if ($model->save()) {
            return $this->redirect(Url::previous());
        } else {
            $this->view->params['feedback'] = new Feedback();
            throw new Exception('Не получается, свяжитесь с программистом');
        }
    }
    public function actionUnpublish($id){
        $model = Test::find()->where(['id'=>$id])->one();
        $now = new \DateTime();
        $date=$now->format('H:i_d-m-Y');
        $model->end_date = $date;
        $testPages = TestPage::find()->where(['test_id'=>$model->id])->all();
        foreach ($testPages as $testPage) {
            $hrurl = $testPage['hrurl'];
            $testPage['hrurl'] = $hrurl.'_'.$model->start_date.'_-_'.$model->end_date;
            $testPage->save();
        }
        $model->publish = 0;
        if ($model->save()) {
            return $this->redirect(Url::previous());
        } else {
            $this->view->params['feedback'] = new Feedback();
            throw new Exception('Не получается, свяжитесь с программистом');
        }
    }
    public function actionReset($id){
        $test = Test::find()->where(['id'=>$id])->one();
        $test->start_date = '';
        $test->end_date = '';
        $test->save();
        $testPages = TestPage::find()->where(['test_id'=>$test->id])->all();
        foreach ($testPages as $testPage) {
            $testPage['sendtopage'] = 0;
            $testPage->save();
            $targets = TestTarget::find()->where(['testpage_id'=>$testPage['id']])->all();
            foreach ($targets as $target) {
                $target['achieve'] = 0;
                $target->save();
            }

        }
        return $this->redirect(Url::previous());

    }
    /**
     * Displays a single Test model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Url::remember();
        $testTargets =[];
        $testPages = TestPage::find()->where(['test_id'=>$id])->all();
        foreach ($testPages as $testPage) {
            $testTargets [] = TestTarget::find()->where(['testpage_id'=>$testPage['id']])->all();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'testPages'=>$testPages,
            'testTargets'=>$testTargets,
        ]);
    }

    /**
     * Creates a new Test model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Test model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Test model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
