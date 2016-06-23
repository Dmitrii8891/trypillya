<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Achievements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomber1')->textInput() ?>

    <?= $form->field($model, 'title1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomber2')->textInput() ?>

    <?= $form->field($model, 'title2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomber3')->textInput() ?>

    <?= $form->field($model, 'title3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomber4')->textInput() ?>

    <?= $form->field($model, 'title4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description3')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
