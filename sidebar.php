<aside id="sidebar">
		<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<li id="archives" class="widget">
				<h2 class="widgettitle"><?php _e( 'Archives', 'desk' ); ?></h2>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget">
				<h2 class="widgettitle"><?php _e( 'Meta', 'desk' ); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>



<?php endif; ?>
		</ul>
	
	</aside>