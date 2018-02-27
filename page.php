<?php get_header(); ?>

	<section class="section">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="container">
			
			<h1 class="title"><?php the_title() ?></h1>
			<?php the_content(); ?>
			
		</div>

	<?php endwhile; endif; ?>

	</section>


<?php get_footer(); ?>
