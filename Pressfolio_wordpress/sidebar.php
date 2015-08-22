 <?php
require(TEMPLATEPATH . "/var.php"); ?>
 
 <div id="sidebar">
 
 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?> 
 
<form method="get" id="searchbar" action="<?php bloginfo('url'); ?>/">
	<input type="text" id="searchblog" value="<?php the_search_query(); ?>" name="s" id="" />
	<input type="submit" id="submitted" value="Search" id="" />
</form>
        


<?php if ( is_page('about') or is_page('About') or is_page('ABOUT') or is_page('contact')  or is_page('Contact')){ ?>
   
<div class="sidebarbox">
	
<h3>Contact info</h3>

<ul class="contactinfo">


<?php if ($phone) { ?>
<li><b>Phone: </b> <?php echo $phone; ?></li>    
<?php } else { ?>
<li><b>Phone:</b> +1234567</li>  
<?php } ?>

<?php if ($fax) { ?>
<li><b>Fax: </b> <?php echo $fax ; ?></li>
<?php } else { ?>
<li><b>Fax:</b> +123456789</li>
<?php } ?>

<?php if ($email) { ?>
<li><b>Email: </b> <?php echo $email ; ?></li>
<?php } else { ?>
<li><b>E-mail: </b>mrjasmin_90@hotmail.com</li>
<?php } ?>


</ul>

</div>  	

<div class="sidebarbox">
		
<h3>Testimonials</h3>
		
		


<?php if ($testimonial) { ?>
<p class="testimonial">"<?php echo $testimonial ; ?>"</p>
<?php } else { ?>
<p class="testimonial">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultricies gravida enim. In nulla enim, blandit vel, lacinia a, congue eu, turpis. Donec ut nisi. Curabitur a odio eu mi dapibus porttitor."</p>
<?php } ?>

<?php if ($testimonialID) { ?>
<p class="testimonial"><b><?php echo $testimonialID; ?></b></p>
<?php } else { ?>
<p class="testimonial"><b>John, Doe, Company</b></p>
<?php } ?>



</div>


	
<?php } else { ?>
   
	<div class="sidebarbox">
		
		<h3>Categories</h3>
		
		
<ul>



<?php
$post = $wp_query->post;
$category = get_cat_id($blogcat) ; 
$category2 = get_cat_id($portfoliocat) ; 

if (in_category($category) ) { 

wp_list_categories('title_li&child_of='.$category) ;	?>

<?php } else { 

wp_list_categories('title_li&child_of='.$category2) ;	?>

<?php } ?>
	
  
</ul>

</div>  

<div class="sidebarbox">
<h3>Latest blogposts</h3>


<?php $category = get_cat_id($portfoliocat) ; ?> 
    
<ul>

<?php $category = get_cat_id($portfoliocat) ; ?> 
<?php $temp_query = $wp_query; query_posts("showposts=5&cat=-$category"); ?>
<?php while (have_posts()) { the_post(); ?>
<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to &ldquo;<?php the_title(); ?>&rdquo;"><?php the_title(); ?></a></li>
<?php } $wp_query = $temp_query; ?>

</ul>



</div> 

<?php
}
?>


<div class="sidebarbox_social">
<h3>Follow</h3>

<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/facebook_48.png" class="follow" alt=""/></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/flickr_48.png" class="follow" alt=""/></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/mixx.png" class="follow" alt=""/></a>
<a href="<?php bloginfo('rss2_url');?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss_48.png" class="follow" alt=""/></a></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/designfloat.png" class="follow" alt=""/></a>

</div> 
</div>            

<?php endif; ?>