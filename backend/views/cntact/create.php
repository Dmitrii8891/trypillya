<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cntact */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cntact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
