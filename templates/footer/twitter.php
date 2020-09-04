<?php
$twitter = new Twitter(
    getenv('TWITTER_CONSUMER_KEY'),
    getenv('TWITTER_CONSUMER_SECRET'),
    getenv('TWITTER_ACCESS_TOKEN'),
    getenv('TWITTER_ACCESS_TOKEN_SECRET')
);

try {
    $tweets = $twitter->getLatestTweets('chincomms');
} catch (Exception $e) {
    // ignore exception
    $tweets = [];
}
?>

<?php foreach ($tweets as $k => $tweet): ?>
    <div class="col-md-3">
        <p class="footer__twitter__label<?= ($k > 0) ? ' hidden-xs' : ''; ?>">
            <?php if($k == 0): ?>
                <?= Lingo::get('label.twitter_feed') ?>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </p>
        <div class="footer__twitter__tweet" style="background-image: url('<?= $tweet->user->profile_image_url_https ?>');">
            <p class="footer__twitter__user-name">
                <?= $tweet->user->name ?>
                <span class="footer__twitter__user-login">@<?= $tweet->user->screen_name ?></span>
            </p>
            <p class="footer__twitter__tweet-content">
                <?= preg_replace('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', '<a href="$0" target="_blank">$0</a>', $tweet->text) ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>
