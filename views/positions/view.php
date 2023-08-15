<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

echo "<h1>Подробное описание должности </h1>";

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'position_id',
        'position',
        'description',
    ],
]);



//var_dump($model);
?>
<?php
//foreach ($model as $item){
//    echo $item;
//}
?>

<?= Html::a('Вернуться', 'index.php?r=positions%2Findex',['class' => 'btn btn-warning']) ?>
<br>

<?php //var_dump('<pre>' , $model->getUsers()->one(), '</pre>');