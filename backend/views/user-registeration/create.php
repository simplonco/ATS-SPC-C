<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserRegisteration */

$this->title = 'Create User Registeration';
$this->params['breadcrumbs'][] = ['label' => 'User Registerations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-registeration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
