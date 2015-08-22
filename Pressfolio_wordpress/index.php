<?php 

/* Template Name: home
*/ 

?> 


<?php
require(TEMPLATEPATH . "/var.php"); ?>

<?php get_header(); ?>

<body>

<div id="slider">

<div id="sliderwrap">
<div class="sliderbox">

<div class="sliderimage"><img src="<?php bloginfo('template_directory');?>/images/cornerimage.png" class="cornerimage" alt="cornerimage"/>

<div class="scroll">
<ul>

<?php if (have_posts()) : ?>
    
<?php $category = get_cat_id($portfoliocat) ; ?> 
    
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged&cat=$category"); ?>     

<?php while (have_posts()) : the_post(); ?>

 <?php if(get_post_meta($post->ID, "image_value", $single = true) != "") :  ?>  
    
    <li>
    
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", $single = true); ?>&h=204&w=604&zc=1" alt="<?php the_title(); ?>"/></a>
    
    </li>

	
	<?php
    endif;
    ?>

<?php endwhile; ?>
<?php endif; ?>


</ul>

</div>
</div>

<div id="slidertext">

<ul>


<?php if (have_posts()) : ?>
    
<?php $category = get_cat_id($portfoliocat) ; ?> 
    
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged&cat=$category"); ?>     

<?php while (have_posts()) : the_post(); ?>


<li><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php excerpt('40') ; ?></p></li>
<?php endwhile; ?>
<?php endif; ?>


</ul>

</div><div class="buttons2">
  
  <a class="prev" href="#">prev</a>
  <a class="next" href="#">next</a>
        
</div>
</div>


</div>
</div>

	<div id="content">
	<div class="wrapper">

	<div id="leftcontent_first">
    
	    <?php if ($welcomeh2) { ?>
        <h2 class="welcome"><?php echo $welcomeh2; ?></h2>
        <?php } else { ?>
        <h2 class="welcome">Welcome to Pressfolio theme</h2>
        <?php } ?>
	    
		
		<?php if ($introtext) { ?>
        <p class="introtext"><?php echo $introtext; ?></p>
        <?php } else { ?>
        <p class="introtext">
        The font i have used in this website is an Arial system default font with letter-spacing -1px. In vel orci. Praesent sit amet diam sed orci volutpat  facilisis. Aenean varius, ligula a blandit ornare, nulla elit porttitor tellus, quis bibendum elit ante nec metus. Donec metus lacus, porta id, auctor sit amet, aliquam eu, lacus. Quisque sagittis vulputate orci.In vel orci. Praesent sit amet diam sed orci volutpat facilisis. Aenean varius, ligula a blandit ornare, nulla elit porttitor tellus, quis bibendum elit ante nec metus. Donec metus lacus, porta id, auctor sit amet, aliquam eu, lacus. Quisque sagittis vulputate orci.In vel orci. Praesent sit amet diam sed orci volutpat facilisis. Aenean varius, ligula a blandit ornare, nulla elit porttitor tellus, quis bibendum elit ante nec metus. Donec metus lacus, porta id, auctor sit amet, aliquam eu, lacus. Quisque sagittis vulputate orci.</p>	
        <?php } ?>
        
        
        <h3>Services</h3>
        <ul>
        <li class="serviceitem">
        
        <div class="serviceimg"><img src="<?php bloginfo('template_directory'); ?>/images/xhtml.png" alt="xhtml"/></div> 
        </li>      

        <li class="serviceitem">
        
        <div class="serviceimg"><img src="<?php bloginfo('template_directory'); ?>/images/wordpress.png" alt="wordpress"/></div> 
        </li> 

        <li class="serviceitem">
       
        <div class="serviceimg"><img src="<?php bloginfo('template_directory'); ?>/images/ps2.png" alt="photoshop"/></div> 
        </li> 

        </ul>
        </div> 

	<div id="rightcontent_first">
	<div class="margin">
	
        </div>
       
        <div id="blogposts">
        <h2>Latest from the blog</h2>
        
        <div id="blogcontainer"><ul>
		
	    <?php if (have_posts()) : ?>
    
        <?php $category = get_cat_id($blogcat) ; ?> 
    
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged&cat=$category"); ?>     

         <?php while (have_posts()) : the_post(); ?>
	
  	<li>
     
    <a href="<?php the_permalink('Continue'); ?>" class="sliderp"><?php the_title(''); ?></a>
    
    <div class="excerpt"><p><?php excerpt('15'); ?></p></div>
       
	<p><?php the_author();?> On <?php the_time('F j, Y'); ?> in | <b><?php the_category(', '); ?></b></p>
             
    </li>
		
		
    <?php endwhile; ?>
    
    <?php else:     ?>
	<h4> Could not find any blogpost </h4>

	<?php endif ;   ?>
	
		
		</ul>

       
        </div>
        <div class="buttons2">
        <a class="prev3" href="#"></a>
        <a class="next3" href="#"></a>
        
        </div>
        </div>
	


     <div id="flickrfeed">
	 <h3>Flickr feed</h3>
	 
      <ul>
	
	    <li>
		
    
        <?php if ($flickr) { ?>
        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=4&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickr ; ?>"></script>
        <?php } else { ?>
        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=4&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=40201646@N05"></script>
        <?php } ?>
        
		
	    
		</li>
	
    </ul>

    </div>

       
	</div>
	</div>
	</div>

<?php get_footer(); ?>