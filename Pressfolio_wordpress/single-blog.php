<?php get_header(); ?>

<div id="slider2">

<div id="sliderwrap2">

<h2>Blog</h2>

</div>

</div>

	
	<div id="content">
	<div class="wrapper">

	<div id="leftcontent_first">

    <h2></h2>

	<?php require(TEMPLATEPATH . "/var.php"); ?>
	
	<?php if (have_posts()) : ?>
      

    <?php while (have_posts()) : the_post(); ?>
	
    <?php if(get_post_meta($post->ID, "image_value", $single = true) != "") :  ?>  
	
	
        <div class="blog_single">
        
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
	     <div class="singleinfo">Posted on <span><?php the_time('F j, Y'); ?></span> <span>Posted in <?php the_category(', '); ?></span></div>

        <div class="blogimage_single">
	
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", $single = true); ?>&h=105&w=150&zc=1" alt="<?php the_title(); ?>"/></a>
	
	</div>
  
        <div class="blog_single"><?php the_content();?></div></div>
    
	
	<?php
    else:
    ?>
  
	<div class="blog_single">
    	

    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
   
    <div class="singleinfo">Posted on <span><?php the_time('F j, Y'); ?></span> <span>Posted in <?php the_category(', '); ?></span></div>

    
    <div class="blog_single"><?php the_content(); ?></div>
        
    </div>	

	
	
	<?php
    endif;
    ?>
		
	<?php endwhile ; ?>
    
	<?php
    endif;
    ?>
	
	<?php comments_template(); ?>	
		
	</div>
  

	<div id="rightcontent_first">
	
    <?php get_sidebar(); ?>
  
</div>
</div>
</div>
	
<?php get_footer(); ?>