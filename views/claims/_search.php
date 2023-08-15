<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ClaimSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="claim-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'claim_id') ?>

    <?= $form->field($model, 'organization_id') ?>

    <?= $form->field($model, 'manager_id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'date_of_creation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
