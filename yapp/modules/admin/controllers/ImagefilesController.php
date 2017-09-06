<?php

namespace app\modules\admin\controllers;

use app\models\UploadForm;
use Yii;
use app\models\Imagefiles;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImagefilesController implements the CRUD actions for Imagefiles model.
 */
class ImagefilesController extends Controller
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
     * Lists all Imagefiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $uploadmodel = new UploadForm();
        $dataProvider = new ActiveDataProvider([
            'query' => Imagefiles::find(),
            'pagination'=> [
                'pageSize' => 100,
            ],
            'sort' =>[
                'defaultOrder'=> [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'uploadmodel' => $uploadmodel,
        ]);
    }

    /**
     * Displays a single Imagefiles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Url::remember();
        $uploadmodel = new UploadForm();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'uploadmodel' => $uploadmodel,
        ]);
    }

    /**
     * Creates a new Imagefiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imagefiles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Imagefiles model.
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
     * Deletes an existing Imagefiles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(file_exists(Yii::$app->basePath.'/web/img/'.$model->name)){
            if(!unlink(Yii::$app->basePath.'/web/img/'.$model->name)) {
                Yii::$app->session->setFlash('error', 'неполучается удалить файл');
            }
        }

        if(!$model->delete()) {
            Yii::$app->session->setFlash('error', 'неполучается удалить запись');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Imagefiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imagefiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagefiles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Change existing image file for QuotepadImg model with same file name
     */
    public function actionChange()
    {
        $uploadmodel = new UploadForm();
        if (Yii::$app->request->isPost) {
            $uploadmodel->imageFile = UploadedFile::getInstance($uploadmodel, 'imageFile');
            $data=Yii::$app->request->post('UploadForm');
            $model = Imagefiles::find()->where(['id'=>$data['toModelId']])->one();
            if ($uploadmodel->change($model->name)) {

                Yii::$app->session->setFlash('success', 'Файл обновлен успешно');
            } else {
                Yii::$app->session->setFlash('error', 'Что то пошло не так');
            }
            return $this->redirect(Url::previous());
        }
    }
    /**
     * Upload images
     */
    public function actionUpload()
    {
        $uploadmodel = new UploadForm();
        if (Yii::$app->request->isPost) {
            $uploadmodel->imageFile = UploadedFile::getInstance($uploadmodel, 'imageFile');
            if ($uploadmodel->upload()) {
                Yii::$app->session->setFlash('success', 'Файл загружен успешно');
            }
            return $this->redirect(Url::previous());
        }
    }
}
