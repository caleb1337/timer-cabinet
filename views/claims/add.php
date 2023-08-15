<?php

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\Organization;
use yii\helpers\ArrayHelper;


$organization_id = Organization::find()->all();
$org_items = ArrayHelper::map($organization_id,'organization_id','organization_name');
$timestamp = date('Y-m-d H:i:s');
$manager_id = User::find()->all();
$man_items  = ArrayHelper::map($manager_id, 'id' ,function($element){
    return $element['last_name'] . ' ' .$element['first_name'] . ' ' . $element['surname'];
});

$form = ActiveForm::begin([
    'id' => 'claim-form',
    'layout' => 'horizontal',
]) ?>
<?= $form->field($model, 'organization_id')->dropDownList($org_items)->label('Название организации') ?>
<?= $form->field($model, 'manager_id')->dropDownList($man_items)->label('Ответственный менеджер') ?>
<?= $form->field($model, 'description') ?>
<?= $form->field($model, 'date_of_creation')->textInput(['readonly', 'value'=> $timestamp]); ?>








<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
<?= Html::a('Вернуться', Yii::$app->request->referrer,['class' => 'btn btn-warning']) ?>

