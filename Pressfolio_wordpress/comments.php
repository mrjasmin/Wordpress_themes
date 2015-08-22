<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

?>

<?php if ($post->ID != 139) { 
?>
<?php if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<h4 id="comments">
<?php if ( comments_open() ) : ?><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
	<a href="#postcomment" title="<?php _e("Leave a comment"); ?>">&raquo;</a>
<?php endif; ?>
</h4>

<?php if ( $comments ) : ?>
<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>
	<ul>
    <li class="singlecomment" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div id="comment_left2">
	
	
	<div id="avatar"><?php echo get_avatar( $comment, 55 ); ?></div>
	<div id="author_link"><?php comment_author_link() ?> </div>
	<div id="comment_author"><p><cite><?php comment_date() ?> </a></cite> <?php edit_comment_link(__("Edit This"), ' |'); ?></p></div>
	</div>
	
	<div id="comment_right2">
	<?php comment_text() ?>
	
    
	</div>
	
	</li>
	</ul>
	 
<?php endforeach; ?>

</ol>

<?php else : // If there are no comments yet ?>

<?php endif; ?>

<div id="reply">

<h3>Leave a reply</h3> 

<div id="comment_left">
<div id="avatar"><?php echo get_avatar( $comment, 55 ); ?></div>

<p>

Your Name
<br/>
July 14, 2009
</p>

</div>

<div id="comment_right">

<?php if ( comments_open() ) : ?>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<?php _e('Name'); ?>
<p><input type="text" onfocus="if (this.default == 'Name') {this.default=''}" onblur="if(this.default == '') { this.default='Name'}" default="Name" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small> <?php if ($req) _e(''); ?></small></label></p>

<?php _e('Mail (will not be published)');?>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small> <?php if ($req) _e(''); ?></small></label></p>

<?php _e('Website'); ?>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small></small></label></p>

<?php endif; ?>




<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

<?php _e('Message'); ?>
<p><textarea name="comment"  id="commentarea" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit2" tabindex="5" value="<?php echo attribute_escape(__('Submit Comment')); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<div class="allowed">* Name, Email, and Comment are Required</div>

</div>
</div>


<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>

<?php } 

 else { ?> 
	
			<h2 style="margin-top:30px;">Previous User Submissions</h2>
			<a href="#add" class="floated_link">Submit a Link</a>

		
			<?php if ($comments) : ?>
				<ol>
					<?php foreach ($comments as $comment) : ?>
						<?php if (get_comment_type() == "comment"){ ?>					
							<li id="comment-<?php comment_ID() ?>" >
								<?php comment_author_link(); ?> <br />
								<?php comment_text(); ?>
							</li>
						<?php } ?>
					<?php endforeach; /* end for each comment */ ?>
				</ol>
			<?php endif; ?>
			
			
			<div style="clear:both"></div>				
			<a name="add"></a>
			<h2 style="margin-top:30px;">Submit a Link</h2>
	
			<div class="formcontainer">	
			
						<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
						
						<p><input type="text" name="author" id="author" value="" size="22" tabindex="1" />
						<label for="author"><small>Link Title <?php if ($req) echo "(required)"; ?></small></label></p>
						
						<input type="hidden" name="email" id="email" value="USER_LINK_SUBMISSION@AUDIOTUTS.com" size="22" tabindex="2" />
						
						<p><input type="text" name="url" id="url" value="" size="22" tabindex="3" />
						<label for="url"><small>Link URL</small></label></p>
						
						<p><input type="text" name="comment" id="comment" value="" size="22" tabindex="3" />
						<label for="url"><small>Link Description (Max 20 Words)</small></label></p>
						
						
						<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment"  class="button" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
						</p>
						<?php do_action('comment_form', $post->ID); ?>
						
						</form>
					
			</div>					
			<div style="clear:both"></div><?php } ?>