<div id="sidebar">
<ul>
<?php

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) :

?>


<?php if (function_exists('twitter_messages')) { ?>

<img src="<?php bloginfo('template_directory'); ?>/images/2.png" id="twitter"/>


<div class="tweets">

<?php twitter_messages('mrjasmin', 3, false, true, 'Read', false, false, true); ?>

</div>

<?php } ?>

<li>
<h3>Archives</h3>

<ul>

<?php wp_get_archives('type=monthly') ;?>

</ul>
</li>

<?php if (function_exists('get_flickrRSS')) { ?>

<li class="flickr">
<h2>Flickr RSS feed</h2>
<?php get_flickrRSS(); ?>
</ul>
</li>

<?php } ?>

<?php if (function_exists('wp_bannerize')) { ?>

<div class="banner">
<ul>
<h2>Advertisments</h2>
<?php wp_bannerize(); ?>
<p><a href="#">Learn More About Advertising Here</a></p>
</li>
</ul>

<?php } ?>


<?php endif;?></ul></div>