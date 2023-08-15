<?php

namespace app\controllers;

use app\models\Claim;
use app\models\ClaimSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ClaimsController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionAdd()
    {
        $model = new Claim();
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','claim_id'=> $model->claim_id]);
        };
        return $this->render('add',compact('model'));
    }

    public function actionIndex()
    {

        $searchModel = new ClaimSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index',compact('searchModel','dataProvider'));
    }

    public function actionUpdate($claim_id)
    {
        $model = Claim::findOne($claim_id);
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','claim_id'=> $model->claim_id]);
        };
        return $this->render('update',compact('model'));
    }

    public function actionView($claim_id)
    {
        $model = Claim::find()
            ->leftJoin('organizations', 'claims.organization_id = organizations.organization_id')
            ->leftJoin('users','users.id = claims.manager_id')
            ->where(['claims.claim_id' => $claim_id])
            ->one();

        return $this->render('view',compact('model'));
    }
    public function actionDelete($claim_id)
    {
        $model = Claim::findOne($claim_id);
        if($model) $model->delete();
        return $this->redirect('index.php?r=claims/index');
    }
    protected function findModel($claim_id)
    {
        if (($model = Claim::findOne(['claim_id' => $claim_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
