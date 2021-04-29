<?php
if (!isset($post)) {
    $post = get_post();
}
$ancestors = get_post_ancestors($post);
array_walk($ancestors, function (&$item) {
    $item = get_post($item);
});
$ancestors = array_reverse($ancestors);

if (!isset($title)) {
    if (isset($display) && $display !== '') {
        $title = $display;
    } else {
        $title = $post->post_title;
    }
}
$poster = get_field('video_poster');

?>


<div class=" top-banner container">
    <video class="video video-size-fit" autoplay loop muted>
        <source src="https://www.chincommunications.com.au/wp-content/uploads/2021/04/1-Marketing-Landing-Page-1410x792-1.mp4" type="<?= $backgroundVideo['mime_type'] ?>" />
    </video>
</div>


<style>
    .video-size-fit {
        width: 100%;
        object-fit: contain;
    }
</style>