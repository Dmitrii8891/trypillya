<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'coordinate' => $coordinate,
        'user' => $user,
        'uploadimg' => $uploadimg,
    ]) ?>

</div>
