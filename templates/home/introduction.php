<?php
$label = get_field('video_label');
$auto = get_field('auto_play_video');
$poster = get_field('auto_play_poster');
$video = get_field('video_url');
?>

<div class="container" style="margin-bottom: 40px;">
    <div class="d-flex">
        <div class="flex-item video-text" style="background-color: rgb(246,80,88)">
            <h3>Experts in:</h3>
            <p>Chinese Translation and Interpreting</p>
            <p>Brand and IP Protection</p>
            <p>Marketing and Social Media</p>
            <a class="flex-button" href="https://www.chincommunications.com.au/growing-your-china-business-through-covid-19/">
                Our COVID-19 commitment<br/>
                Tel: 1300 792446
            </a>
        </div>
        <div class="flex-item">
            <div class="embed-responsive embed-responsive-16by9">
                <?php if($auto) : ?>
                <video class="video" preload loop poster="<?= $poster ? $poster['url'] : '' ?>">
                    <source src="<?= $auto['url'] ?>" type="<?= $auto['mime_type'] ?>" />
                </video>
                <button class="play-link">
                    <i class="fa fa-play icon"></i>
                </button>
                <script type="text/javascript">
                    var video = document.querySelector('video.video');
                    var playBtn = document.querySelector('button.play-link');
                    playBtn.addEventListener('click',function () {
                        video.play();
                        video.setAttribute('controls',true);
                        this.style.display = 'none';
                    })
                </script>
                <?php elseif ($video) : ?>
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/k1EK-_LGKsI?rel=0&modestbranding=1&loop=1" allowfullscreen></iframe>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="cc-service-box">
                <img class="cc-service-img" src="<?= site_url('wp-content/themes/chin-theme/assets/img/updates/icon4.png'); ?>" alt="Design your Chinese brand">
                <h5 class="cc-service-title">Design your Chinese brand</h5>
                <p class="cc-service-body">Enjoy a customised Chinese brand and profile to protect your China future and resonate with your Chinese buyers</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="cc-service-box">
                <img class="cc-service-img" src="<?= site_url('wp-content/themes/chin-theme/assets/img/updates/icon5.png'); ?>" alt="Create your ideal message">
                <h5 class="cc-service-title">Create your ideal message</h5>
                <p class="cc-service-body">Ensure your China materials are correct, tailored to your audience values, and speak their language</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="cc-service-box">
                <img class="cc-service-img" src="<?= site_url('wp-content/themes/chin-theme/assets/img/updates/icon6.png'); ?>" alt="Find your Chinese buyers">
                <h5 class="cc-service-title">Find your Chinese buyers</h5>
                <p class="cc-service-body">Start with the right strategy, propel the right Chinese messages and connect to your Chinese audience on their preferred channels</p>
            </div>
        </div>
    </div>
    <div class="row cc-body-text" style="margin-bottom: 40px;">
        <div class="col-12 text-center">
            <p>
                We help businesses who want to break into the Chinese market but are unsure how to communicate their product and service offering by providing accurate and culturally targetted translation and marketing services so the business can attract interest, protect its IP, and grow in the world’s largest market.
            </p>
            <p style="color: rgb(246,80,96)">
                We have a simple process that works:
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="cc-service-box">
                <img class="cc-service-img" src="<?= site_url('wp-content/themes/chin-theme/assets/img/updates/icon1.png'); ?>" alt="Develop a strategy">
                <h5 class="cc-service-title">Develop a strategy</h5>
                <p class="cc-service-body">Develop a strategic plan to help smooth your entry to the China market.</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="cc-service-box">
                <img class="cc-service-img" src="<?= site_url('wp-content/themes/chin-theme/assets/img/updates/icon2.png'); ?>" alt="Become China ready">
                <h5 class="cc-service-title">Become China ready</h5>
                <p class="cc-service-body">Translate and protect your collateral ready for your Chinese audience.</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="cc-service-box">
                <img class="cc-service-img" src="<?= site_url('wp-content/themes/chin-theme/assets/img/updates/icon3.png'); ?>" alt="Enter the markert">
                <h5 class="cc-service-title">Enter the market</h5>
                <p class="cc-service-body">Enter the market through the optimal channels and accelerate your
                    China journey.</p>
            </div>
        </div>
    </div>
    <div class="row cc-body-text">
        <div class="col-12 text-center">
            <p>
                To succeed in the Chinese market you must communicate in Chinese. The good news is you don’t need to start learning Mandarin. Through our straightforward process, Chin Communications’ Chinese translators and marketers have helped thousands of businesses enter the market successfully. With the right plan, the right translations and the right channels, you’ll build an effective business in the China market.
            </p>
            <p style="color: rgb(246,80,96)">
                The first step is a phone call away – 1300 792 446
            </p>
        </div>
    </div>
</div>
