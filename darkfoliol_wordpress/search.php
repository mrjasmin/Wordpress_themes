<?php get_header(); ?> 


<div id="main"><div class="wrapper">

<div id="welcome">


<?php if(have_posts()) : ?>
      
    
    
    <?php while(have_posts()): the_post(); ?>
    

    <?php $Thumbnail = get_post_meta($post->ID, 'Post Thumbnail', $single = true); ?>   
     
	<div class='post_snippet'>
    <div class='wrap'>
	<?php if($Thumbnail !== '') { ?> 
	 
	 <img src="<?php bloginfo( 'template_directory' ); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "Post Thumbnail", true);?>&amp;w=250&amp;amp;amp;amp;amp;h=250&amp;amp;amp;amp;amp;zc=1" alt="<?php the_title(); ?>" class="postthumbnail"/>    
	
	<?php } ?>  
	 
	<h2><a href="<?php the_permalink(); ?>" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <div class="posted"><b>Posted in</b> <?php the_category(’, ‘); ?> <?php the_date(); ?></div>
	<div class="post"><?php the_excerpt(); ?></div>
    </div>
   
	<div class="comments"><h6><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></h6></div>
	
	</div>

	<?php endwhile; ?>
	<div class="navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Newer entries
','Older entries &raquo;&raquo;'); ?></p></div>
     </div>
    <?php else:     ?>
	<div class="post_snippet"><div class="wrap"><h3> Could not find any blogpost. Please try again ! </h3></div></div>
	
	<?php endif ;   ?>

	

</div>

<?php get_sidebar() ; ?>


</div>

</div>
</div>

<div id="footerborder"></div>
<?php get_footer(); ?>