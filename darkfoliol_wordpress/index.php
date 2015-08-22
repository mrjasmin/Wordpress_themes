<?php get_header(); ?> 

<div class="wrapper">
<div id="main">

<div id="welcome">

<!--Begin Postcontent-->

<?php


if ( is_category() ) { ?>
 
<div class='currently'> 
   
<?php single_cat_title('Currently browsing ');

echo "</div>" ;   
  
} 

else {
   
 
}
?>


<?php if(have_posts()) : ?>
      
    
    
    <?php while(have_posts()): the_post(); ?>
    

   <?php $Thumbnail = get_post_meta($post->ID, 'Thumbnail', $single = true); ?>  
     
	<div class='post_snippet'>
    <div class='wrap'>
	
	<?php if($Thumbnail !== '') { ?>      	
    
	<img src="<?php echo $Thumbnail;?>" class="postthumbnail"/>  
	
	
	<?php } ?>  
	 
	<h2><a href="<?php the_permalink(); ?>" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <div class="posted"><b>Posted in</b> <?php the_category(’, ‘); ?> <?php the_date(); ?></div>
	<div class="post"><?php the_excerpt(); ?></div>
    </div>
   
	<div class="comments"><div class="com_pic"><h6><?php comments_popup_link('0', '1', '%'); ?></h6></div>
	<div class="readmore"><a href="<?php the_permalink(); ?>" title="Permanent link to <?php the_title_attribute(); ?>">Continue reading</a></div>
	</div>
	
	</div>

	<?php endwhile; ?>
	<div class="navigation"><p><?php posts_nav_link('&#8734;','&laquo;&laquo; Newer entries
','Older entries &raquo;&raquo;'); ?></p></div>
     </div>
    <?php else:     ?>
	<h2> Could not find any blogpost </h2>
	
	<?php endif ;   ?>



<?php get_sidebar() ; ?>

</div>

</div>
</div>

<div id="footerborder"></div>
<?php get_footer(); ?>
