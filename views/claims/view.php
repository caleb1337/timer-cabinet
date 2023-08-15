<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'claim_id',
//        ['label' => 'Название организации', 'attribute' => 'organizations.organization_name',
//            'value' => function($data){
//            return $data->organization->organization_name;
//        }],
//        ['label' => 'Директор организации', 'attribute' =>
//            ['organizations.director_last_name','organizations.director_first_name','organizations.director_surname'],
//            'value' => function($data){
//                return ($data->organization->director_last_name . ' ' . $data->organization->director_first_name .' '. $data->organization->director_surname);
//            }],
//        ['label' => 'ИНН организации', 'attribute' =>
//            ['organizations.identification_tax_number'],
//            'value' => function($data){
//                return ($data->organization->identification_tax_number);
//            }],
//        ['label' => 'Ответственный менеджер', 'attribute' => ['users.last_name','users.first_name','users.surname'],
//            'value' => function($data){
//            return $data->manager->getFullName();
//        }],
        'description',
        'date_of_creation',
    ],
]);
?>

<?= Html::a('Вернуться', 'index.php?r=claims%2Findex',['class' => 'btn btn-warning']) ?>
