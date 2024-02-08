<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<section>

			<div class="container">

				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>

			</div>

		</section>

	<?php endif; ?>

<?php get_footer(); ?>