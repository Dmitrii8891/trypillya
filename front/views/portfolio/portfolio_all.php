<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php
    $this->title = 'Портфолио по проектированию и строительстве зданий. Проектная комманда №1 в Украине. Компания TRP';
?>
<div class="section-box content">
  <div class="section-box-portfolio">
      <div class="box-wr">
          <div class="box-all">
              <div class="portfolio-bl-wrapp">
                  <div class="portfolio_filter_wrapp">
                      <h1>Портфолио</h1>
                      <ul class="menu_filter">
                          <li>
                              <a href="#" class="menu_filter_a">Тип строения</a>
                              <div class="filter_bloks_wrapp">
                                  <div class="filter_bloks">
                                      <ul class="dropped_menu_filter">
                                          <li><?= Html::a('Все'.'('.$count_all.')',['/portfolio/portfolio', 'category_map' =>0 ]) ?></span></li>
                                          <li><?= Html::a('<span>'.'Жилые'.'</span>'.'('.$count_1.')',['/portfolio/portfolio', 'category_map' =>1 ]) ?></li>
                                          <li><span><?= Html::a('<span>'.'Офисные'.'</span>'.'('.$count_2.')',['/portfolio/portfolio', 'category_map' =>2 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Торговые'.'</span>'.'('.$count_3.')',['/portfolio/portfolio', 'category_map' =>3 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Мосты'.'</span>'.'('.$count_4.')',['/portfolio/portfolio', 'category_map' =>4 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Дороги'.'</span>'.'('.$count_5.')',['/portfolio/portfolio', 'category_map' =>5 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Сооружения'.'</span>'.'('.$count_6.')',['/portfolio/portfolio', 'category_map' =>6 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Склады'.'</span>'.'('.$count_7.')',['/portfolio/portfolio', 'category_map' =>7 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Заводы'.'</span>'.'('.$count_8.')',['/portfolio/portfolio', 'category_map' =>8 ]) ?></span></li>
                                          <li><span><?= Html::a('<span>'.'Разное'.'</span>'.'('.$count_9.')',['/portfolio/portfolio', 'category_map' =>9 ]) ?></span></li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#" class="menu_filter_a">Местоположение</a>
                              <div class="filter_bloks_wrapp">
                                  <div class="filter_bloks">
                                      <ul class="dropped_menu_filter">
                                          <?php foreach($country_un as $models): ?>
                                          <li><span><?= Html::a($country->getCountry_name($models->country).'('.$country->getCount_country($models->country).')',['/portfolio/portfolio', 'country' => $models->country]) ?></span></li>
                                          <?php endforeach; ?>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="portfolio-bl">
                    <?php foreach($model as $models): ?>
                      <div class="portfolio-bl-min">
                          
                          <a
                              <?php if(isset($models->seo->slug) && !$models->seo->slug == null): ?>
                              href="portfolio/<?= $models->seo->slug ?>" class="portfolio-bl-min_a"
                              <?php else: ?>
                              href="portfolio/<?= $models->id ?>" class="portfolio-bl-min_a"
                              <?php endif; ?>
                          >
                          
                          
                               <?php if(strlen($models->title) < 35): ?>
                              <div class="portfolio-bl-min-title"><?= $models->title ?></div>
                            <?php else: ?>
                              <?php mb_internal_encoding("UTF-8"); ?>
                              <div class="portfolio-bl-min-title"><?= mb_substr($models->title, 0, 18) ?>...</div>
                            <?php endif; ?>
                              <div class="portfolio-bl-min-img"><img src="<?= '/frontend/web/ImageResaze/'.$models->image1 ?>" alt=""/></div>
                              <div class="portfolio-bl-text"><?= $models->user->username ?></div>
                              <div class="portfolio-bl-text_two"><?php // $country->getCountry_name($models->coordenats->country) ?></div>
                              </a>
                          </a>
                      </div>
                    <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>