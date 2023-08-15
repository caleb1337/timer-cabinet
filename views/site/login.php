<?php
use yii\helpers\Html;
?>
<div class="card container-lg my-5 w-50">
    <div class="card-body login-card-body my-5 w-50 mx-auto">
        <p class="login-box-msg">Выполните вход</p>

        <?php $form = \yii\bootstrap5\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'login', [
            'options' => ['class' => 'form-group has-feedback', 'placeholder' => 'Логин'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('login')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe',[
                        'options' => ['class' => 'form-group'],
                ])->checkbox([
                    'template' => '<div class="icheck-primary text-bold">{label}{input}</div>',
                    'label' => 'Запомнить меня',
                    'labelOptions' => [
                        'class' => '',
                    ],
                    'class' => 'position-relative ms-3',
                    'uncheck' => null
                ]) ?>
            </div>
            <div class="col-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php \yii\bootstrap5\ActiveForm::end(); ?>

        <div class="social-auth-links text-center mb-3">
            <p>- ИЛИ -</p>
            <a href="#" class="btn btn-primary my-2">
                <i class="fab fa-facebook mr-2"></i> Войти через Facebook
            </a>
            <a href="#" class="btn btn-danger my-2">
                <i class="fab fa-google-plus mr-2"></i> Войти через Google+
            </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="#">Забыли пароль?</a>
        </p>
        <p class="mb-0">
            <a href="<?= \yii\helpers\Url::toRoute('site/register') ?>" class="text-center">Регистрация</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>