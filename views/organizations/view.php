<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

echo "<h1>Подробное описание организации". ' '.Html::encode($model->organization_name) . "</h1>";

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'organization_id',
        'identification_tax_number',
        'organization_name',
        'director_last_name',
        'director_first_name',
        'director_surname',
    ],
]);
//$orgainzation_id = $model->organization_id;
?>

<?= Html::a('Просмотреть заявки от организации', ['organizations/organization-claims', 'organization_id' => $model->organization_id],['class' => 'btn btn-info']) ?>
<?= Html::a('Вернуться', 'index.php?r=organizations%2Findex',['class' => 'btn btn-warning ms-3']) ?>
    <br>

