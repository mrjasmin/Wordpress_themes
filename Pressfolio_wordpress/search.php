<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?>> 
<head> 
  <meta http-equiv="content-type" content="<?php bloginfo('html_type');?> charset=<?php bloginfo('charset');?>"/><link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
<title><?php bloginfo('title'); ?></title>


<head>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


</head>
    
<body id="blogpage">
    
<div id="header">
<div class="wrapper">
  
<div id="logobox">
  
<a href="home.html"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" id="logo" alt="logo"/></a>
  
</div>

<div class="call">

<h4>CALL NOW: (0048) 312-2874</h4>

<p>

We are waiting for you to call us, we are available 24/7
email me : info@domainname.com'

</p>

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

<h2>Search results</h2>

</div>



</div>

	
	<div id="content">
	<div class="wrapper">

	<div id="leftcontent_first">

    <h2></h2>
    
	
    <?php require(TEMPLATEPATH . "/var.php"); ?>
	
	<?php if (have_posts()) : ?>
    
    <?php $category = get_cat_id($portfoliocat) ; ?> 
    
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged&cat=-$category"); ?>     

    <?php while (have_posts()) : the_post(); ?>
	
    <?php if(get_post_meta($post->ID, "image_value", $single = true) != "") :  ?>  
	
	<div class="blogbox">
    
   
    
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
    <div class="blogcomments"><span><?php the_time('F j, Y'); ?></span><span>Posted in: <?php the_category(', '); ?></span>
    <div class="comments"><?php comments_popup_link('0', '1', '%'); ?> comments</div></div>
    
    <div class="blogimage">
	
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image_value", $single = true); ?>&h=105&w=150&zc=1" alt="<?php the_title(); ?>"/></a>
	
	</div>
  
    
    
    <div class="postcontent"><p><?php excerpt('35'); ?></p><div class="continue"><a href="<?php the_permalink(); ?>">Continue</a</div></div>
        
    </div>
	


    <?php else : ?>
    
    <div class="blogbox">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
   

    <div class="postcontent2"><div class="blogcomments"><span><?php the_time('F j, Y'); ?></span><span>Posted in: <?php the_category(','); ?></span>
    <div class="comments"><?php comments_popup_link('0', '1', '%'); ?> comments</div></div><p><?php the_excerpt(); ?></p><div class="continue"><a href="<?php the_permalink(); ?>">Continue</a></div></div>
        
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