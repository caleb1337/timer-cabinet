<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\bootstrap5\ActiveForm;
use app\models\Position;
use yii\helpers\ArrayHelper;

$positions = Position::find()->all();
$items = ArrayHelper::map($positions,'position_id','position');

$form = ActiveForm::begin([
    'id' => 'managers-form',
    'layout' => 'horizontal',
]) ?>
<?= $form->field($model, 'last_name') ?>
<?= $form->field($model, 'first_name') ?>
<?= $form->field($model, 'surname') ?>
<?= $form->field($model, 'login') ?>
<?= $form->field($model, 'password') ?>
<?= $form->field($model, 'position_id')->dropDownList($items) ?>


 <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
<?= Html::a('Вернуться','index.php?r=managers%2Findex' ,['class' => 'btn btn-warning']) ?>

