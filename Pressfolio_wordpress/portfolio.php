<?php 

/* Template Name: Portfolio
*/ 

?> 


<?php get_header(); ?>
    


<div id="slider2">

<div id="sliderwrap2">

<h2>Browsing Portfolio</h2>

</div>



</div>

	
	<div id="content">
	<div class="wrapper">

	<div id="leftcontent_first">

    <h2></h2>
    
	<?php require(TEMPLATEPATH . "/var.php"); ?>
	
	<?php if (have_posts()) : ?>
    
    <?php $category = get_cat_id($portfoliocat) ; ?> 
    
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged&cat=$category"); ?>     

    <?php while (have_posts()) : the_post(); ?>
	
    <?php if(get_post_meta($post->ID, "image_value", $single = true) != "") :  ?>  
	
	<div class="blogbox">
    
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
   
    <div class="portfolioimage">
	
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", $single = true); ?>&h=140&w=330&zc=1" alt="<?php the_title(); ?>"/></a>
	
	</div>
  
    
    
    <div class="portfoliocontent"><p><?php excerpt('30'); ?></p><div class="continue"><a href="<?php the_permalink(); ?>">Continue</a></div></div>
        
    </div>
	
   
    <?php else: ?>
  
    	
    <div class="blogbox">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
   

    <div class="postcontent2"><p><?php the_excerpt(); ?></p><div class="continue"><a href="single-blog.html">Continue</a></div></div>
        
    </div>	
	
	<?php endif; ?>
	<?php endwhile; ?>
    <div class="navigation"><?php wp_pagenavi(); ?></div>
    <?php else:     ?>
	<h4> Could not find any blogpost </h4>
	<?php endif ;   ?>

 
	</div>  
  

	<div id="rightcontent_first">
	
    <?php get_sidebar(); ?>
    
             
</div>
</div>
</div>
	
<?php get_footer(); ?>