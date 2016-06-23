<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Work */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Схема работ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
