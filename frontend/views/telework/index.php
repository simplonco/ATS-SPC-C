<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TeleworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teleworks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telework-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Telework', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  
</div>
