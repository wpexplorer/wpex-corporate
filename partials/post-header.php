<?php
/**
 * Displays the post header
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<header class="page-header clr">
	<h1 class="page-header-title"><?php the_title(); ?></h1>
	<?php get_template_part( 'partials/post-meta' ); ?>
</header><!-- #page-header -->