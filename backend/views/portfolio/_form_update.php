<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
use dosamigos\multiselect\MultiSelect;
use iutbay\yii2kcfinder\KCFinderInputWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?php  KCFinderInputWidget::widget([
    'name' => 'image',
]); ?>
<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],
        'id' => 'contact-formaqewqe',
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <div class='col-md-6'>
        <?= $form->field($uploadimg, 'file123')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],
        ])?>
        
    <img src="<?= Yii::getAlias('@frontend/web/images/').$model->image1 ?>" style="height:300px; width:300px;">

    <?= $form->field($model, 'object')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart '
    ]) ?>
    
    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_manadger')->widget(Select2::classname(), [
            //'data' => $data,
            'language' => 'ru',
            'options' => ['placeholder' => 'Руководитель проекта ...'],
            'pluginOptions' => [
                
            ],
        'data' => ArrayHelper::map($user, 'id', 'last_name'), // data as array
    ]) ?>

    <?= $form->field($model, 'teams')->widget(Select2::classname(), [
        'name' => 'state_10',
        'options' => [
                    'placeholder' => 'Выбрать команду ...',
                    'multiple' => true
                ],
        'data' => ArrayHelper::map($user, 'id', 'last_name'), // data as array
    ]) ?>
    <!-- BEGIN Вывод пользователей  -->
    <?php $team = explode(",", $model->team); ?>
     <?php $i = 1; ?>
    <?php foreach($team as $key): ?>
    <div>
        <div>

            <div class="team<?= $i; ?>">
                <span class="results<?= $i; ?>"><?= $rows = $model->user->getUser_name($key); ?></span>
                <input type="button" name="sample<?= $i; ?>" class="sample<?= $i; ?>" style="background: red;">        
            </div>
            
            <!-- <p name="sample<?= $i; ?>" class="sample<?= $i; ?>">Пример 2 (post)</p> -->
            <script>
                 $('.sample<?= $i; ?>').click( function() {
                    $('.team<?= $i; ?>').css("display", "none");
                    $.ajax({
                      type: 'POST',
                      url: '/backend/web/index.php?r=portfolio%2Fdeleteteam',
                      data: 'id=<?= $model->id ?>&key=<?= $key; ?>',
                      success: function(data){
                        $('.results<?= $i; ?>').html(data);
                      }
                    });
                });
            </script>
            <?php // Html::a('<span class="glyphicon glyphicon-trash"></span>',['/portfolio/deleteteam', 'id' => $model->id, 'key' => $key]) ?>
        </div>
    </div>
    <?php $i++; ?>
    <?php endforeach; ?>
    <!-- END  -->
    
    <?php
            echo FileInput::widget([
               'name' => 'file[]',
                'options'=>[
                    'multiple'=>true,
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['/portfolio/image']),
                    'uploadExtraData' => [
                        'filename' => 'tailieu'
                    ],
                    'maxImageWidth' => 1920,
                    'maxImageHeight' => 1400,
                    'minImageWidth' => 1080,
                    'minImageHeight' => 300,
                    'maxFileCount' => 3
                ]
            ]);
        ?>
    
    <?php
foreach($image_find as $img): ?>
    <div class="my_custom_01">
     <img style="height:300px; width:300px;" src="<?= $img->image; ?> ">
     <?= Html::a('удалить',['/portfolio/deleteimag', 'id' => $img->id, 'model' => $model->id]) ?>
     </div>
     
<?php endforeach; ?>

    <?= $form->field($model, 'text1')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart'
    ]) ?>
    </div>
    <div class='col-md-6'>
    <?= $form->field($model, 'video')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text2')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart '
    ]) ?>
    
    <?= $form->field($uploadimg, 'file1')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'maxImageWidth' => 1920,
            'maxImageHeight' => 1400,
            'minImageWidth' => 1080,
            'minImageHeight' => 300,
        ]
        ]) ?>
        
        <img src="<?= $model->image2 ?>" style="height:300px; width:300px;">

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standart'
    ]) ?>

    <!-- form coordinate-->
    
    <?= $form->field($coordinate, 'country')->widget(Select2::classname(),
        [
            //'data' => $data,
            'language' => 'ru',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                
            ],
        ])->dropDownList(ArrayHelper::map($coordinate->getCoutry(), 'id', 'title'), 
                [
                 'prompt'=>'Выбать страну ',
                    'onchange'=>'
                         $.post( "'.'/backend/web/index.php?r=portfolio%2Fcity&id='.'"+$(this).val(), function( data ) {
                              
                         $( "select#coordinates-city" ).html( data );
                    });
                ']); ?>
    
    
    <?= $form->field($coordinate, 'city')->textInput(['rows' => 6]); ?>

    <?= $form->field($coordinate, 'x')->textInput(['rows' => 6]) ?>

    <?= $form->field($coordinate, 'y')->textInput(['rows' => 6]) ?>

    <?= $form->field($coordinate, 'category_map')->dropDownList([
    '1' => 'Жилые',
    '2' => 'Офисные',
    '3' => 'Торговые',
    '4' => 'Мосты',
    '5' => 'Дороги',
    '6' => 'Сооружения',
    '7' => 'Склады',
    '8' => 'Заводы',
    '9' => 'Разное',
    ]) ?>

    <?= $form->field($coordinate, 'category_we')->dropDownList([
    '10' => 'Делали мы',
    '20' => 'Делали наши сотрудники']) ?>

    <!-- end form coordinate-->

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($user, 'id', 'last_name'), ['prompt' => 'Выбор пользователя']) ?>

    <?= $form->field($model, 'status')->dropDownList(['hide' => 'Скрыто', 'publichen' => 'Опубликованно']) ?>

    <?= $form->field($model, 'rating')->dropDownList([
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10']) ?>

    <?= $form->field($model, 'publication')->checkBox() ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

