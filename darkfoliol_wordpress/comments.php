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

<h2 id="comments">
<?php if ( comments_open() ) : ?><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
	<a href="#postcomment" title="<?php _e("Leave a comment"); ?>">&raquo;</a>
<?php endif; ?>
</h2>

<?php if ( $comments ) : ?>
<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div id="author_link"><?php comment_author_link() ?> says:</div>
	<div id="avatar"><?php echo get_avatar( $comment, 50 ); ?></div>
	
	<?php comment_text() ?>
	<div id="comment_author"><p><cite><?php comment_date() ?> <?php comment_time() ?></a></cite> <?php edit_comment_link(__("Edit This"), ' |'); ?></p></div>
	</li>

<?php endforeach; ?>

</ol>

<?php else : // If there are no comments yet ?>

<?php endif; ?>



<?php if ( comments_open() ) : ?>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)');?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit Comment')); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

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