<?php 
use kartik\widgets\ActiveForm; // or yii\widgets\ActiveForm
use kartik\widgets\FileInput;
// or 'use kartik\file\FileInput' if you have only installed 
// yii2-widget-fileinput in isolation
?>

<?php
$form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]);
echo $form->field($model, 'filename');
 
// your fileinput widget for single file upload
echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options'=>['accept'=>'image/*'],
    'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]
]);

/**
* uncomment for multiple file upload
*
*
*/
// echo $form->field($model, 'image[]')->widget(FileInput::classname(), [
//     'options'=>['accept'=>'image/*', 'multiple'=>true],
//     'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
// ]);
echo Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', [
    'class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
);
ActiveForm::end();