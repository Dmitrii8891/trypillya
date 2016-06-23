<?php
use yii\helpers\Html;
?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

<br />
<br /><br />
<br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?= $model->username ?><br />
<?= $model->last_name ?><br />
<?= $model->patronymic ?><br />
<?php


?>
<img src="<?= $model->image ?>" alt="" style='height: 200px; width: 200px;'>
<br />
<?= $model->email ?><br />
<?= Html::a('Редактиовать профиль',['/user/update', 'id' =>$model->id ]) ?> <br />
<?= Html::a('Редактиовать портфолио',['/portfolio/index', 'id' =>Yii::$app->user->identity->id ]) ?>
<?php foreach($portfolio as $key): ?>
	<?= $key->title; ?><br />
<?php endforeach; ?>

