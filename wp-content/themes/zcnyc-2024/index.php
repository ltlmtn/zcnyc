<?php get_header(); ?>

<!-- Index Template -->

<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <main class="page-content desktop-width">
        <?php the_content(); ?>
    </main>

<?php endwhile; endif; ?>


<?php get_footer(); ?>