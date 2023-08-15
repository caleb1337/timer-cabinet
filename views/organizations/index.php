<?php
/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

?>
    <h1>Справочник организаций</h1>

<?php
echo Html::a('Добавить новую организацию', ['add'], ['class' => 'btn btn-success']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'identification_tax_number',
        'organization_name',
        'director_last_name',
        'director_first_name',
        'director_surname',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);