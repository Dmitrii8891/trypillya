<?php
use yii\widgets\ActiveForm; 
$this->title = $seo->title;
?>

<div class="section-box content">
    <div class="section-box-1">
        <div class="map-settings-opacity"></div>
        <div class="map-settings-wrapp">
            <div class="min_markers-wrapp">
                <ul class="min_markers">
                    <li class="active_m"><span></span><p>Все</p></li>
                    <li><span><img src="design/images/markers/marker-min-1.png"/></span><p>Жилые</p></li>
                    <li><span><img src="design/images/markers/marker-min-2.png"/></span><p>Офисные</p></li>
                    <li><span><img src="design/images/markers/marker-min-3.png"/></span><p>Торговые</p></li>
                    <li><span><img src="design/images/markers/marker-min-4.png"/></span><p>Мосты</p></li>
                    <li><span><img src="design/images/markers/marker-min-5.png"/></span><p>Дороги</p></li>
                    <li><span><img src="design/images/markers/marker-min-6.png"/></span><p>Сооружения</p></li>
                    <li><span><img src="design/images/markers/marker-min-7.png"/></span><p>Склады</p></li>
                    <li><span><img src="design/images/markers/marker-min-8.png"/></span><p>Заводы</p></li>
                    <li><span><img src="design/images/markers/marker-min-9.png"/></span><p>Разное</p></li>
                </ul>
                <ul class="min_markers_two">
                    <li><span><img src="design/images/markers/marker-min-10.png"/></span><p>Делали мы</p></li>
                    <li class="last_m"><span><img src="design/images/markers/marker-min-11.png"/></span><p>Делали наши сотрудники</p></li>
                </ul>
            </div>
        </div>
        <div class="slider-map"></div>
        <div id="map_cloud" style="display: none;">
        <script type="text/javascript">
                function initialize() {
                    var start_position = new google.maps.LatLng('56', '30');
                    var settings = {
                        zoom: 3,
                        scrollwheel: false,
                        center: start_position,
                        mapTypeControl: false,
                        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                        navigationControl: false,
                        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                        scaleControl: false,
                        streetViewControl: false,
                        rotateControl: false,
                        zoomControl: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP};
                    var map = new google.maps.Map(document.getElementById("map_canvas"), settings);


                    var image10 = new google.maps.MarkerImage('design/images/markers/marker-we-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image2 = new google.maps.MarkerImage('design/images/markers/marker-we-2.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image3 = new google.maps.MarkerImage('design/images/markers/marker-we-3.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image4 = new google.maps.MarkerImage('design/images/markers/marker-we-4.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image5 = new google.maps.MarkerImage('design/images/markers/marker-we-5.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image6 = new google.maps.MarkerImage('design/images/markers/marker-we-6.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image7 = new google.maps.MarkerImage('design/images/markers/marker-we-7.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image8 = new google.maps.MarkerImage('design/images/markers/marker-we-8.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image9 = new google.maps.MarkerImage('design/images/markers/marker-we-9.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image17 = new google.maps.MarkerImage('design/images/markers/marker-empl-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );


                    //////////////////////////////////////////////////////////////////////////////////


                    var image11 = new google.maps.MarkerImage('design/images/markers/marker-we-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image12 = new google.maps.MarkerImage('design/images/markers/marker-we-2.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image13 = new google.maps.MarkerImage('design/images/markers/marker-we-3.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image14 = new google.maps.MarkerImage('design/images/markers/marker-we-4.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image15 = new google.maps.MarkerImage('design/images/markers/marker-we-5.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image16 = new google.maps.MarkerImage('design/images/markers/marker-we-6.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image17 = new google.maps.MarkerImage('design/images/markers/marker-we-7.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image18 = new google.maps.MarkerImage('design/images/markers/marker-we-8.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image19 = new google.maps.MarkerImage('design/images/markers/marker-we-9.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image21 = new google.maps.MarkerImage('design/images/markers/marker-min-1.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image22 = new google.maps.MarkerImage('design/images/markers/marker-min-2.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image23 = new google.maps.MarkerImage('design/images/markers/marker-min-3.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image24 = new google.maps.MarkerImage('design/images/markers/marker-min-4.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image25 = new google.maps.MarkerImage('design/images/markers/marker-min-5.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image26 = new google.maps.MarkerImage('design/images/markers/marker-min-6.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image27 = new google.maps.MarkerImage('design/images/markers/marker-min-7.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image28 = new google.maps.MarkerImage('design/images/markers/marker-min-8.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );
                    var image29 = new google.maps.MarkerImage('design/images/markers/marker-min-9.png',
                            new google.maps.Size(21, 32),
                            new google.maps.Point(0,0),
                            new google.maps.Point(16, 35)
                    );

                    var markers = [];
                    <?php $a = 1 ?>
                    <?php foreach($model as $models): ?>
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng('<?= $models->coordenats->x ?>', '<?= $models->coordenats->y ?>'),
                        map: map,
                        title: '<?= $models->title ?>',
                        <?php if($models->coordenats->category_we == 11) {
                            $category_we = $models->coordenats->category_we + 9;
                        } else {
                            $category_we = $models->coordenats->category_we;
                        } ?>
                        icon: image<?= $models->coordenats->category_map + $category_we ?>
                    });
                    <?php if($a == 1): ?>
                    markers.push(marker);
                     var infowindow = new google.maps.InfoWindow({
                            <?php if(isset($models->seo->slug) && !$models->seo->slug == null): ?>
                            content: '<div style="width: 112px;"><a href="/portfolio/<?= $models->seo->slug ?>" style="text-decoration: none; color: #333"><img style="width: 112px; height: 60px" src="<?= '/frontend/web/ImageResaze/'.$models->image1 ?>" alt=""/><p style="width: 100%; text-align: center; font-family: Ubuntu Bold; font-size: 11px;"><?= $models->title ?></p></a></div>'
                            <?php else: ?>
                            content: '<div style="width: 112px;"><a href="/portfolio/<?= $models->id ?>" style="text-decoration: none; color: #333"><img style="width: 112px; height: 60px" src="<?= '/frontend/web/ImageResaze/'.$models->image1 ?>" alt=""/><p style="width: 100%; text-align: center; font-family: Ubuntu Bold; font-size: 11px;"><?= $models->title ?></p></a></div>'
                            <?php endif; ?>
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map, this);
                    });
                    <?php else: ?>
                    markers.push(marker);
                    var infowindow<?= $a; ?> = new google.maps.InfoWindow({
                        <?php if(isset($models->seo->slug) && !$models->seo->slug == null): ?>
                            content: '<div style="width: 112px;"><a href="/portfolio/<?= $models->seo->slug ?>" style="text-decoration: none; color: #333"><img style="width: 112px; height: 60px" src="<?= '/frontend/web/ImageResaze/'.$models->image1 ?>" alt=""/><p style="width: 100%; text-align: center; font-family: Ubuntu Bold; font-size: 11px;"><?= $models->title ?></p></a></div>'
                            <?php else: ?>
                            content: '<div style="width: 112px;"><a href="/portfolio/<?= $models->id ?>" style="text-decoration: none; color: #333"><img style="width: 112px; height: 60px" src="<?= '/frontend/web/ImageResaze/'.$models->image1 ?>" alt=""/><p style="width: 100%; text-align: center; font-family: Ubuntu Bold; font-size: 11px;"><?= $models->title ?></p></a></div>'
                        <?php endif; ?>
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow<?= $a; ?>.open(map, this);
                    });
                    <?php endif; ?>
                    <?php $a++; ?>
                    <?php endforeach; ?>
                    
                     

                    var clusterStyles = [
                        {
                            url: 'design/images/markers/clasters.png',
                            height: 36,
                            width: 36
                        }

                    ];
                    markerClusterer = new MarkerClusterer(map, markers,
                            {
                                maxZoom: 10,
                                gridSize: 100,
                                styles: clusterStyles
                            });
//балун
                    
                }
            </script>
        </div>
        <!-- <div id="map_canvas" style="width: 100%; height:100%;"></div> -->
         <div id="map_canvas" id="map_images"  style="width: 100%; height:100%; background: url(design/images/screencapture.png)"></div>
        <div class="slider_map-wr">
            <div class="slider_map_overlay"></div>
            <div class="slider_map">
                <div id="demo5" class="scroll-img">
                    <ul>
                    <?php foreach($model as $models): ?>
                        <li>
                            <a
                                <?php if(isset($models->seo->slug) && !$models->seo->slug == null): ?>
                                href="/portfolio/<?= $models->seo->slug ?>" class="slider_a"
                                <?php else: ?>
                                href="/portfolio/<?= $models->id ?>" class="slider_a"
                                <?php endif; ?>
                            >
                                <div class="slider-marker-bl">
                                    <div class="slider-marker-bl-img">
                                        <img src="<?= '/frontend/web/ImageResaze/'.$models->image1 ?>" alt="" style=" width: 100px; height: 82px;"/>
                                    </div>
                                    <div class="slider-marker-bl-text">
                                    <?php if(strlen( $models->title) < 35): ?>
                                        <div class="slider-marker-bl-text-title"><?= $models->title ?></div>
                                     <?php else: ?>  
                                        <?php mb_internal_encoding("UTF-8"); ?>
                                     <div class="slider-marker-bl-text-title"><?= mb_substr($models->title, 0, 15) ?>...</div>
                                     <?php endif; ?>
                                     <?php mb_internal_encoding("UTF-8"); ?> 
                                        <div class="slider-marker-bl-text-p"><?= mb_substr($models->object, 0, 100) ?>...</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div id="demo5-btn" class="text-center">
                    <a  id="demo5-backward"></a>
                    <a  id="demo5-forward"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-box-2">
        <div class="form-first-text">Проектная команда №1 в Украине</div>
        <div class="form-first-text-h2">Получить расчет проекта</div>
    <?php $form2 = ActiveForm::begin(
    ['action' => '/site/contact3',  'options' => [
                'class' => 'form-first'
             ]]); ?>
        <input id="name" type="text" name="name" placeholder="Имя"/>
        <input id="company" type="text" name="company" placeholder="Компания" />
        <input id="phone" type="text" name="phone" placeholder="+38 (0ХХ) ХХХ-ХХ-ХХ" />
        <input id="email" type="text" name="email" placeholder="e-mail"/>
        <textarea id="comments" name="message" placeholder="Комментарий"></textarea>
        <input id="send" type="submit" value="отправить"/>
    <?php ActiveForm::end(); ?>
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
    <div class="section-box-4">
        <div class="scheme-work">схема работы</div>
        <div class="scheme-circle">
            <div class="scheme-circle-ico"></div>
            <input class="knob" data-width="334" data-readOnly=true data-displayInput=false max-value="82" value="0" data-cursor=false data-angleOffset="34" data-thickness=".03">
            <div class="scheme-circle-bl-1"></div>
            <div class="scheme-circle-bl-2"></div>
            <div class="scheme-circle-bl-3">
                <a href="#">заказать<br />проект<span></span></a>
            </div>
            <?php $i = 1; ?>
        <?php foreach($work as $works): ?>
            <div class="circle-min-<?= $i ?>"><?= $i ?><span class="circle-smoll-big"></span><span class="circle-text-bl"><p class="circle-h1"><?= $works->title ?></p><div class="circle-h2"><p><?= $works->description ?></p></div></span> </div>
            <?php $i++; ?>
        <?php endforeach; ?>
            <div class="scheme_circle-bg"></div>
        </div>
    </div>
    <div class="section-box-5">
        <div class="achievement-h1"><?= $ach->title ?></div>
        <div class="achievement-wrapper">
            <div class="box-wr">
                <div class="box-all">
                    <div id="achiev_bl_1" class="achievement-blocks">
                        <span id="result"><?= $ach->nomber1 ?></span>
                        <p><?= $ach->title1 ?></p>
                        <b style="display: none;"><?= $ach->nomber1 ?></b>
                    </div>
                    <div id="achiev_bl_2" class="achievement-blocks">
                        <span><?= $ach->nomber2 ?></span>
                        <p><?= $ach->title2 ?></p>
                        <b style="display: none;"><?= $ach->nomber2 ?></b>
                    </div>
                    <div id="achiev_bl_3" class="achievement-blocks">
                        <span><?= $ach->nomber3 ?></span>
                        <p><?= $ach->title3 ?></p>
                        <b style="display: none;"><?= $ach->nomber3 ?></b>
                    </div>
                    <div id="achiev_bl_4" class="achievement-blocks">
                        <span><?= $ach->nomber4 ?></span>
                        <p><?= $ach->title4 ?></p>
                        <b style="display: none;"><?= $ach->nomber4 ?></b>
                    </div>
                    <div class="achievement-three-block-wr">
                        <div class="achievement-three-block">
                            <div class="achievement-three-bl ach-bl-1">
                                <div class="achievement-three-block-img">
                                    <img src="design/images/achievements-pic-1.png" style="margin-left: -24px;" width="48" height="64" alt=""/>
                                </div>
                                <div class="achievement-three-block-title"><?= $ach->name1 ?></div>
                                <div class="achievement-three-block-text">
                                    <?= $ach->description1 ?>
                                </div>
                            </div>
                        </div>
                        <div class="achievement-three-block">
                            <div class="achievement-three-bl ach-bl-2">
                                <div class="achievement-three-block-img">
                                    <img src="design/images/achievements-pic-2.png" style="margin-left: -32px;" width="64" height="64" alt=""/>
                                </div>
                                <div class="achievement-three-block-title"><?= $ach->name2 ?></div>
                                <div class="achievement-three-block-text">
                                    <?= $ach->description2 ?>
                                </div>
                            </div>
                        </div>
                        <div class="achievement-three-block">
                            <div class="achievement-three-bl ach-bl-3">
                                <div class="achievement-three-block-img">
                                    <img src="design/images/achievements-pic-3.png" style="margin-left: -26px;" width="51" height="67" alt=""/>
                                </div>
                                <div class="achievement-three-block-title"><?= $ach->name3 ?></div>
                                <div class="achievement-three-block-text">
                                    <?= $ach->description3 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-box-6">
        <div class="speak-h1"><p>О нас говорят</p></div>
        <div class="achievement-wrapper">
            <div class="box-wr">
                <div class="box-all">
                <?php foreach($about as $abouts): ?>
                    <?php if($abouts->status == 'published'): ?>
                    <div class="speak-bloks">
                        <div class="speak_img" style="background-image: url('<?= $abouts->image ?>');"></div>
                        
                        <div class="speak-bloks-text-wr">
                            <div class="speak-bloks-text-h1">
                                <?= $abouts->name ?>
                            </div>
                            <div class="speak-bloks-text-h1-span">
                                <?= $abouts->position ?>
                            </div>
                            <div class="speak-bloks-h2">
                                "<?= $abouts->description ?>"
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section-box-7">
        <div class="form-first-text">остались вопросы?</div>
        <?php $form = ActiveForm::begin(
    ['action' => '/site/contact4',  'options' => [
                'class' => 'form-second'
             ]]); ?>
            <textarea id="comments_two" name="message" placeholder="Вопрос" name="" ></textarea>
            <input id="phone_two" type="text" name="phone" placeholder="+38 (0ХХ) ХХХ-ХХ-ХХ" name=""/>
            <input id="email_two" type="text" name="email" placeholder="e-mail" name=""/>
            <input id="send_two" type="submit" value="отправить"/>
        <?php ActiveForm::end(); ?>
        </div>
</div>


<script> 
// $(document).ready(function(){

    // var iii = true;
    
    // console.log(ddd);
    // if (ddd) {console.log('hello var ddd is correnct')
    // }else {
    //  console.log('var ddd is not exist');
    // };

    // console.log($('link'));
    // $('.min_markers li').click(function(){

        // var testt = $(this);

        // var id = $(this).attr('id');

        // var ddd = document.getElementById('test_tr_class');

        // $.post( "index.php?r=order%2Fupdate&id=1", function( data ) {

        // if (!ddd) {

        // $.post( "permit%2Fuser%2Fview&id=" + id + '"', function( data ) {
        //     console.log($(this));

                // $('.tes').append(
                //     '<tr id="test_tr_class">' + 
                //         '<td colspan="12">' +
                //             data +
                //         '</td>' +
                //     '</tr>' 
                //     );

                // });
        
        // }else{
        //     document.getElementById('test_tr_class').remove();
        // };

        // iii = false;
        // console.log(iii);




//     });





// });
</script>