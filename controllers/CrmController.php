<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\User;
use Yii;


class CrmController extends Controller
{
    public function actionCatalogFirms()
    {
        return $this->render('catalog-firms');
    }

    public function actionCatalogManagers()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        return $this->render('catalog-managers/catalog-managers',compact('dataProvider'));
    }

    public function actionCatalogManagersPositions()
    {
        return $this->render('catalog-managers-positions');
    }

    public function actionCreateClaim()
    {
        return $this->render('create-claim');
    }
    
    public function actionView($id){
        $model = User::findOne($id);
        return $this->render('catalog-managers/catalog-managers-view',compact('model'));
    }
    public function actionUpdate($id){
        $model = User::findOne($id);
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','id'=> $model->id]);
        };
        return $this->render('catalog-managers/catalog-managers-update',compact('model'));
    }
    public function actionDelete($id){
        $model = User::findOne($id);
        if($model) $model->delete();
        return $this->redirect('index.php?r=crm/catalog-managers');
    }
   

}
