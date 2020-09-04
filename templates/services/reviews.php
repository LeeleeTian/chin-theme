<?php if (isset($reviews) && is_array($reviews) && count($reviews) > 0): ?>
    <div class="services__individual__reviews">
        <?php foreach ($reviews as $review): ?>
            <?php if ($review['header']): ?>
                <p class="services__individual__reviews__title"><?= $review['header'] ?></p>
            <?php endif; ?>
            <div class="services__individual__reviews__review">
                <p class="services__individual__reviews__content"><?= $review['content'] ?></p>
                <p class="services__individual__reviews__author"><?= $review['signature'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>