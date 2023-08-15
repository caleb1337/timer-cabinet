<?php

namespace app\controllers;

use app\models\Claim;
use app\models\Organization;
use app\models\Position;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class OrganizationsController extends Controller
{
    public function actionAdd()
    {
        $model = new Organization();
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','id'=> $model->organization_id]);
        };
        return $this->render('update',compact('model'));
    }

    public function actionDelete($id)
    {
        $model = Organization::findOne($id);
        if($model) $model->delete();
        return $this->redirect('index.php?r=organizations/index');
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
        'query' => Organization::find(),
        'pagination' => [
            'pageSize' => 10,
        ]
    ]);
        return $this->render('index', compact('dataProvider'));
    }

    public function actionUpdate($id)
    {
        $model = Organization::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->organization_id]);
        };
        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model= Organization::findOne($id);

        return $this->render('view', compact('model'));
    }
    public function actionOrganizationClaims($organization_id)
    {
        $query = Claim::find()->leftJoin('organizations','claims.organization_id = organizations.organization_id')->where(['claims.organization_id' =>$organization_id]);
        $org_name = Organization::findOne($organization_id);
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 10,
        ]
    ]);
        
        return $this->render('organization_claims', compact('dataProvider','org_name'));
    }

}
