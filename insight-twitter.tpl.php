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
 * 4) $logo
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
          <span class="tweet-author"><?php print $tweet->format_username; ?></span> </br>
          <span class="tweet-text"><?php print $tweet->text; ?></span>
          <div class="tweet-footer">
            <span class="tweet-bird"><?php print $logo; ?> </span>
            <span class="tweet-time"><?php print $tweet->time; ?> </span>
          <span class="tweet-intents"><?php print $tweet->links?> </span></div>
        </div>

        <?php if ($tweet_key < $tweet_count - 1): ?>
          <div class="tweet-divider"></div>
        <?php endif; ?>
        
      </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
