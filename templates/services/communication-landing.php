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
//得到指定分类的study case
$params = [
    'tax_query' =>
    array(
        array(
            'taxonomy' => 'true_case_study_tax',  //这里自定义了taxonomy
            'terms'    => 67
        ),
    ),
    'posts_per_page' => 5,
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


//first bottom banner
$backgroundVideo = get_field('communication_and_service_page_bottom_banner_no_1');
// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $backgroundVideo, $matches);
$src = $matches[1];  //pink video link address

//second bottom banner
$backgroundVideo2 = get_field('communication_and_service_page_bottom_banner_no_2');
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

// $image = get_field('sb_image');  //second banner image

?>


<!-- 页面开始 -->
<div class="services container">
    <div style="width:100%;">
        <h1 style="text-align:left;font-weight:bold;margin-left:0.5vw;" class="span3">Featured Work</h1>
        <div class="row" style="margin: 0px;padding:8px;">
            <!-- 上面一排 左右-->
            <div class="col-md-12  col-lg-12 col-xl-12" style="height:100%; padding:0px;position:relative;">
                <!-- 左边块上下 -->
                <div class="col-md-6 col-lg-6 col-xl-6" style="padding:0;height:100%;padding-right:9px;padding-left:9px;">
                    <!-- 灰色块 -->
                    <div class="grey-area grey1">
                        <span class="span1">
                            <span>Chin your China ready marketing agency: <span style="font-weight: 300;">helping you win in the Chinese market</span></span>
                        </span>
                    </div>
                    <!-- 灰色块结束-->
                    <!-- 2号小块 -->
                    <div style="padding:0;margin:0;background-color:red;margin-top:20px;margin-bottom:10px;">
                        <?php foreach ($posts as $post) : ?>
                            <?php if ($post->ID === 8368) : ?>
                            <a href="<?= get_permalink($post)?>">
                                <!-- 这里开始是具体的内容 -->
                                <div style="position:relative;">
                                    <!-- title -->
                                    <div style="width: 100%;position:absolute;top:0;padding-top:5px;padding-left:15px; padding-bottom:5px;text-align:left;" class="top-title-inside">
                                        <span class="case-title"><?= $post->post_title ?></span>
                                    </div>
                                    <!-- photo -->
                                    <img src="<?= get_field('new_list_background_2', $post)['url'] ?>" alt="" style="width:100%;">
                                </div>
                                <!-- 具体内容结束 -->
                            </a>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- 左边块上下结束 -->

                <!-- 1号小块 灰色右边-->
                <div class="col-md-6 col-lg-6 col-xl-6" style="padding-left: 15px;">
                    <?php foreach ($posts as $post) : ?>
                        <?php if ($post->ID === 8367) : ?>
                            <a href="<?= get_permalink($post)?>">
                            <div class="col-md-12  col-lg-12 col-xl-12" style="height:100%; color:white;padding:0px;">
                                <!-- 这里开始是具体的内容 -->
                                <div style="position:relative;">
                                    <!-- title -->
                                    <div style="width: 100%;position:absolute;top:0;padding-top:5px;padding-left:15px; padding-bottom:5px;text-align:left;" class="top-title-inside">
                                        <span class="case-title"><?= $post->post_title ?></span>
                                    </div>
                                    <!-- photo -->
                                    <img src="<?= get_field('new_list_background_1', $post)['url'] ?>" alt="" style="width:100%;">
                                </div>
                                <!-- 具体内容结束 -->
                            </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- 3号小块 -->
            <div class="col-md-4  col-lg-4 col-xl-4 " style="margin-top:20px;">
                <?php foreach ($posts as $post) : ?>
                    <?php if ($post->ID === 8366) : ?>
                        <a href="<?= get_permalink($post)?>">
                        <div class="col-md-12  col-lg-12 col-xl-12" style="height:100%; padding:0px;">
                            <!-- 这里开始是具体的内容 -->
                            <div style="position:relative;">
                                <!-- title -->
                                <div style="width: 100%;position:absolute;top:0;padding-top:5px;padding-left:15px; padding-bottom:5px;text-align:left;" class="top-title-inside">
                                    <span class="case-title"><?= $post->post_title ?></span>
                                </div>
                                <!-- photo -->
                                <img src="<?= get_field('new_list_background_3', $post)['url'] ?>" alt="" style="width:100%;">
                            </div>
                            <!-- 具体内容结束 -->
                        </div>
                    </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- 4号小块 -->
            <div class="col-md-4  col-lg-4 col-xl-4 " style="margin-top:20px;">
                <?php foreach ($posts as $post) : ?>
                    <?php if ($post->ID === 8365) : ?>
                        <a href="<?= get_permalink($post)?>">
                        <div class="col-md-12  col-lg-12 col-xl-12" style="height:100%;padding:0px;">
                            <!-- 这里开始是具体的内容 -->
                            <div style="position:relative;">
                                <!-- title -->
                                <div style="width: 100%;position:absolute;top:0;padding-top:5px;padding-left:15px; padding-bottom:5px;text-align:left;" class="top-title-inside">
                                    <span class="case-title"><?= $post->post_title ?></span>
                                </div>
                                <!-- photo -->
                                <img src="<?= get_field('new_list_background_4', $post)['url'] ?>" alt="" style="width:100%;">
                            </div>
                            <!-- 具体内容结束 -->
                        </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- 5号小块 -->
            <div class="col-md-4  col-lg-4 col-xl-4 " style="margin-top:20px;">
                <?php foreach ($posts as $post) : ?>
                    <?php if ($post->ID === 8364) : ?>
                        <a href="<?= get_permalink($post)?>">
                        <div class="col-md-12  col-lg-12 col-xl-12" style="height:100%; padding:0px;">
                            <!-- 这里开始是具体的内容 -->
                            <div style="position:relative;">
                                <!-- title -->
                                <div style="width: 100%;position:absolute;top:0;padding-top:5px;padding-left:15px; padding-bottom:5px;text-align:left;" class="top-title-inside">
                                    <span class="case-title"><?= $post->post_title ?></span>
                                </div>
                                <!-- photo -->
                                <img src="<?= get_field('new_list_background_5', $post)['url'] ?>" alt="" style="width:100%;">
                            </div>
                            <!-- 具体内容结束 -->
                        </div>
                    </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>


        </div>


    </div>
    <!-- first bottom banner -->
    <div class="row" style="margin-top: 2.88vw;">
        <div class="red-area2 embed-responsive" style="position: relative;background-color:rgb(60,52,56);height:495px;margin-right:0;margin-left:0;">
            <?php if ($src) : ?>
                <!-- The video -->
                <video autoplay muted loop class="myVideo" class="embed-responsive-item">
                    <source src=<?= $src ?> type="video/mp4">
                </video>
            <?php endif;  ?>

            <?php if (!$src) : ?>
                <div class="span2" style="position: absolute;width:70%;text-align:center;">
                    <span>Helping brands develop their strategy to enter China's fast evolving market</span>
                   <a href="https://www.chincommunications.com.au/home/communication-and-marketing-services/china-strategy/" class="remove-link-line"> 
                   <div class="find_more">find out more</div>
                   </a>
                </div>
            <?php endif;  ?>

        </div>

    </div>
    <!-- second bottom banner-->
    <div class="row" style="margin-bottom: 2.88vw;">
        <?php if ($src2) : ?>
            <div class="red-area2 embed-responsive" style="color:black;position: relative;height:495px;text-align:center;">

                <!-- The video -->
                <video autoplay muted loop class="myVideo" class="embed-responsive-item">
                    <source src=<?= $src2 ?> type="video/mp4">
                </video>
            </div>

        <?php endif;  ?>

        <?php if (!$src) : ?>
            <div class="red-area2 embed-responsive" style="color:black;position: relative;height:495px;text-align:center;background-image: url('https://www.chincommunications.com.au/wp-content/uploads/2021/04/微信图片_20210428090821.jpg');">

                <div class="span2" style="position: absolute;width:90%;top:5%;text-align:center;">
                    <span>China Market Research | China Strategy</span><br>
                    <span>Wechat Management | Branding and Communication Design</span>
                    
                    <div class="find_out_how">
                    <a href="https://www.chincommunications.com.au/home/communication-and-marketing-services/chinese-marketing-and-advertising/" class="remove-link-line">
                   <span style="color:#000000;">find out how</span> 
                    </a>
                    <br><span>Call 1300 792 446</span>
                    </div>
                </div>
            </div>
        <?php endif;  ?>

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
        height: 300px;
        font-size: 2vw;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .grey-area {
        font-size: 2vw;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .red-area2 .find_more {
        width: 60%;
        /* height: 35px; */
        border: 2px solid white;
        text-align: center;
        margin: 10px auto;
        padding: 1vw;
        text-transform: uppercase;
        line-height: 2.88vw;
    }

    .myVideo {
        object-fit: cover;
    }

    .grey1 {
        padding-bottom: 50%;
        height: 0;
        text-align: left;
        background-color: rgb(60, 52, 56);
        margin: 0px;
        position: relative;
    }

    .span1 {
        height: 100%;
        font-size: 2.5vw;
        margin-top: 15%;
        margin-left: 10%;
        margin-right: 5%;
    }

    .span2 {
        font-size: 18px;
    }

    .span3 {
        font-size: 38px;
    }
   
    a.remove-link-line:link {
        text-decoration: none;
    }

    a.remove-link-line:visited {
        text-decoration: none;
    }

    a.remove-link-line:hover {
        text-decoration: none;
    }

    a.remove-link-line:active {
        text-decoration: none;
    } 

    .find_out_how{
        width: 47%;
        color:#000000;
        border: 2px solid black;
        text-align: center;
        margin: 10px auto;
        padding: 1vw;
        text-transform: uppercase;
        line-height: 2.88vw;
    }
</style>
<script>

</script>