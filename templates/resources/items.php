<?php if (count($posts) == 0): ?>
    <p class="resources__pagination__label"><?= Lingo::get('label.resources_empty_set') ?></p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <li class="resources__item">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= get_field('resource_image', $post)['url'] ?>" class="img-responsive" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="resources__title"><?= $post->post_title ?></h2>
                    <p class="resources__excerpt">
                        <?= get_field('resource_excerpt', $post) ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 resources__overlay">
                    <?php
                    $pdf = get_field('resource_pdf', $post);
                    $relatedWork = get_field('resource_related_work', $post);
                    $resourceLink = get_field('resource_link_label', $post);
                    $links = get_field('resource_links', $post);
                    ?>
                    <div class="col-md-offset-4">
                        <?php if ($pdf): ?>
                            <a class="resources__link resources__download" href="<?= $pdf['url'] ?>" target="_blank"><?= Lingo::get('label.download_view_pdf') ?></a>
                        <?php endif; ?>
                        <?php if ($relatedWork): ?>
                            <a class="resources__link resources__work" href="<?= $relatedWork ?>" target="_blank"><?= Lingo::get('label.view_related_work') ?></a>
                        <?php endif; ?>
                        <?php if ($resourceLink): ?>
                            <a class="resources__link resources__resources-link" href="<?= get_permalink(getenv('PAGE_CHINESE_IDENTITY')) ?>">
                                <?= $resourceLink ?>
                            </a>
                        <?php endif; ?>
                        <?php if (is_array($links)): ?>
                            <?php foreach ($links as $link): ?>
                                <a class="resources__link resources__resources-link" href="<?= $link['link'] ?>">
                                    <?= $link['label'] ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
