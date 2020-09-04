<?php

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter
{
    protected $connection;

    public function __construct($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret)
    {
        $this->connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
    }

    public function getLatestTweets($account, $count = 3)
    {
        return $this->connection->get('statuses/user_timeline', ['count' => 3, 'screen_name' => $account]);
    }
}