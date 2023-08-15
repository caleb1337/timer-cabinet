<?php
/** @var View $this */
/**  $dataProvider from User Model */
use yii\grid\GridView;
use yii\web\View;
use \yii\helpers\Html;
?>
    <h1>Справочник менеджеров</h1>


<?= 'Ошибка! Пользователь с логином'. ' ' . $model->login . ' '. 'уже зарегестрирован! Выберите другой логин' ?>