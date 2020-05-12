<?php
/**
 * Single post layout
 *
 * @package Corporate WordPress theme
 * @author Alexander Clarke
 * @link http://www.wpexplorer.com
 * @since 1.0.0
 */
?>


<article>
	<?php get_template_part( 'partials/post-media' ); ?>
	<?php get_template_part( 'partials/post-header' ); ?>
	<?php get_template_part( 'partials/post-content' ); ?>
	<?php get_template_part( 'partials/link-pages' ); ?>
	<?php get_template_part( 'partials/edit-post' ); ?>
</article>

<?php get_template_part( 'partials/post-author-bio' ); ?>

<?php comments_template(); ?>