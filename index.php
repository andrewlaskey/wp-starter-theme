<?php get_header(); ?>

			<div id="content">

				<div class="page-header">
					<h5 class="text-center">Blog</h5>
				</div>

				<div class="page-inner">

					<?php get_sidebar(); ?>

					<main id="main" class="page-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php include( locate_template( 'components/partial-article_excerpt.php' ) ); ?>

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

					<?php //page nav ?>

				</div>
				<!-- End Page Inner -->

			</div>

<?php get_footer(); ?>
