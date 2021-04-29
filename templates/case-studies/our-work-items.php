        <!-- 这里是每一个case study unit 的预览页内容 -->

        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 col-lg2-3" style="margin-bottom:25px;">

                    <!-- 这里开始是具体的内容 -->
                    <a href="<?= get_permalink($post) ?>" class="our-work__element__more">
                        <div style="position:relative;">
                            <!-- title -->
                            <div style="width: 100%;position:absolute;bottom:0;padding-top:5px;" class="top-title-inside">
                                <span style="margin:5px;"><?= $post->post_title ?></span>
                                <div style="margin:5px;"><span class="btn btn--square"></span></div>
                            </div>

                            <!-- photo -->
                            <img src="<?= get_field('cs_background', $post)['url'] ?>" alt="" style="width:100%;">
                        </div>
                    </a>

                </div>

            <?php endforeach; ?>
        </div>

        <style>
            /* 适配范围是992开始 */
            /* 以下是需要隐藏的部分 */
            @media only screen and (min-width: 992px) {
                .hide-me {
                    display: none;
                }

                .make-me-bigger {
                    width: 100%;
                }





            }

            .top-title-inside {
                font-size: 18px;
                color: white;
                background-color: rgba(2, 2, 2, .6);
            }
        </style>