<div class="slider">
    <div class="slider__slides">
        <?php foreach ($slides as $slide): ?>
            <div class="slider__slide" style="background-image: url('<?= $slide['image']['url'] ?>');">
                <div class="slider__content">
                    <p class="slider__content__header"><?= $slide['header'] ?></p>
                    <p class="slider__content__subheader"><?= $slide['subheader'] ?></p>
                    <a href="<?= $slide['button_link'] ?>" class="btn btn--white"><?= $slide['button_label'] ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
