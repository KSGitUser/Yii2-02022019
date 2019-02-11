<?php

namespace app\controllers;

use Yii;
use app\models\tables\Tasks;
use app\models\TasksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\tables\Users;
use yii\helpers\ArrayHelper;

/**
 * TasksController implements the CRUD actions for Tasks model.
 */
class TasksController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $users = Users::find()->select(['id','username'])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' => $users,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user = Users::find()->select(['username'])->where(['id' => $this->findModel($id)->responsible_id])->one()->username;
        return $this->render('view', [
            'model' => $this->findModel($id), 'user' => $user,
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();
        
        $array=Users::find()->select(['id','username'])->all();
        $newArray = ArrayHelper::map($array, 'id', 'username');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Users::find()->select(['username'])->where(['id' => $model->responsible_id])->one()->username;
            return $this->redirect(['view', 'id' => $model->id, 'user'=>$user]);
        }

        return $this->render('create', [
            'model' => $model, 'array' => $newArray,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $array=Users::find()->select(['id','username'])->all();
        $newArray = ArrayHelper::map($array, 'id', 'username');       

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Users::find()->select(['username'])->where(['id' => $model->responsible_id])->one()->username;
            return $this->redirect(['view', 'id' => $model->id, 'user'=>$user]);
        }

        return $this->render('update', [
            'model' => $model, 'array' => $newArray
        ]);
    }

    public function actionCardUpdate($id)
    {
        $model = $this->findModel($id);
        $array=Users::find()->select(['id','username'])->all();
        $newArray = ArrayHelper::map($array, 'id', 'username');
       
       

       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id, 'array' => $newArray,]);
        }

        return $this->render('update', [
            'model' => $model, 'array' => $newArray,
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
