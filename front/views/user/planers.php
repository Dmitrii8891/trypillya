<?$name = $model[0]->last_name ;$this->title = "Проектант $name | Проектирование и строительство зданий | Компания TRP";?>
<div class="section-box content">
    <?php foreach($model as $models): ?>
    <div class="section-box-planers_all_wrapp">
        <div class="section-box-planers_all_txt-wr">
            <div class="box-wr">
                <div class="box-all">
                    <div class="section-box-planers_all_txt">
                        <div class="section-box-planers_all_txt-title">Проектант</div>
                        <div class="section-box-planers_all_txt-cont">
                            <p>
                                Квалифицированный специалист, который на профессиональной основе осуществляет архитектурное проектирование (организацию архитектурной среды), включая проектирование зданий, в том числе разработку объёмно-планировочных и интерьерных решений.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-box-designer_wrappp">
            <div class="box-wr">
                <div class="box-all">
                    <div class="section-box-designer_bl">
                        <div class="designer_bl_img">
                            <img src="<?= $models->image ?>" alt=""/>
                        </div>
                        <div class="designer_bl_cont_wr">
                            <p><h1><?= $models->last_name ?></h1></p>
                            <p>Проектант</p>
                            <p>Опыт работы <?= $models->experience; ?> лет</p>
                        </div>
                        <div class="designer_bl_content_text">
                            <?= $models->about; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>