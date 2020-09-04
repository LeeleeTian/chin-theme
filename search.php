<div class="search-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Showing results for <i><?= get_search_query() ?></i></h1>
                <div class="search-page__list">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post(); ?>
                            <?php
                            if (get_post_type() == 'true_identity') {
                                $link = get_permalink(getenv('PAGE_CHINESE_IDENTITY')).'?term='.urlencode(get_the_title());
                            } else {
                                $link = get_permalink();
                            }
                            ?>

                            <h4><a href="<?php echo $link; ?>"><?php the_title();  ?></a></h4>
                        <?php endwhile; ?>
                        <div class="search-page__pagination">
                            <?= paginate_links([
                                'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i> Previous Page',
                                'next_text' => 'Next Page <i class="fa fa-chevron-right" aria-hidden="true"></i>',
                            ]); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>