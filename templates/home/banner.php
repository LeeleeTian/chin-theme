<?php
$image = get_field('mb_image');
$header = get_field('mb_header');
?>
<div class="home-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-banner__image" style="background-image: url('<?= $image['url'] ?>');">
                    <div class="home-banner__overlay">
                        <p class="home-banner__header"><?= $header ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>