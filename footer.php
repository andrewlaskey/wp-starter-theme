			<footer class="footer section" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<nav class="navbar" role="navigation" aria-label="footer navigation">
					<div class="navbar-brand">
						<a class="navbar-item" href="<?php echo home_url(); ?>" rel="nofollow" itemscope itemtype="http://schema.org/Organization">
							<?php show_image( 'site_logo', array( 'alt' => get_bloginfo( 'name' ), 'width' => '112', 'height' => '28' ), true); ?>
							<span class="sr-only"><?php bloginfo('name'); ?></span>
						</a>
					</div>

					<div class="navbar-menu">
						<div class="navbar-start">
							<?php wp_nav_menu(array(
									'container' => false,
									'menu' => __( 'Footer Links', 'fsb_theme' ),
									'menu_class' => 'footer-nav',
									'theme_location' => 'footer-links',
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0,
									'fallback_cb' => ''
							)); ?>
						</div>
						<div class="navbar-end">
							<?php if ( have_rows( 'profiles', 'options' ) ) : while ( have_rows( 'profiles', 'options' ) ) : the_row(); ?>
							<div class="navbar-item">
								<a class="icon social-button social-button-<?php the_sub_field( 'social_network' ); ?>" href="<?php the_sub_field( 'profile_url' ); ?>">
										<?php show_svg( get_sub_field( 'social_network' ) ); ?>
									<span class="sr-only"><?php the_sub_field( 'social_network' ); ?></span>
								</a>
							</div>
							<?php endwhile; endif; ?>
						</div>
					</div>

				</nav>	

			</footer>

		<?php wp_footer(); ?>

	</body>

</html>
