<?php get_header(); ?>

			<div id="content">

				<div class="page-header">
					<h5 class="text-center">Blog</h5>
				</div>

				<div class="page-inner">

					<?php get_sidebar(); ?>

					<main id="main" class="page-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

							<div class="article-inner">

				                <header class="article-header entry-header">

				                	<h5><?php category_breadcrumb_nav( get_the_id(), ' > ' ); // libary/nav.php ?></h5>

									<h3 class="entry-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h3>

									<?php if ( get_field( 'sub_title' ) ) : ?>
									<h4><?php the_field( 'sub_title' ); ?></h4>
									<?php endif; ?>

				                </header>

				                <section class="entry-content" itemprop="articleBody">
									<?php the_content(); ?>
				                </section>

				                <footer class="article-footer">

									<?php social_share_nav( $url = '', $title = '', $description = '', $share_image = ''); // library/nav.php ?>

				                </footer>

				            </div>

			                <div class="byline entry-meta vcard">

			                    <div class="author-image">
			                    	<?php
			                    		$author_id = get_the_author_meta('ID');
			                    		$profile_image = get_field( 'profile_image', 'user_'. $author_id );

			                    		if ( !empty( $profile_image ) ) {
									        echo '<img src="' . $profile_image['url'] . '" alt="' . get_the_author_meta( 'display_name' ) . '" />';
									    }
			                    	?>
			                    </div>
			                    <div class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person"><?php echo get_the_author_meta( 'display_name' ); ?></div>
			                    <time class="updated entry-time" datetime="<?php echo  get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time(get_option('date_format')); ?></time>

			                </div>

			            </article>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', '*THEME_NAME*' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', '*THEME_NAME*' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', '*THEME_NAME*' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</main>

				</div>
				<!-- End Page Inner -->

			</div>

<?php get_footer(); ?>
