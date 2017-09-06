<?php

namespace app\modules\admin\controllers;

use app\models\Feedback;
use Yii;
use app\models\Preorders;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PreordersController implements the CRUD actions for Preorders model.
 */
class PreordersController extends Controller
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

    public function actionUtm()
    {
        $preorders = Preorders::find()->orderBy('date')->all();
        $feedbacks = Feedback::find()->orderBy('date')->all();
        $leads = [];
        $leadId = 0;
        foreach ($preorders as $preorder) {
            $leadId ++;

            $leads[$leadId]['type']= 'preOrder';
            $leads[$leadId]['id']= $preorder['id'];
            $leads[$leadId]['name']= $preorder['cargo'];
            $leads[$leadId]['phone']= $preorder['phone'];
            $leads[$leadId]['from_page']= $preorder['from_page'];
            $leads[$leadId]['utm_source']= $preorder['utm_source'];
            $leads[$leadId]['utm_medium']= $preorder['utm_medium'];
            $leads[$leadId]['utm_campaign']= $preorder['utm_campaign'];
            $leads[$leadId]['utm_term']= $preorder['utm_term'];
            $leads[$leadId]['utm_content']= $preorder['utm_content'];
            $leads[$leadId]['date']= $preorder['date'];
        }
        foreach ($feedbacks as $feedback) {
            $leadId ++;
            $leads[$leadId]['type']= 'quickForm';
            $leads[$leadId]['id']= $feedback['id'];
            $leads[$leadId]['name']= $feedback['name'];
            $leads[$leadId]['phone']= $feedback['phone'];
            $leads[$leadId]['from_page']= $feedback['from_page'];
            $leads[$leadId]['utm_source']= $feedback['utm_source'];
            $leads[$leadId]['utm_medium']= $feedback['utm_medium'];
            $leads[$leadId]['utm_campaign']= $feedback['utm_campaign'];
            $leads[$leadId]['utm_term']= $feedback['utm_term'];
            $leads[$leadId]['utm_content']= $feedback['utm_content'];
            $leads[$leadId]['date']= $feedback['date'];
        }
        ArrayHelper::multisort($leads,['date'],[SORT_DESC]);
        return $this->render('utm', [
            'leads' => $leads,
        ]);
    }
    /**
     * Lists all Preorders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Preorders::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Preorders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Preorders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Preorders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Preorders model.
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
     * Deletes an existing Preorders model.
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
     * Finds the Preorders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Preorders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Preorders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
