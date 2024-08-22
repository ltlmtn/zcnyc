<!-- FOOTER.PHP ++++++++++++++++++++++ -->
<?php
    $site_name = get_bloginfo('name');
?>

<footer>
    <div class="footer-content desktop-width">
        <?php if ( is_active_sidebar( 'footer_content' ) ) : ?>
            <?php dynamic_sidebar( 'footer_content' ); ?>
        <?php endif; ?>
    </div>
    <div class="credits">
        <div class="desktop-width">
            Website by <a href="https://ltlmtn.com" target="_blank">LTL MTN</a>
        </div>
    </div>
</footer>

<div class="back-to-top">
    <a href="#top" class="back-to-top-link">
        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/back-to-top.svg" alt="Back to top" />
    </a>
</div>

<?php get_template_part('assets/scripts'); ?>

<?php /* Include this so the admin bar is visible. */ wp_footer(); ?>

</body>
</html>