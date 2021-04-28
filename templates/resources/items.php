<!-- resources 每一个unit详情页 -->
<?php if (count($posts) == 0) : ?>
    <p class="resources__pagination__label"><?= Lingo::get('label.resources_empty_set') ?></p>
<?php else : ?>
    <div class="row">
        <?php foreach ($posts as $post) : ?>
            <div class="col-md-3 col-lg-3 col-lg2-3">
                <li class="resources__item">
                    <div class="row" style="position:relative;border:2px solid white;">
                        <!-- 上方标题 -->
                        <div style="width: 100%;position:absolute;top:0;padding-top:5px; padding-bottom:5px;text-align:center; background-color: rgba(2, 2, 2, .6);color:white;" class="top-title-inside">
                            <span style="font-size: 1vw;"><?= $post->post_title ?></span>
                        </div>
                        <img src="<?= get_field('resource_image', $post)['url'] ?>" alt="" style="width:100%;">
                        <!-- 底部链接 -->
                        <div class="col-md-12 resources__overlay" style="width:100%;">
                            <?php
                            $pdf = get_field('resource_pdf', $post);
                            $relatedWork = get_field('resource_related_work', $post);
                            $resourceLink = get_field('resource_link_label', $post);
                            $links = get_field('resource_links', $post);
                            ?>
                            <div>
                                <?php if ($pdf) : ?>
                                    <a class="resources__link resources__download" href="<?= $pdf['url'] ?>" target="_blank"><?= Lingo::get('label.download_view_pdf') ?></a>
                                <?php endif; ?>
                                <?php if ($relatedWork) : ?>
                                    <a class="resources__link resources__work" href="<?= $relatedWork ?>" target="_blank"><?= Lingo::get('label.view_related_work') ?></a>
                                <?php endif; ?>
                                <?php if ($resourceLink) : ?>
                                    <a class="resources__link resources__resources-link" href="<?= get_permalink(getenv('PAGE_CHINESE_IDENTITY')) ?>">
                                        <?= $resourceLink ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (is_array($links)) : ?>
                                    <?php foreach ($links as $link) : ?>
                                        <a class="resources__link resources__resources-link" href="<?= $link['link'] ?>">
                                            <?= $link['label'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                </li>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<style>
    /* 适配范围是992开始 */
    /* 以下是需要隐藏的部分 */
    @media only screen and (min-width: 992px) {


        .r-make-me-bigger {
            width: 100%;
        }

        .r-case-title {
            font-size: 1.6vw;
        }


    }
</style>