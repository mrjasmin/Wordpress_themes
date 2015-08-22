<?php /* Template Name: about
*/ 

?> 


<?php get_header(); ?>

<div id="slider2">

<div id="sliderwrap2">

<h2>About me</h2>

</div>



</div>


<?php
require(TEMPLATEPATH . "/var.php"); ?>

	<div id="content">
	<div class="wrapper">

	<div id="leftcontent_first">

    <h2></h2>
    <div class="text">
    
	 <?php if ($abouttext) { ?>
     <?php echo $abouttext; ?>
     <?php } else { ?>
     Hello
     <?php } ?>
   
	
	</div>  
    </div>

	<div id="rightcontent_first">
	
  
  <?php get_sidebar(); ?>
  
</div>
</div>
</div>
	
<?php get_footer(); ?>