<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\bootstrap5\ActiveForm;
//use Yii;

$form = ActiveForm::begin([
    'id' => 'position-form',
    'layout' => 'horizontal',
]) ?>
<?= $form->field($model, 'position') ?>
<?= $form->field($model, 'description')->textarea() ?>



 <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
<?= Html::a('Вернуться', 'index.php?r=positions%2Findex', ['class' => 'btn btn-warning']) ?>

