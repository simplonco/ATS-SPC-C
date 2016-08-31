<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Telework */

$this->title = 'Create Telework';
$this->params['breadcrumbs'][] = ['label' => 'Teleworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telework-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
