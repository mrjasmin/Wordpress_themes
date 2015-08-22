<?php 

/* Template Name: Portfolio
*/ 

?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?>> 
<head> 
  <meta http-equiv="content-type" content="<?php bloginfo('html_type');?> charset=<?php bloginfo('charset');?>"/><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
<title><?php bloginfo('title'); ?></title>


<head>


<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.2.3.min.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.flow.1.0.js" type="text/javascript" charset="utf-8"></script> 

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/easing.js"></script>

 <!--[if lt IE 7]>
        <script type="text/javascript" src="http://www.gamefreaks.se/js/unitpngfix.js"></script>
<![endif]--> 


<script type="text/javascript">

$(function() {
 $("#blogcontainer").jCarouselLite({
        btnNext: ".next3",
        btnPrev: ".prev3",
		visible: 1,
		speed:1000,
		vertical: true 
			
    });

});

</script>

<script type="text/javascript">

$(function() {
 $(".scroll").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 1,
		speed:1000,
		vertical: false 
		
			
    });

});

</script>

<script type="text/javascript">

$(function() {
 $("#slidertext").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 1,
		speed:1000,
		vertical: true 
		
			
    });

});

</script>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


</head>
    
<body id="blogpage">
    
<div id="header">
<div class="wrapper">
  
<div id="logobox">
  
<a href="home.html"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" id="logo" alt="logo"/></a>
  
</div>

<div class="call">

<?php if ($phone2) { ?>
<h4>CALL NOW: <?php echo $phone2 ; ?>></h4>
<?php } else { ?>
<h4>CALL NOW: (0048) 312-2874</h4>
<?php } ?>

<?php if ($phonetext) { ?>
<p><?php echo $phonetext ; ?></p>
<?php } else { ?>
<p>We are waiting for you to call us, we are available 24/7
email me : info@domainname.com'</p>

<?php } ?>

</div>



</div>
</div>

  
<div id="menuwrap">

 <div class="wrapper">
  
 <ul>
    
	<?php sub_page_list(); ?>

 
 </ul>
 
 <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/rss2.png" id="rssicon" alt="rss"/></a>

 </div>

</div>


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
  
    
    
    <div class="portfoliocontent"><p><?php excerpt('30'); ?></p><div class="continue"><a href="single-blog.html">Continue</a></div></div>
        
    </div>
	
    <?php endif ; ?>
  
    	
    <div class="blogbox">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
   

    <div class="postcontent2"><p><?php the_excerpt(); ?></p><div class="continue"><a href="single-blog.html">Continue</a></div></div>
        
    </div>	
		

   

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