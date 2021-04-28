<?php

/**
 * Template Name: Chinese Identity
 */

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

if ($request->get('term') !== null) {
    $query = new WP_Query([
        'posts_per_page' => -1,
        'post_type' => 'true_identity',
        'post_status' => 'publish',
        's' => trim($request->get('term')),
    ]);

    $posts = $query->get_posts();
    wp_reset_query();
}

$bottomContent = get_field('chinese_identity_content');

?>
<?= View::make('page/top_banner', [
    'header' => get_field('top_banner_text'),
    'image' => get_field('top_banner_image'),
    'video' => get_field('top_banner_video'),
    'backgroundVideo' => get_field('top_banner_background_video')
]) ?>
<div class="ci">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ci__searcher">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="GET" action="<?= get_permalink(getenv('PAGE_CHINESE_IDENTITY')) ?>">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="term" placeholder="Enter your business or organisation name here...">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="ci__results">
                            <?php if ($request->get('term') !== null) : ?>
                                Displaying <?= count($posts) ?> Result(s) for:
                                <span class="ci__results__term"><?= $request->get('term') ?></span>
                                <?php if (count($posts) > 0) : ?>
                                    <div class="ci__results__translation">
                                        <?php foreach ($posts as $post) : ?>
                                            <div class="row">
                                                <div class="col-sm-6 ci__results__translation__left">
                                                    <?= $post->post_title ?>
                                                </div>
                                                <div class="col-sm-6 text-right ci__results__translation__right">
                                                    Translation
                                                    <p><?= get_field('translation', $post) ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($bottomContent !== null && trim(strip_tags($bottomContent)) != '') : ?>
            <div class="ci__bottom-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?= $bottomContent ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>