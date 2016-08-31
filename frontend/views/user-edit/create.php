<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserEdit */

$this->title = 'Create User Edit';
$this->params['breadcrumbs'][] = ['label' => 'User Edits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-edit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
