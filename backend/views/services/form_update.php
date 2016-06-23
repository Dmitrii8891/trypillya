<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use iutbay\yii2kcfinder\KCFinderInputWidget;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .fileinput-upload {
        display: none;
    }
</style>

<div class="services-form">
<?php  KCFinderInputWidget::widget([
    'name' => 'image',
    ]); ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        ])?>
        <img src="<?= $model->image ?>" style="height:300px; width:300px;">

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
        'name' => 'files[]',
                'options'=>[
                    'multiple'=>true,
                ],
                'pluginOptions' => [
                    
                    'maxImageWidth' => 1920,
                    'maxImageHeight' => 1400,
                    'minImageWidth' => 1080,
                    'minImageHeight' => 300,
                    'maxFileCount' => 5
                ]
        ])?>
        
    <?= $form->field($model, 'status')->dropDownList(['published' => 'Опубликованна', 'hide' => 'Скрыта']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
