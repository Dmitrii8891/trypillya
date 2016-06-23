<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AchievementsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'nomber1') ?>

    <?= $form->field($model, 'title1') ?>

    <?= $form->field($model, 'nomber2') ?>

    <?php // echo $form->field($model, 'title2') ?>

    <?php // echo $form->field($model, 'nomber3') ?>

    <?php // echo $form->field($model, 'title3') ?>

    <?php // echo $form->field($model, 'nomber4') ?>

    <?php // echo $form->field($model, 'title4') ?>

    <?php // echo $form->field($model, 'image1') ?>

    <?php // echo $form->field($model, 'name1') ?>

    <?php // echo $form->field($model, 'description1') ?>

    <?php // echo $form->field($model, 'image2') ?>

    <?php // echo $form->field($model, 'name2') ?>

    <?php // echo $form->field($model, 'description2') ?>

    <?php // echo $form->field($model, 'image3') ?>

    <?php // echo $form->field($model, 'name3') ?>

    <?php // echo $form->field($model, 'description3') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
