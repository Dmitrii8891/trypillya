<?php
if(isset($model->seo->title)){
   $this->title = $model->seo->title; 
}
?>
<div class="section-box content">
    <div class="section-box-8">
        <div class="box-wr">
            <div class="box-all">
                <div class="project_company">
                    <div class="project_company_title"><?= $model->title ?></div>
                    <div class="project_company_text">
                        <p>
                           <?= $model->text ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="section-box-3">
          <div class="portfolio">Портфолио</div>
          <div class="portfolio-foto-wrapp">
              <div class="portfolio-foto">
                  <a href="/portfolio" class="portfolio-foto-blocks all-jobs" >
                    <span class="all-jobs-span">
                        240<br />
                        Выполненых<br />
                        работ
                    </span>
                      <div class="portfolio-arrows"></div>
                  </a>

                  <?php $i = 1 ?>
                <?php foreach($portfolioall as $portfolios): ?>
                  <a
                      <?php if(isset($portfolios->seo->slug) && !$portfolios->seo->slug == null): ?>
                      href="/portfolio/<?= $portfolios->seo->slug ?>" class="portfolio-foto-blocks portf_dynamic" id="portfolio-foto-b<?= $i ?>"
                      <?php else: ?>
                      href="/portfolio/<?= $portfolios->id ?>" class="portfolio-foto-blocks portf_dynamic" id="portfolio-foto-b<?= $i ?>"
                      <?php endif; ?>
                  >
                      <div class="portfolio-foto-blocks-img"><img src="<?= '/frontend/web/ImageResaze/'.$portfolios->image1 ?>" alt=""/></div>
                      <div class="img-text"><?= $portfolios->title ?></div>
                      <div class="img-text-city"><?= $portfolios->coordenats->city ?>, <?= $portfolios->year ?></div>
                      <div class="blind_ _left"></div>
                      <div class="blind_ _right"></div>
                  </a>
                <?php $i++ ?>
                <?php endforeach; ?>

                  <!-- <a href="#" class="portfolio-foto-blocks all-jobs last-jobs" >
                    <span class="all-jobs-span">
                        наши<br />
                        сертификаты
                    </span>
                      <div class="portfolio-arrows"></div>
                  </a> -->
              </div>
          </div>
      </div>
    <div class="section-box-9">
        <div class="order-our-company">Заказать проект</div>
        <div class="order-txt-our-company">Хотите крутой проект?<br />Пишите, обсудим!</div>
        <form class="form-first" action="">
            <input id="name" type="text" placeholder="Имя" name=""/>
            <input id="company" type="text" placeholder="Компания" name=""/>
            <input id="phone" type="text" placeholder="+38 (0ХХ) ХХХ-ХХ-ХХ" name=""/>
            <input id="email" type="text" placeholder="e-mail" name=""/>
            <textarea id="comments" placeholder="Комментарий" name="" ></textarea>
            <input id="send" type="submit" value="отправить"/>
        </form>
    </div>
</div>