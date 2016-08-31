<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Telework */

$this->title = 'Update Telework: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teleworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telework-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
