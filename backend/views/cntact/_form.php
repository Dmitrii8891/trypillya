<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use iutbay\yii2kcfinder\KCFinderInputWidget;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Cntact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cntact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'addres')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart'
    ]) ?>

    <?= $form->field($model, 'phone_footer')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart'
    ]) ?>

    <?= $form->field($model, 'phone_all')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
