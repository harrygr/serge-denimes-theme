
	<?php if ( in_category('serge-song-of-the-week') ){ ?>
		<span class="spotify-meta"><a href="http://open.spotify.com/user/1163287097/playlist/1ztfJ8Z9278J7AVPtRSMg5" title="Serge Songs of the Week on Spotify">Subscribe to the Serge Spotify</a></span>
	<?php } ?>

<p class="postmetadata">
	<span class="post_author">By: <?php the_author_posts_link(); ?> | </span>
	<span class="cats">Posted in <?php the_category(', ') ?></span>
	<?php if ($sa_settings['sa_hidetags'] == '') { the_tags(' | <span class="tags">Tags: ', ', ', '</span>'); } ?>

	&nbsp;|&nbsp;
	<?php $linkText = "Comment on this post";
	comments_popup_link( $linkText, $linkText, $linkText); ?>
	<?php edit_post_link('Edit', ' | ', ''); ?>
	</p>