<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  <div class="login-box">
    <div class="login-logo">
      <img src='../web/dist/img/accenture-logo.png' alt='System Image' height='100' width='250' align='center'>
    </div>
    <h1 style="color:white;"><b><center>Portail des employés</center> </b> </h1>
    <div class="login-box-body">
      <p class="login-box-msg"> Se connecter </p>
      <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

          <?= $form->field($model, 'password')->passwordInput() ?>

          <?= $form->field($model, 'rememberMe')->checkbox() ?>
          <div class="form-group">
              <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
          </div>
    </div>
  </div>
