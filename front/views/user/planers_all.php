<div class="section-box content">
  <div class="section-box-planers_all_wrapp">
     <!--  <div class="section-box-planers_all_txt-wr">
          <div class="box-wr">
              <div class="box-all">
                  <div class="section-box-planers_all_txt">
                      <div class="section-box-planers_all_txt-title">Проектанты</div>
                      <div class="section-box-planers_all_txt-cont">
                          <p>
                              Квалифицированный специалист, который на профессиональной основе осуществляет архитектурное проектирование (организацию архитектурной среды), включая проектирование зданий, в том числе разработку объёмно-планировочных и интерьерных решений.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div> -->

      <div class="section-box-planers_all_blocks-wr">
          <div class="box-wr">
              <div class="box-all">
                  <div class="section-box-planers_all_blocks">
                    <?php foreach($user as $users): ?>
                      <div class="planers_all_bl_wr">
                          <a href="#">
                              <div class="planers_all_bl-designer"><img src="<?= $users->user->image ?>"  alt=""/></div>
                              <div class="planers_all_bl-text-wr">
                                  <div class="planers_all_bl-text-title"><?= $users->user->username ?><?= $users->user->last_name ?></div>
                                  <div class="planers_all_bl-text-cont"><?= $users->user->country ?></div>
                              </div>
                          </a>
                      </div>
                    <?php endforeach; ?>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>