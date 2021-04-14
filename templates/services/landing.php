<!-- communication and marketing services内容页面 -->


<?php

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$industryString = $request->query->get('industries');
$serviceString = $request->query->get('services');
global $wp_query;

if (
    $industryString == null
    && isset($wp_query->query_vars['industries'])
) {
    $industryString = $wp_query->query_vars['industries'];
}

if (
    $serviceString == null
    && isset($wp_query->query_vars['services'])
) {
    $serviceString = $wp_query->query_vars['services'];
}

// 这里修改cases study 数量限制
$params = [
    'posts_per_page' => 8,
    'post_type' => 'true_case_study',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'suppress_filters' => false,
];

if ($industryString !== null && $industryString != 0) {
    $industries = explode(',', $industryString);

    if (!isset($params['meta_query'])) {
        $params['meta_query'] = [];
    }

    $query = [
        'relation' => 'OR'
    ];
    foreach ($industries as $industry) {
        array_push($query, [
            'key' => 'cs_industry',
            'value' => $industry,
            'compare' => 'LIKE'
        ]);
    }
    array_push($params['meta_query'], $query);
} else {
    $categoryString = 0;
}

if ($serviceString !== null) {
    $services = explode(',', $serviceString);

    if (!isset($params['meta_query'])) {
        $params['meta_query'] = [];
    }

    $query = [
        'relation' => 'OR'
    ];
    foreach ($services as $service) {
        array_push($query, [
            'key' => 'cs_service',
            'value' => $service,
            'compare' => 'LIKE'
        ]);
    }
    array_push($params['meta_query'], $query);
}

if (isset($params['meta_query']) && count($params['meta_query']) > 1) {
    $params['meta_query']['relation'] = 'AND';
}

$posts = get_posts($params);

$params['posts_per_page'] = -1;
$totalPosts = count(get_posts($params));

//pink bottom banner
$backgroundVideo = get_field('bottom_banner_pink');
// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $backgroundVideo, $matches);
$src = $matches[1];  //pink video link address

//grey bottom banner
$backgroundVideo2 = get_field('bottom_banner_grey');
// Use preg_match to find iframe src2.
preg_match('/src="(.+?)"/', $backgroundVideo2, $matches2);
$src2 = $matches2[1];



?>
<?php
$services = get_children([
    'post_parent' => get_post()->ID,
    'post_type'   => 'page',
    'orderby'     => 'menu_order',
    'order'       => 'ASC',
    'post_status' => 'publish'
]);

?>

<!-- 页面开始 -->
<div class="services">
    <div class="container">

        <h1 style="width:100%;text-align:center;">Featured Work</h1>
        <div class="row">
            <div class="red-area2 embed-responsive" style="position: relative;">
                <div class="red-area-inside" style="position: absolute;">
                    <span>Chin your China ready marketing agency: helping you succeed in the Chinese market</span>
                </div>
            </div>

        </div>
        <?php foreach ($posts as $post) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-lg2-3" style="margin-bottom:25px;">

                <!-- 这里开始是具体的内容 -->
                <a href="<?= get_permalink($post) ?>" class="our-work__element__more">
                    <div style="position:relative;">
                        <!-- title -->
                        <div style="width: 100%;position:absolute;bottom:0;padding-top:5px;padding-bottom:5px;" class="top-title-inside">
                            <span class="case-title" style="font-size: 1.2vw;"><?= $post->post_title ?></span>
                        </div>
                        <!-- photo -->
                        <img src="<?= get_field('cs_background', $post)['url'] ?>" alt="" style="width:100%;">
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
        <!-- end foreach cases -->
    </div>
    <!-- pink banner -->
    <div class="row">
        <div class="red-area2 embed-responsive" style="position: relative;">
            <?php if ($src) : ?>
                <!-- The video -->
                <video autoplay muted loop class="myVideo" class="embed-responsive-item">
                    <source src=<?= $src ?> type="video/mp4">
                </video>
            <?php endif;  ?>

            <div class="red-area-inside" style="position: absolute;">
                <span>Helping brands develop their strategy to enter China's fast evolving market</span>
                <div class="find_more">find out more</div>
            </div>
        </div>

    </div>
    <!-- grey banner-->
    <div class="row">
        <div class="red-area2 embed-responsive" style="background-color: #f1f1f1;color:black;position: relative;">
            <?php if ($src2) : ?>
                <!-- The video -->
                <video autoplay muted loop class="myVideo" class="embed-responsive-item">
                    <source src=<?= $src2 ?> type="video/mp4">
                </video>
            <?php endif;  ?>

            <div class="red-area-inside" style="position: absolute;">
                <span>China Market Research | China Strategy</span><br>
                <span>Wechat Managment | Branding and Communication Design</span>
                <div class="find_more">find out more</div>
            </div>
        </div>
    </div>
    <!-- banner content start -->



    <!-- banner content end -->
</div>
</div>

<style>
    /* 适配范围是992开始 */
    /* 以下是需要隐藏的部分 */
    @media only screen and (min-width: 992px) {}

    .case-title {
        font-size: 1.6vw;
    }

    .top-title-inside {
        font-size: 1vw;
        color: white;
        background-color: rgba(2, 2, 2, .6);
    }

    /* 小红区域 */
    .red-area1 {
        padding: 20px;
        text-align: center;
        margin: 15px;
        height: 200px;
        font-size: 1.5vw;
        color: white;
        background-color: #f65057;
    }

    .red-area2 {
        padding: 20px;
        text-align: center;
        margin: 15px;
        height: 300px;
        font-size: 1.5vw;
        color: white;
        background-color: #f65057;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .red-area2 .find_more {
        width: 25%;
        height: 35px;
        border: 2px solid white;
        text-align: center;
        margin: 10px auto;
    }

    .myVideo {
        object-fit: cover;
    }
</style>
<script>

</script>