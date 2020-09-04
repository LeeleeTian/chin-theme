<?php
$backgrounds = get_field('industires_banners');
function getBackground($category, $backgrounds)
{
    foreach ($backgrounds as $background) {
        if ($background['industry']->term_id == $category->term_id) {
            return $background['banner']['url'];
            break;
        }
    }
}
?>
<?php foreach ($categories as $category): ?>
    <div class="industries__category">
        <h2 class="heading-red" id="industry-<?= $category->term_id ?>"><?= $category->name ?></h2>
        <div class="industries__category__description"><?= wpautop($category->description) ?></div>
        <?php
        $separtor = '?';
        if (ICL_LANGUAGE_CODE != 'en') {
            $separtor = '&';
        }
        ?>
        <a class="industries__category__more" href="<?= get_permalink(getenv('PAGE_OUR_WORK')) ?><?= $separtor ?>industries=<?= $category->term_id ?>"
           style="background-image: url('<?= getBackground($category, $backgrounds) ?>');">
            <span class="industries__category__more__overlay">
                <?= Lingo::get('label.view_related_work') ?>
                <span class="btn btn--square"></span>
            </span>
        </a>
    </div>
<?php endforeach; ?>