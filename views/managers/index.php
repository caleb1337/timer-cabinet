<?php
/** @var View $this */
/**  $dataProvider from User Model */
use yii\grid\GridView;
use yii\web\View;
use \yii\helpers\Html;
?>
<h1>Справочник менеджеров</h1>


<?php
echo Html::a('Добавить нового менеджера', ['add'], ['class' => 'btn btn-success']);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'last_name',
            'first_name',
            'surname',
            ['attribute' => 'positions.position', 'content' => function($data){
                $var = $data->position->position;
                return $var;
            }],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);

?>