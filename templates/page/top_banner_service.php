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
    <video class="video video-size-fit" preload loop poster="https://www.chincommunications.com.au/wp-content/uploads/2021/04/1-Marketing-Landing-Page-1410x792-1.jpg">
        <source src="https://www.chincommunications.com.au/wp-content/uploads/2021/05/Chin-Marketing-Overview-Final.mp4" type="video/mp4" />
    </video>
    <button class="play-link">
        <i class="fa fa-play icon"></i>
    </button>
    <script type="text/javascript">
                                        var video = document.querySelector('video.video');
                                        var playBtn = document.querySelector('button.play-link');
                                        playBtn.addEventListener('click', function() {
                                            video.play();
                                            video.setAttribute('controls', true);
                                            this.style.display = 'none';
                                        })
     </script>
</div>


<style>
    .video-size-fit {
        width: 100%;
        object-fit: contain;
    }
</style>