<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AdminManager */

$this->title = 'Create Admin Manager';
$this->params['breadcrumbs'][] = ['label' => 'Admin Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-manager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
