<?php
// $Id$

/**
 * @file
 * Theme template for a list of tweets in full mode.
 *
 * Available variables in the theme include:
 *
 * 1) An array of $tweets, where each tweet object has:
 *   $tweet->id
 *   $tweet->username
 *   $tweet->userphoto
 *   $tweet->text
 *   $tweet->timestamp
 *
 * 2) $twitkey string containing initial keyword.
 *
 * 3) $title
 *
 * 4) $twitter_bird
 */
?>

<div class="tweets-pulled-page">

  <?php if (!empty($title)): ?>
    <h2><?php print $title; ?></h2>
  <?php endif; ?>

  <?php if (is_array($tweets)): ?>
    <?php $tweet_count = count($tweets); ?>
    
    <ul class="tweets-pulled-listing">
    <?php foreach ($tweets as $tweet_key => $tweet): ?>
      <li>
        <div class="tweet-authorphoto"><img src="<?php print $tweet->userphoto; ?>" alt="<?php print $tweet->username; ?>" /></div>
        <div class="tweet-content">
          <span class="tweet-author"><?php print l($tweet->username, 'https://twitter.com/intent/user?screen_name=' . $tweet->username); ?></span> </br>
          <span class="tweet-text"><?php print twitter_pull_add_links($tweet->text); ?></span>
          <div class="tweet-footer">
            <span class="tweet-bird"><?php print $twitter_bird; ?> </span>
            <span class="tweet-time"><?php print l(format_interval(time() - $tweet->timestamp), 'http://twitter.com/' . $tweet->username . '/status/' . $tweet->id); ?> </span>
          <span class="tweet-intents"><?php print generateIntents($tweet->id)?> </span></div>
        </div>

        <?php if ($tweet_key < $tweet_count - 1): ?>
          <div class="tweet-divider"></div>
        <?php endif; ?>
        
      </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
