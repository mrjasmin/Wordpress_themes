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

<?php require(TEMPLATEPATH . "/var.php"); ?> 

 <?php if ($analytics) { ?>
 <?php echo $analytics; ?>
 <?php } else { ?>
      
 <?php } ?>

 <!--[if lt IE 8]>
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

	
	
	$('.sidebarbox_social img').css({opacity:"0.5"});
	$('.sidebarbox_social img').hover(function() {
		$(this).animate({opacity:"1.0"});
	}, function() {
		$(this).animate({opacity:"0.5"});
	});
	
	$('#flickrfeed img').css({opacity:"1.0"});
	$('#flickrfeed img').hover(function() {
		$(this).animate({opacity:"0.5"});
	}, function() {
		$(this).animate({opacity:"1.0"});
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

<div id="header">
<div class="wrapper">
  
<div id="logobox">

<?php
require(TEMPLATEPATH . "/var.php");

if($pf_logo) {
	if($pf_logo == "Choose a image to be displayed") { ?>
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" id="logo"/></a><?php
	} else { ?>
		
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $pf_logo; ?>" id="logo" /><?php
	}
} else { ?>
	<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" id="logo"/></a><?php
} ?>
 

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

<div id="rssicon"<a href="<?php bloginfo('rss2_url');?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss2.png"  alt="rssicon"/></a></div>

</div>
</div>