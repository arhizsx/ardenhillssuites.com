<?php if ( !defined('ABSPATH') ){ die(); } ?>

<?php if ( post_password_required() ) :

 if (comments_open() ) :
	?>
        <div class='alert alert-simple alert-dismissible clearfix mt20 text-center' role='alert'><?php echo esc_html__('Password Protected', 'himara') ?></div>

	<?php
endif;

		return;

endif;
?>

<?php if (comments_open() ) : ?>
<section id="post-comments" class='post-comments'>
<?php endif ?>


<?php

if ( have_comments() ) :

	//get comments
	$comment_entries = get_comments(array( 'type'=> 'comment', 'post_id' => $post->ID ));

	if(!empty($comment_entries)) : ?>

	<ul class="post-comments-list">
		<?php wp_list_comments( array( 'type'=> 'comment', 'callback' => 'himara_custom_comments') ); ?>
	</ul>

	<?php

endif;

	//get ping and trackbacks
	$ping_entries = get_comments(array( 'type'=> 'pings', 'post_id' => $post->ID ));

	if(!empty($ping_entries)){
	echo "<h4 id='pingback_heading'>".esc_html__('Trackbacks &amp; Pingbacks','himara')."</h4>";
	?>

	<ul class="pingbacklist">
		<?php wp_list_comments( array( 'type'=> 'pings', 'reverse_top_level'=> true ) ); ?>
	</ul>
<?php } ?>

<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			echo "<div class='comments-pagination clearfix mb20'>";
			echo "<span class='pull-left'>";
				 previous_comments_link(esc_html__('Previous', 'himara') );
			echo "</span>";
			echo "<span class='pull-right'>";
				 next_comments_link( esc_html__('Next', 'himara') );
			echo "</span>";
			echo "</div>";
		endif;

	else :

endif;


 if (comments_open()) {

     echo "<div class='comment-form'>";
        get_template_part('templates/elements/comments-form');
     echo "</div>";

 } else {

     if (is_single()) {

     echo "<div class='alert alert-simple alert-dismissible clearfix mt50 text-center' role='alert'>" .esc_html('Comments Are Closed', 'himara'). "</div>";

     }
 }

?>
<?php if (comments_open() ) : ?>
</section>
<?php endif ?>
