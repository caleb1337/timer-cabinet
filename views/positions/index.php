<?php
/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

?>
    <h1>Справочник должностей менеджеров</h1>

<?php
echo Html::a('Добавить новую должность', ['add'], ['class' => 'btn btn-success']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'position',
        'description',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);