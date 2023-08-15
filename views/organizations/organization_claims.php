<?php
/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

?>
   
<h1><?= Html::encode($org_name->organization_name)  ?></h1>

<?php
//echo Html::a('Добавить новую организацию', ['add'], ['class' => 'btn btn-success']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'claim_id',
        'description',
         ['attribute' => 'org_name' ,'content' => function($data){
            $org_name = $data->organization->organization_name;
            return $org_name;
        }],
//        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>
<?= Html::a('Вернуться', Yii::$app->request->referrer,['class' => 'btn btn-warning ms-3']) ?>