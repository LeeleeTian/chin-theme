<?php
$industries = get_field('cs_industry');
$services = get_field('cs_service');
$separtor = '?';
if (ICL_LANGUAGE_CODE != 'en') {
    $separtor = '&';
}
?>
<?php if (is_array($industries) && count($industries) > 0): ?>
    <?php
    $industriesPageId = icl_object_id(getenv('PAGE_INDUSTRIES'), 'page', true, ICL_LANGUAGE_CODE);
    $href = get_permalink($industriesPageId).'#i-'.$industries[0]->term_id;
    ?>
    <a href="<?= $href ?>" class="cs__category cs__category--industry">
        <?= $industries[0]->name ?>
    </a>
<?php endif; ?>
<?php if (is_array($services) && count($services) > 0): ?>
    <?php $post = get_post($services[0]); ?>
    <?php if ($post !== null): ?>
        <?php
        $shortName = get_field('services_short_name', $post);
        if (!$shortName) {
            $shortName = $post->post_title;
        }
        ?>
        <a href="<?= get_permalink($post) ?>" class="cs__category cs__category--service">
            <?= $shortName ?>
        </a>
    <?php endif; ?>
<?php endif; ?>