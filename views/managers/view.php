<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'last_name',
        'first_name',
        'surname',
        'login',
        'password',
        ['label' => 'Должность', 'attribute' => 'positions.position' ,'value' => function($data){
            return $data->position->position;
        }],
    ],
]);
?>

<?= Html::a('Вернуться', 'index.php?r=managers%2Findex',['class' => 'btn btn-warning']) ?>
