<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?>> 
<head> 
  <meta http-equiv="content-type" content="<?php bloginfo('html_type');?> charset=<?php bloginfo('charset');?>"/><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
<title><?php bloginfo('title'); ?></title>



<head>


<!--[if lt IE 7]>
        <script type="text/javascript" src="http://www.jasminweb.net/js/unitpngfix.js"></script>
<![endif]--> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/paginator3000.js"></script> 




<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


</head>


<body>
<div id="topheader">
<div id="topheaderbox">
<p class="date"><?php echo date('j F Y'); ?></p>



<p id="rss1"><a href="<?php bloginfo('rss2_url');?>">Subscribe to our RSS feed</p></a>

</div>
</div>

<div id="header">

<div id="headerwrap">

<div id="wrapper">


<div id="logobox">

<!-- Get Colour Scheme -->
<?php
require(TEMPLATEPATH . "/var.php");

if($df_logo) {
	if($df_logo == "Choose a logo:") { ?>
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a><?php
	} else { ?>
		
		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/<?php echo $df_logo; ?>" /><?php
	}
} else { ?>
	<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a><?php
} ?>


</div>

  <form class="searchform" method="get" action="<?php bloginfo('url'); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" class="searchinput" />
	
	</form>

</div>

</div>
</div>
</div>


<div id="menu">

<div id="menuwrapper">
<ul id="navigation">

<?php wp_list_categories('title_li='); ?>

</ul></div></div>

  
</div></div>