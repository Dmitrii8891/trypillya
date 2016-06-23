<?php
if(isset($seo->seo->title)){
  $this->title = $seo->seo->title.' - Trypillya.com';  
} else {
  $this->title = $model->title.' - Trypillya.com'; 
}
?>
<div class="section-box content">
<div class="section-box-portfolio_page-wrapp">
      <div class="section-box-portfolio_page-first-blocks" style="background: url(<?= $model->image ?>) 50% no-repeat;"></div>
      <div class="portfolio_pages_first-wrapp">
          <div class="portfolio_pages_first-overlay"></div>
          <div class="portfolio_pages_first-title-wr">
              <div class="box-wr">
                  <div class="box-all">
                      <div class="portfolio_pages_first-title">
                          <h1><span> <?= $model->title; ?></span></h1>
                          <img src="/design/images/portfolio-pages-arrows.png" alt=""/>
                      </div>
                  </div>
              </div>
          </div>

      <div class="section-box-portfolio_pages_desq-wr ">
            <div class="box-wr">
                <div class="box-all">
                    <div class="section-box-portfolio_pages_desq servicePadding">
                        <?= $model->text ?>
                    </div>
                </div>
            </div>
        </div>

    <?php if($imagesServices): ?>
      <div class="section-box-portfolio_pages-slider" style=""></div>
      <div class="section-box-portfolio_pages-slider-navi">
          <div class="sec-bx-port_pg-sl-nav-line-wr">
              <div class="box-wr"><div class="box-all"><div class="sec-bx-port_pg-sl-nav-line"></div></div></div>
          </div>
          <div class="sec-bx-port_pg-sl-nav-blocks">
              <div class="box-wr">
                  <div class="box-all">
                      <div class="sec-bx-port_pg-sl-nav-line">
                          <ul>
                             
                          </ul>
                          <div  class="port_pg_img_hidden" style="display: none">
                              <ul id="port_pg_img_hidden" style="display: none">
                                  <?php foreach($imagesServices as $image): ?>
                                    <li data-bg-slider="<?= $image->image ?>"></li>
                                  <?php endforeach; ?>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php endif; ?>
      </div>

      

      <style>
        .to_order-footer {
          margin-left: -67px;
        }
      </style>