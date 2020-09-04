<?php
$header = get_field('global_slider_header', 'options');
$logos = get_field('global_slider_logos', 'options');
?>
<?php if (is_array($logos) && count($logos) > 0): ?>
    <div class="cs__slider">
        <div class="container">
            <?php if ($header): ?>
                <h2 class="text-center cs__slider__header"><?= $header ?></h2>
            <?php endif; ?>
            <div class="cs__slider__slides">
                <?php foreach ($logos as $logo): ?>
                    <div>
                        <?php if ($logo['link'] != ''): ?>
                            <a href="<?= $logo['link'] ?>" target="_blank">
                        <?php endif; ?>
                        <img src="<?= $logo['logo'] ?>" alt="" class="img-responsive">
                        <?php if ($logo['link'] != ''): ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>