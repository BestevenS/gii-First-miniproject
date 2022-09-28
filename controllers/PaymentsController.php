<?php

namespace app\controllers;

use app\models\payments;
use app\models\paymentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentsController implements the CRUD actions for payments model.
 */
class PaymentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all payments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new paymentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single payments model.
     * @param int $payment_no Payment No
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($payment_no)
    {
        return $this->render('view', [
            'model' => $this->findModel($payment_no),
        ]);
    }

    /**
     * Creates a new payments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new payments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'payment_no' => $model->payment_no]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing payments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $payment_no Payment No
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($payment_no)
    {
        $model = $this->findModel($payment_no);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'payment_no' => $model->payment_no]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing payments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $payment_no Payment No
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($payment_no)
    {
        $this->findModel($payment_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the payments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $payment_no Payment No
     * @return payments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($payment_no)
    {
        if (($model = payments::findOne(['payment_no' => $payment_no])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
