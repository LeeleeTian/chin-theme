<?php $logos = get_field('services_logos') ?>
<?php if ($logos): ?>
    <div class="container">
        <h2 class="text-center services__slider__header">Here are some more clients we work with</h2>
        <div class="services__slider">
            <?php foreach ($logos as $logo): ?>
                <div>
                    <?php if ($logo['link']): ?>
                        <a href="<?= $logo['link'] ?>" target="_blank">
                    <?php endif; ?>
                    <img src="<?= $logo['logo']['url'] ?>" alt="" class="img-responsive">
                    <?php if ($logo['link']): ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>