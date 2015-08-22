<?php get_header(); ?> 

<div id="main"><div class="wrapper">

<div id="welcome">

<!--Begin Postcontent-->
<div class="post_snippet_single">
<div class="wrap_single">
<?php if(have_posts()) : ?>
    <?php while(have_posts()): the_post(); ?>
	
    <?php $Thumbnail = get_post_meta($post->ID, 'Thumbnail', $single = true); ?>  
  
	
	<?php if($Thumbnail !== '') { ?>      	
    
	<img src="<?php echo $Thumbnail;?>" class="postthumbnail"/>  
	
	
	<?php } ?>  
	
	 
	<div class="h2"><h2><a href="<?php the_permalink(); ?>" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
    <div class="posted"><b>Posted in</b> <?php the_category(’, ‘); ?> <?php the_date(); ?></div>
	<div class="post"><?php the_excerpt(); ?></div>
	<div class="single_post_"><?php the_content(); ?></div>
	
    </div>
	<div class="comments"></div>
	
	<?php endwhile; ?>
    <?php else:     ?>
	<h2> Sorry, could not find any blogpost </h2>
	<div><?php get_search_form(); ?>
	
	<?php endelse   ?>
	<?php endif ;   ?>
    
    
        
   
    
   </div><!--End welcome--><div class="postauthor"><div class="authorh1">This post was written by <?php the_author(', ') ?></div>
   
   <?php if (function_exists('the_author_image')) { ?>   
   <div class=" authorimage"><?php the_author_image(); ?></div><?php the_author_description(); ?>

   <?php } ?>     

     
   <div class="authorweb"><a href=" <?php the_author_url(); ?>  "><img src="<?php bloginfo('template_directory'); ?>/images/website.png"></a></div>

   
   </div>
 
   <?php if (function_exists('bookmark_me')) { ?>
 
   <div id="share">
   <div class="icons">
   <?php echo bookmark_me(); ?>
   
   </div>
   <a href="<?php bloginfo('rss2_url');?>"<img src="<?php bloginfo('template_directory'); ?>/images/share.png" class="shareicon"></a>
   
   </div>
   
    <?php } ?> 
   
   <div id="related">
   
   <?php comments_template(); ?>
   
   </div>
</div><?php get_sidebar() ; ?>
</div>



</div>
</div>
</div>

<?php get_footer(); ?>