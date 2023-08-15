<?php
/** @var yii\web\View $this */

use yii\grid\GridView;

?>
<h1>Справочник должностей менеджеров</h1>

<?php


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'login',
        'position',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);

//var_dump($dataProvider);
?>