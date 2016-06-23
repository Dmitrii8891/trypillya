<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Aboutas */

$this->title = 'Create Aboutas';
$this->params['breadcrumbs'][] = ['label' => 'Aboutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
