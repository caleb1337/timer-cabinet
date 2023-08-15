<?php

namespace app\controllers;

use app\models\Position;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;

class PositionsController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Position::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        return $this->render('index', compact('dataProvider'));
    }

    public function actionView($id)
    {
//        $model = Position::find()->leftJoin('users','users.position_id = positions.position_id')
//        ->where(['users.position_id' => $id]) ->one();
        $model= Position::findOne($id);

        return $this->render('view', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = Position::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->position_id]);
        };
        return $this->render('update', compact('model'));
    }

    public function actionDelete($id)
    {
        $model = Position::findOne($id);
        if($model) $model->delete();
        return $this->redirect('index.php?r=positions/index');
    }
    public function actionAdd(){
        $model = new Position();
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(['view','id'=> $model->position_id]);
        };
        return $this->render('update',compact('model'));
    }
}
