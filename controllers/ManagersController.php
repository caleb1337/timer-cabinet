<?php

namespace app\controllers;


use app\models\Positions;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use app\models\User;
use Yii;


class ManagersController extends Controller
{


    public function actionIndex()
    {

        $query = User::find()->join('LEFT JOIN', 'positions' , 'users.position_id = positions.position_id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
           'sort' =>[
                'attributes' => [
                    'last_name',
                    'first_name',
                    'surname',
                    'positions.position' => [
                        'asc' =>  ['positions.position' => SORT_ASC, 'positions.position' => SORT_ASC, 'positions.position' => SORT_ASC],
                        'desc' => ['positions.position' => SORT_DESC, 'positions.position' => SORT_DESC, 'positions.position' => SORT_DESC],
                    ],
                ],
            ],
        ]);
        return $this->render('index',compact('dataProvider','query'));
    }


    
    public function actionView($id){
        $model = User::find()->leftJoin('positions','users.position_id = positions.position_id')
            ->where(['users.id' => $id])->one();

        return $this->render('view',compact('model'));
    }
    public function actionUpdate($id){
        $model = User::findOne($id);
        if($model->load(Yii::$app->request->post())){
            Yii::$app->security->generatePasswordHash($model->password);
            $model->save();
            return $this->redirect(['view','id'=> $model->id]);
        };
        return $this->render('update',compact('model'));
    }
    public function actionDelete($id){
        $model = User::findOne($id);
        if($model) $model->delete();
        return $this->redirect('index.php?r=managers/index');
    }
    public function actionAdd(){
        $model = new User();
        if($model->load(Yii::$app->request->post())){
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            if($model->findOne(['login' => $model->login])) return $this->render('error', compact('model'));
            $model->save();
            return $this->redirect(['view','id'=> $model->id]);

        };
        return $this->render('update',compact('model'));
    }
   

}
