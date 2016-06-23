

<?
    $this->title = "Услуги по проектированию и строительстве зданий | Компания TRP";
?>
<div class="section-box content">
  <div class="section-box-portfolio">
      <div class="box-wr">
          <div class="box-all">
              <div class="portfolio-bl-wrapp">
                  <div class="portfolio_filter_wrapp">
                      <h1>Услуги</h1>
                  </div>
                  <div class="portfolio-bl">
                    <?php foreach($model as $models): ?>
                      <div class="portfolio-bl-min">
                          <?php if(isset($models->seo->slug) && !$models->seo->slug == null): ?>
                          <a href="/service/<?= $models->seo->slug ?>" class="portfolio-bl-min_a">
                              <div class="portfolio-bl-min-title"><?= $models->title ?></div>
                              <div class="portfolio-bl-min-img"><img src="<?= $models->image ?>" alt=""/></div>
                          </a>
                          <?php else: ?>
                          <a href="/service/<?= $models->id ?>" class="portfolio-bl-min_a">
                              <div class="portfolio-bl-min-title"><?= $models->title ?></div>
                              <div class="portfolio-bl-min-img"><img src="<?= $models->image ?>" alt=""/></div>
                          </a>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<style>
   .clip {
      white-space: nowrap; /* Запрещаем перенос строк */
      overflow: hidden; /* Обрезаем все, что не помещается в область */
      text-overflow: ellipsis; /* Добавляем многоточие */
   }
</style>
<script>
jQuery(function() {
  var clip = jQuery('.portfolio-bl-min-title').addClass("clip");
  $(document).on('mouseover', '.portfolio-bl-min-title', function(){
    $(this).removeClass('clip');
  });
  $(document).on('mouseout', '.portfolio-bl-min-title', function(){
    $(this).addClass('clip');
  });
})
</script>