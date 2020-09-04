<?php
$reviews = get_field('home_reviews');
?>
<?php if (is_array($reviews) && count($reviews) > 0): ?>
    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="heading-red"><?= Lingo::get('label.client_reviews') ?></h2>
                </div>
            </div>
            <div class="row reviews__slides">
                <?php foreach ($reviews as $review): ?>
                    <div class="col-xs-6">
                        <p class="reviews__title"><?= $review['header'] ?></p>
                        <p class="reviews__content"><?= $review['content'] ?></p>
                        <p class="reviews__author"><?= $review['author'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>