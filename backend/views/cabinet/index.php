<?php
use yii\helpers\Html;
?>

Login: <?= $model->username ?><br />
<?= $model->last_name ?><br />
<?= $model->patronymic ?><br />
<?php


?>
<img src="<?= $model->image ?>" alt="" style='height: 200px; width: 200px;'>
<br />
<?= $model->email ?><br />
<?= Html::a('Редактиовать профиль',['/user/update', 'id' =>$model->id ]) ?>

