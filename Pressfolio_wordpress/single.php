<?php require(TEMPLATEPATH . "/var.php"); ?>



<?php
$post = $wp_query->post;
$category = get_cat_id($blogcat) ; 

if (in_category($category) ) { ?>

<?php require('single-blog.php') ; ?>

<?php } else { ?>


<?php require('single-portfolio.php') ; ?>

<?php } ?>