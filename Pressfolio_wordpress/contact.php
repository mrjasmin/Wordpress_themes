<?php /* Template Name: contact
*/ 

?> 

<?php get_header(); ?>

<div id="slider2">

<div id="sliderwrap2">

<h2>Get in touch</h2>

</div>



</div>


<?php
require(TEMPLATEPATH . "/var.php"); ?>

	<div id="content">
	<div class="wrapper">

	<div id="leftcontent_first">

    <h3 class="h3contact">Contact me</h3>
	
	<div id="contactform">

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
		
		
    <?php endwhile; ?>
	<?php endif; ?>
    </div>
  
    </div>
	<div id="rightcontent_first">
	
  
  <?php get_sidebar(); ?>
  
</div>
</div>
</div>
	
<?php get_footer(); ?>