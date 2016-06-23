<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="p404_bg">
    <span class="text_404">404</span>
    <p class="first_p_404">
        Добро пожаловать на страницу 404! <br>
        Вы находитесь здесь, потому что ввели адрес страницы, которая уже не существует <br>
        или была перемещена по другому адресу
    </p>
    <p class="second_p_404">
        … Возможно, запрашиваемая Вами страница была перенесена или удалена. <br>
        Также возможно, Вы допустили небольшую опечатку при вводе адреса – такое случается даже с нами, поэтому еще раз <br> 
        внимательно проверьте
    </p>
    <a href="/"><button class="btn_404">на главную</button></a>
</div>
