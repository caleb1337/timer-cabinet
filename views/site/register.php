<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\RegisterForm $model */

use app\models\Position;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Регистрациия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container-xl">
    
    <div class="row align-items-center flex-column bg-light">
        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>
        <p class="fw-light">Пожалуйста заполните поля</p>
        </div>
        

        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                ],
            ]);

            ?>

            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'last_name')->textInput() ?>
            <?= $form->field($model, 'first_name')->textInput() ?>
            <?= $form->field($model, 'surname')->textInput() ?>
            <?= $form->field($model, 'position_id')->dropDownList($items) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>
