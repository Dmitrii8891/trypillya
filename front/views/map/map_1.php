
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

    <div class="slider_for_maps" style="display: none">
        <?php foreach($model as $models): ?>
                        <li>
                            <?php if(isset($models->seo->slug) && !$models->seo->slug == null): ?>
                                <a href="/portfolio/<?= $models->seo->slug ?>" class="slider_a">
                                <?php else: ?>
                                <a href="/portfolio/<?= $models->id ?>" class="slider_a">
                            <?php endif; ?>
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
    </div>
