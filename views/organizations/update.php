<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\bootstrap5\ActiveForm;
//use Yii;

$form = ActiveForm::begin([
    'id' => 'organization-form',
    'layout' => 'horizontal',
]) ?>

<?= $form->field($model, 'organization_name') ?>
<?= $form->field($model, 'identification_tax_number') ?>
<?= $form->field($model, 'director_last_name') ?>
<?= $form->field($model, 'director_first_name') ?>
<?= $form->field($model, 'director_surname') ?>



<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
<?= Html::a('Вернуться', 'index.php?r=positions%2Findex', ['class' => 'btn btn-warning']) ?>

