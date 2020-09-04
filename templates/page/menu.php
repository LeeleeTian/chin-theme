<?php foreach ($items as $item) : ?>
    <a href="<?= get_permalink($item) ?>"
       class="pc__sidebar__link col-md-12 col-sm-6"
       style="background-image: url('<?= get_field('menu_background', icl_object_id($item->ID, 'page', true, 'en'))['url'] ?>');">
        <span><?= $item->post_title ?></span>
    </a>
<?php endforeach; ?>
<?php if (isset($additional) && $additional) : ?>
    <?php foreach ($additional as $link) : ?>
        <a href="<?= $link['link'] ?>"
           class="pc__sidebar__link col-md-12 col-sm-6"
           style="background-image: url('<?= $link['background']['url'] ?>');">
            <span><?= $link['label'] ?></span>
        </a>
    <?php endforeach; ?>
<?php endif; ?>
<div class="clearfix"></div>