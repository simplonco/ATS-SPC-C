<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminManager */

$this->title = 'Update Admin Manager: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admin Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
