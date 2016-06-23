<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PortfolioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'image1') ?>

    <?= $form->field($model, 'object') ?>

    <?= $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'client') ?>

    <?php // echo $form->field($model, 'task') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'project_manadger') ?>

    <?php // echo $form->field($model, 'team') ?>

    <?php // echo $form->field($model, 'text1') ?>

    <?php // echo $form->field($model, 'video') ?>

    <?php // echo $form->field($model, 'text2') ?>

    <?php // echo $form->field($model, 'image2') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'map') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
