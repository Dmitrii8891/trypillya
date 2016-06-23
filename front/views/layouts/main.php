<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use common\models\Cntact;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
     <script>
        var tenplate = window.location.hostname;
        if(tenplate == tenplate)
        {
           <?php $this->registerJsFile(Url::base().'/design/js/script.js'); ?>
           <?php $this->registerJsFile(Url::base().'/design/js/jquery.scrollbox.min.js'); ?>
           
           
               $(function () {
                $('#demo5').scrollbox({
                    direction: 'h',
    //                distance: 300,
                    autoPlay: false
                });
                $('#demo5-backward').click(function () {
                    $('#demo5').trigger('backward');
                });
                $('#demo5-forward').click(function () {
                    $('#demo5').trigger('forward');
                });
                var width_ = $('.map-settings-wrapp').width();
                var width_body = $('body').width();
                $('#demo5').css({width:width_body - width_ - 131, left:60});
                $('#demo5-btn').css({width:width_body - width_, height:150});
                $('#demo5-forward').css({left:width_body - width_ - 40});
            }); 

            <?php $this->registerJsFile(Url::base().'/design/js/jquery.animateNumber.min.js'); ?>
           <?php $this->registerJsFile(Url::base().'/design/js/jquery.knob.js'); ?>
           <?php $this->registerJsFile('http://maps.google.com/maps/api/js?sensor=false'); ?>
           <?php $this->registerJsFile(Url::base().'/design/js/markerclusterer.js'); ?>
        }
     </script>
 
</head>
<body onload=" initialize()">
<?php $this->beginBody() ?>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KGL6PV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KGL6PV');</script>
<!-- End Google Tag Manager -->

<div class="section-box head">
    <div class="box-wr">
        <div class="box-all">
            <div class="logo-block">
                <a href="/"><img src="/design/images/logo.png"/></a>
                <a href="/" class="logo-text">TRYPILLYA</a>
            </div>
            <div class="to_order-home">
                <a href="#">заказать проект</a>
            </div>
            <div class="menu-header">
                <ul>
                    <li><?= Html::a('Услуги',['/service/']) ?></li>
                    <li><?= Html::a('Портфолио',['/portfolio/portfolio']) ?></li>
                    <li><?= Html::a('О нас',['/site/about']) ?></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <?= Alert::widget() ?>
    <?= $content ?>

<?php $contact = (new \common\models\Cntact())->contactAll() ?>

<div class="section-box footer" id="footer">
    <div class="box-wr">
        <div class="box-all">
            <div class="footer-first-block">
                <div class="logo-block">
                    <a href="/"><img src="/design/images/logo.png"></a>
                    <a href="/" class="logo-text logo-text-footer">TRYPILLYA</a>
                </div>
                <div class="footer-contacts">
                    <div class="footer-contacts-tel"><?= $contact->phone_footer ?></div>
                    <div class="footer-contacts-str"><?= $contact->addres ?></div>
                </div>
                <!-- <div class="seti-wrapp">
                    <a href="#" class="seti-ico vk-ico"></a>
                    <a href="#" class="seti-ico fb-ico"></a>
                </div> -->
            </div>
            <div class="footer-menu-block">
                <ul>
                    <li><?= Html::a('Услуги',['/service/']) ?></li>
                    <li><?= Html::a('Портфолио',['/portfolio/portfolio']) ?></li>
                    <li><?= Html::a('О нас',['/site/about']) ?></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
                <a href="#" class="to_order-footer">заказать проект</a>
            </div>
        </div>
    </div>
</div>
<!--<div class="section-box-contacts-wrapp">-->

<!--</div>-->

<div id="modal_form_contacts">
    <span id="modal_close"><img src="/design/images/close_modal.png" alt=""/></span>
    <div class="modal_contacts-title">контакты</div>
    <div class="modal_contacts-phones">
        <p><?= $contact->phone_footer ?> <span></span></p>
    </div>
    <div class="modal_contacts-phones-all">
        <?= $contact->phone_all ?>
    </div>
    <div class="contacts_callback">Обратный звонок</div>
    <?php $form = ActiveForm::begin(
    ['action' => '/site/contact',  'options' => [
                'class' => 'modal_contacts-form'
             ]]); ?>
        <input id="name_contacts" type="text" name="name" placeholder="Имя"/>
        <input id="phone_contacts" type="text" name="phone" placeholder="+38 (0XX) XXX-XX-XX"/>
        <input id="send_contacts" type="submit" value="отправить"/>
    <?php ActiveForm::end(); ?>
    
</div>
<div id="modal_form_to_order">
    <span id="modal_close"><img src="/design/images/close_modal.png" alt=""/></span>
    <div class="order-our-company">Заказать проект</div>
    <div class="order-txt-our-company">Хотите крутой проект?<br />Пишите, обсудим!</div>
    <?php $form = ActiveForm::begin(
    ['action' => '/site/contact2',  'options' => [
                'class' => 'form_order'
             ]]); ?>
        <input id="name_order" type="text" placeholder="Имя" name="name"/>
        <input id="company_order" type="text"  placeholder="Компания" name="company"/>
        <input id="phone_order" type="text"  placeholder="+38 (0ХХ) ХХХ-ХХ-ХХ" name="phone"/>
        <input id="email_order" type="text"  placeholder="e-mail" name="email"/>
        <textarea id="comments_order"  placeholder="Комментарий" name="message" ></textarea>
        <input id="send_order" type="submit" value="отправить"/>
    <?php ActiveForm::end(); ?>
     
</div>
<div id="overlay"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
