<?php
if(isset($model->seo->title) and $model->seo->title != null){
  $this->title = $model->seo->title.' - Trypillya.com';  
} else {
  $this->title = $model->title.' - Trypillya.com';  
}
?>
<div class="section-box content">
  <div class="section-box-portfolio_page-wrapp">
      <div class="section-box-portfolio_page-first-blocks" style="background: url(<?= '/frontend/web/images/'.$model->image1 ?>) 50% no-repeat;"></div>
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
          <div class="portfolio_pages_first-desq-wr">
              <div class="box-wr">
                  <div class="box-all">
                      <div class="portfolio_pages_first-desk">
                          <div class="portfolio_pages_first-desk-test">
                              <div class="prtf_pg_f_txt">Объект</div>               <div class="prtf_pg_s_txt"><?= $model->object ?></div>
                              <div class="prtf_pg_f_txt">Локация</div>              <div class="prtf_pg_s_txt"><?= $model->coordenats->city ?>, <?= $model->coordenats->getCountry_name($model->coordenats->country) ?></div>
                              <div class="prtf_pg_f_txt">Площадь</div>              <div class="prtf_pg_s_txt"><?= $model->area ?> м2</div>
                              <div class="prtf_pg_f_txt">Клиент</div>               <div class="prtf_pg_s_txt"><?= $model->client ?></div>
                              <div class="prtf_pg_f_txt">Задача</div>               <div class="prtf_pg_s_txt"><?= $model->task ?></div>
                              <div class="prtf_pg_f_txt">Год</div>                  <div class="prtf_pg_s_txt"><?= $model->year ?></div>
                              <div class="prtf_pg_f_txt">Руководитель проекта</div> <div class="prtf_pg_s_txt"><a href="/user/planers/<?= '?id='.$model->project_manadger ?>"><span><?= $model->user->getUser_name($model->project_manadger) ?></span></a></div>
                              <div class="prtf_pg_f_txt">Команда</div>
                          </div>
                      </div>
                      <div class="portfolio_pages_first-desk-test_two">
                          <?php $team = explode(",", $model->team); ?>
                          <?php foreach($team as $key): ?>
                          <div class="prtf_pg_s_txt"><a href="/user/planers/<?='?id='. $key ?>">
                         <span> <?php echo $rows = $model->user->getUser_name($key); ?></span></a></div>
                          <?php endforeach; ?>
                      </div>
                  </div>
              </div>
          </div>


      </div>
      <?php if($model->coordenats->portfolio_id == 2 OR $portfolio_image): ?>
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
                                  <?php if($portfolio_image): ?>
                                  <?php foreach($portfolio_image as $image): ?>
                                    <li data-bg-slider="<?= $image->image ?>"></li>
                                  <?php endforeach; ?>
                                  <?php else: ?>
                                <?php $images = $model->getImages(); ?>
                                <?php foreach($images as $img): ?>
                                  <li data-bg-slider="<?= $img->getUrl() ?>"></li>
                                <?php endforeach; ?>
                                  <?php endif; ?>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <?php if($model->text1 == NULL): ?>
      <?php else: ?>
        <div class="section-box-portfolio_pages_desq-wr">
            <div class="box-wr">
                <div class="box-all">
                    <div class="section-box-portfolio_pages_desq">
                        <p>
                           <?= $model->text1 ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
      <?php endif; ?>
      <?php endif; ?>


      <?php if($model->video == NULL): ?>
      <?php else: ?>
        <div class="section-box-portfolio_pages_iframe">
          <div class="box-wr">
              <div class="box-all">
                  <?= $model->video ?>
              </div>
          </div>
      </div>


          <?php if($model->text2 == NULL): ?>
          <?php else: ?>
            <div class="section-box-portfolio_pages_desq-wr">
              <div class="box-wr">
                  <div class="box-all">
                      <div class="section-box-portfolio_pages_desq">
                          <p>
                          <?= $model->text2 ?>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <?php endif; ?>
      <?php endif; ?>

      <?php if($model->image2 == NULL): ?>
      <?php else: ?>
        <div class="section-box-portfolio_pages_bg_content-wr">
          <div class="section-box-portfolio_pages_bg_content" style="background: url('<?= '/frontend/web/images/'.$model->image2 ?>')  50% no-repeat; height: 938px;"></div>
      </div>
      <div class="section-box-portfolio_pages_desq-wr">
          <div class="box-wr">
              <div class="box-all">
                  <div class="section-box-portfolio_pages_desq">
                      <p>
                       <?= $model->description ?>
                      </p>
                  </div>
              </div>
          </div>
      </div>
      <?php endif; ?>

      
      <div class="section-box-portfolio_pages_map-wr">
          <div class="section-box-portfolio_pages_map">
              <div class="shadow-maps-portf_pages"></div>
              <div id="map_cloud" style="display: none;">
                  <script type="text/javascript">
                      function initialize() {
                          var start_position = new google.maps.LatLng('<?= $model->coordenats->x ?>', '<?= $model->coordenats->y ?>');
                          var settings = {
                              zoom: 14,
                              scrollwheel: false,
                              center: start_position,
                              mapTypeControl: false,
                              mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                              navigationControl: false,
                              navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                              scaleControl: false,
                              streetViewControl: false,
                              rotateControl: false,
                              zoomControl: true,
                              mapTypeId: google.maps.MapTypeId.ROADMAP};
                          var map = new google.maps.Map(document.getElementById("map_canvas"), settings);


                          var image10 = new google.maps.MarkerImage('/design/images/markers/marker-we-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image2 = new google.maps.MarkerImage('/design/images/markers/marker-we-2.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image3 = new google.maps.MarkerImage('/design/images/markers/marker-we-3.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image4 = new google.maps.MarkerImage('/design/images/markers/marker-we-4.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image5 = new google.maps.MarkerImage('/design/images/markers/marker-we-5.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image6 = new google.maps.MarkerImage('/design/images/markers/marker-we-6.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image7 = new google.maps.MarkerImage('/design/images/markers/marker-we-7.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image8 = new google.maps.MarkerImage('/design/images/markers/marker-we-8.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image9 = new google.maps.MarkerImage('/design/images/markers/marker-we-9.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image17 = new google.maps.MarkerImage('/design/images/markers/marker-empl-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );


                    //////////////////////////////////////////////////////////////////////////////////


                    var image11 = new google.maps.MarkerImage('/design/images/markers/marker-we-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image12 = new google.maps.MarkerImage('/design/images/markers/marker-we-2.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image13 = new google.maps.MarkerImage('/design/images/markers/marker-we-3.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image14 = new google.maps.MarkerImage('/design/images/markers/marker-we-4.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image15 = new google.maps.MarkerImage('/design/images/markers/marker-we-5.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image16 = new google.maps.MarkerImage('/design/images/markers/marker-we-6.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image17 = new google.maps.MarkerImage('/design/images/markers/marker-we-7.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image18 = new google.maps.MarkerImage('/design/images/markers/marker-we-8.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image19 = new google.maps.MarkerImage('/design/images/markers/marker-we-9.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image21 = new google.maps.MarkerImage('/design/images/markers/marker-min-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image22 = new google.maps.MarkerImage('/design/images/markers/marker-min-2.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image23 = new google.maps.MarkerImage('/design/images/markers/marker-min-3.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image24 = new google.maps.MarkerImage('/design/images/markers/marker-min-4.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image25 = new google.maps.MarkerImage('/design/images/markers/marker-min-5.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image26 = new google.maps.MarkerImage('/design/images/markers/marker-min-6.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image27 = new google.maps.MarkerImage('/design/images/markers/marker-min-7.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image28 = new google.maps.MarkerImage('/design/images/markers/marker-min-8.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image29 = new google.maps.MarkerImage('/design/images/markers/marker-min-9.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );



                          var marker = new google.maps.Marker({
                              position: new google.maps.LatLng('<?= $model->coordenats->x ?>', '<?= $model->coordenats->y ?>'),
                              map: map,
                              title: '<?= $model->title ?>',
                              <?php if($model->coordenats->category_we == 11) {
                                $category_we = $model->coordenats->category_we + 9;
                                } else {
                                    $category_we = $model->coordenats->category_we;
                                } ?>
                                icon: image<?= $model->coordenats->category_map + $category_we ?>
                          });
                      }
                  </script>
              </div>
              <div id="map_canvas" style="width: 100%; height:100%;"></div>
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
                      <div class="img-text-city">г.<?= $portfolios->coordenats->city ?>, <?= $portfolios->year ?></div>
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
</div>

<script>
  var gallery = jQuery('.section-box-portfolio_pages-slider');
  console.log(gallery);
  if(gallery.css('background-image', 'url')) {
       gallery.css('display', 'block');
    } else {
       gallery.css('display', 'none');
    }
</script>