<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form backend\models\MultipleUploadForm */

$this->title = $searchModel->portfolio_id ? "Страница #$searchModel->portfolio_id изображения" : 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if ($searchModel->portfolio_id) : ?>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

            <?= $form->field($uploadForm, 'files[]')->fileInput(['multiple' => true]) ?>

            <button class="btn btn-primary">Добавить</button>
        <?php ActiveForm::end() ?>
    <?php endif ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // 'id',
            [
                'format' => 'raw',
                'headerOptions' => ['width' => '80'],
                'value' => function ($model, $key, $index, $column) {
                    /** @var $model common\models\Image */
                    return Html::img($model->getUrl(), [
                        'style' => 'width:200px;'
                        ]);
                }
            ],
            'description',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}',
                    'buttons' => [
                        'delete' => function ($url, $model, $key) {
                            return Html::a('удалить',['/image/delete', 'id' =>$model->id ], [
                                'title' => Yii::t('yii', 'Удалить файл'),
                                'data-confirm' => 'Вы уверены что хотите удалить этот файл?',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        },
                    ],
                'template' => '{view} {update} {images} {delete}',

            ],
        ],
    ]); ?>

</div>
