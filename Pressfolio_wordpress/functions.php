<?php function pressfolio_admin_head() { ?>
<style>


#pf_logo   { margin-top: 15px; }
input { border: 1px solid silver; }
#footer_heading, #abouth4, #s1t, #feedburner  { margin-top: 15px; }
select { margin-top: 14px; }
#main { -moz-border-radius-topright 5px; background: #232323;  margin-top: 60px; height: 141px; }
#main h2 { text-indent: 10px; padding-bottom: 10px; font-style: normal ; color: white; border-right: 1px solid #5c5b5b ; border-bottom: 1px solid #5c5b5b ; background: #343434; width: 350px; margin-top: 10px;
}
.wrap .updated, .wrap .error {
margin-top: -100px; float: left ;
}
#main h4 {float: left ; margin-top: 30px;line-height: 20px; margin-left: 12px; padding-left: 25px; height: 30px; background: url(<?php bloginfo('template_directory'); ?>/images/settings.png) no-repeat ; color: silver ; text-indent: 10px; }
.wrap h2 { font-family: arial; text-shadow:0 0px 0 #FFFFFF;}
.pressfolio { float: right ; margin-top: -10px; margin-right: 20px;}
#subwrap { -moz-border-radius-topright 5px; background: #232323;   height: 50px; line-height: 35px;}
#subwrap h4 { text-indent: 10px; color: white ; font-size: 18px; line-height: 49px; }
.wrap input { padding: 6px;}
.wrap select { height: 20px;}
.submit2 { float: right; margin-right: 10px; margin-top: 12px; }
.submit2 input { padding: 4px; }
#footer, #footer-upgrade { margin-top: 40px; }
body textarea { margin-top: 20px; }

</style>

<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/colorpicker/js/colorpicker.js"></script>

<?php }

include(TEMPLATEPATH . '/wp-pagenavi.php');

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
    'before_widget' => '<li>',  
    'after_widget'  => '<li>', 
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
    )) ;
    
}
       
function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)."...";
echo $excerpt;
}

function content($num) {
$theContent = get_the_content();
$output = preg_replace('/<img[^>]+./','', $theContent);
$limit = $num+1;
$content = explode(' ', $output, $limit);
array_pop($content);
$content = implode(" ",$content)."...";
echo $content;
}

function trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');




/*
Plugin Name: Custom Write Panel
Plugin URI: http://wefunction.com/2008/10/tutorial-create-custom-write-panels-in-wordpress
Description: Allows custom fields to be added to the WordPress Post Page
Version: 1.0
Author: Spencer
Author URI: http://wefunction.com
/* ----------------------------------------------*/

$new_meta_boxes =
array(
"image" => array(
"name" => "image",
"std" => "",
"title" => "Thumbnail",
"description" => "Using the \"<em>Add an Image</em>\" button, upload an image and paste the URL here.")
); 


function new_meta_boxes() {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

if($meta_box_value == "")
$meta_box_value = $meta_box['std'];

echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

echo'<h2>'.$meta_box['title'].'</h2>';

echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';

echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
}
}

function create_meta_box() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
add_meta_box( 'new-meta-boxes', 'Pressfolio Post Settings', 'new_meta_boxes', 'post', 'normal', 'high' );
}
}

function save_postdata( $post_id ) {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
// Verify
if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
return $post_id;
}

if ( 'page' == $_POST['post_type'] ) {
if ( !current_user_can( 'edit_page', $post_id ))
return $post_id;
} else {
if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;
}

$data = $_POST[$meta_box['name'].'_value'];

if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
update_post_meta($post_id, $meta_box['name'].'_value', $data);
elseif($data == "")
delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

$themename = "Pressfolio";
$shortname = "pf";


/* Get images into a drop-down list */
$logos2 = array();
if(is_dir(TEMPLATEPATH . "/images/")) {
    if($open_dirs = opendir(TEMPLATEPATH . "/images/")) {
        while(($logo = readdir($open_dirs)) !== false) {
            if(stristr($logo, '.jpg') !== false) {
                $logos2[] = $logo;
            }
        }
    }
}
$logo_dropdown = array_unshift($logos2, "Choose a image to be displayed");


$cats_array = get_categories('hide_empty=0');
$categories = array();

foreach ($cats_array as $cats) {
    $categories[$cats->cat_ID] = $cats->cat_name;
}


$pages_array = get_pages('hide_empty=0');
$pages = array();

foreach ($cats_array as $cats) {
    $categories[$cats->cat_ID] = $cats->cat_name;
}

/* Get images into a drop-down list */
$logos = array();
if(is_dir(TEMPLATEPATH . "/images/")) {
    if($open_dirs = opendir(TEMPLATEPATH . "/images/")) {
        while(($logo = readdir($open_dirs)) !== false) {
            if(stristr($logo, '.png') !== false) {
                $logos[] = $logo;
            }
        }
    }
}
$logo_dropdown = array_unshift($logos, "Choose a image to be displayed");


/* Get css-stylesheets into a drop-down list */

$css = array();
if(is_dir(TEMPLATEPATH . "/css/")) {
    if($open_dirs = opendir(TEMPLATEPATH . "/css/")) {
        while(($logo = readdir($open_dirs)) !== false) {
            if(stristr($logo, '.css') !== false) {
                $css[] = $logo;
            }
        }
    }
}
$logo_dropdown = array_unshift($css, "Choose a color scheme");



$options = array (


array(    "name" => "Homepage",
        "type" => "open"),

array(    "name" => "Headerlogo",
        "desc" => "Which logo would you like to be displayed in the header? ",
        "id" => $shortname."_logo",
        "type" => "select",
        "std" => "",
        "options" => $logos),
              
array(    "name" => "Phone number in the header",
        "desc" => "",
        "id" => "phone2",
        "type" => "text"),
        "std" => "",


array(    "name" => "Text under the phone number",
        "desc" => "",
        "id" => "phonetext",
        "type" => "text"),
        "std" => "",

        
array(    "name" => "H2 welcome headline",
        "desc" => "",
        "id" => "welcomeh2",
        "type" => "text"),
        "std" => "",
        
array(  "name" => "Welcome text",
         "id" => "introtext",
         "type" => "text"),
         "std" => "",
             
array(  "name" => "Footer text",
         "id" => "footertext",
         "type" => "text"),
         "std" => "",
                                  

array(    "type" => "close"),

array(    "name" => "General",
        "type" => "open"),
		


array(    "name" => "Blog category",
        "desc" => "Choose your blog category",
        "id" => "blogcat",
        "type" => "select",
        "std" => "",
        "options" => $categories),
              
array(    "name" => "Portfolio category",
        "desc" => "Choose your portfolio category",
        "id" => "portfoliocat",
        "type" => "select",
        "std" => "",
        "options" => $categories),

array(    "name" => "Flickr ID",
        "desc" => "Enter your Flickr ID",
        "id" => "flickr",
        "type" => "text"),
        "std" => "",
		
array(    "type" => "close"),

array(    "name" => "Aboutpage",
        "type" => "open"),

array(    "name" => "Main content",
        "desc" => "Enter the text you want to sidplay on the aboutpage",
        "id" => "abouttext",
        "type" => "textarea"),
        "std" => "",
        

array(    "name" => "Phone number",
        "desc" => "Enter your phone number",
        "id" => "phone",
        "type" => "text"),
        "std" => "",
        
array(    "name" => "Fax number",
        "desc" => "Enter your fax number",
        "id" => "fax",
        "type" => "text"),
        "std" => "",

        
array(    "name" => "Testimonial",
        "desc" => "Write one testimonial",
        "id" => "testimonial",
        "type" => "text"),
        "std" => "",
        
array(    "name" => "Testimonial client/company",
        "desc" => "",
        "id" => "testimonialID",
        "type" => "text"),
        "std" => "",

array(    "type" => "close"),        

array(    "name" => "Google analytics",
        "type" => "open"),

array(  "name" => "Google analytics code",
         "desc" => "",
         "id" => "analytics",
         "type" => "textarea"),
         "std" => "",
		

  
array(    "type" => "close"),

);


function mytheme_add_admin() {

    global $themename, $shortname, $options;
    
  
    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
        
    
?>

<div class="wrap">
<div id="main"><img src="<?php bloginfo('template_directory'); ?>/images/pressfolio.jpg" class="pressfolio">
<h2><?php echo $themename; ?> wordpress theme</h2>
<h4>Theme settings</h4>
</div>


<form method="post">

<?php foreach ($options as $value) {
    
switch ( $value['type'] ) {

case "open":
?>



<div class="open">

<div id="subwrap">

<div class="submit2">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</div>
<h4><label for="link_name"><?php echo $value['name']; ?></label></h4>



</div>
     
<table width="100%" border="0"  style="background-color:#FFFFFF; padding-left:10px height: 5px; border: 2px solid black;text-indent: 10px;  ">

<?php break;

case "close":
?>

</table>

<?php break;

case "title":
?>
<table width="100%" border="0" style="background-color:#dceefc; "><tr>
    <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:8px;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle" ><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:8px;>&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px; height: 30px; padding: 5px; " name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:8px;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
    	break;
    	case "image":
    ?>
    
    <div class="inside">
        <strong><?php echo $value['name']; ?></strong>
        <div class="special2">
        <img src="<?php bloginfo('template_directory'); ?>/images/<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes( get_settings( $value['id'] ) ); } else { echo stripslashes( $value['std'] ); } ?>"  />
    	</div>
	</div>


<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;


}
}
?>

</form>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 
add_action('admin_head', 'pressfolio_admin_head'); 


function sub_page_list() {
    global $wpdb;
 
    $sql = "SELECT p.ID, p.post_title, p.guid, pm.meta_value FROM " . $wpdb->posts . " AS p LEFT JOIN ";
    $sql .= "(SELECT post_id, meta_value FROM " . $wpdb->postmeta . " AS ipm WHERE meta_key = 'subtitle') "; 
    $sql .= "AS pm ON p.ID = pm.post_id ";
    $sql .= "WHERE p.post_type = 'page' AND p.post_parent = 0 AND p.post_status = 'publish' ";
    $sql .= "ORDER BY p.menu_order ASC ";
    $sql .= "LIMIT 0, 10";
 
    $rows = $wpdb->get_results($sql,OBJECT);
 
    if($rows) {
        foreach($rows as $row) {
            echo "<li>";
            $link_url = get_permalink($row->ID);
            echo "<a href=\"$link_url\"" . "\">$row->post_title</a>";

            echo "<p>$row->meta_value</p>";
            echo "</li>";
        }
    }    
}



?>