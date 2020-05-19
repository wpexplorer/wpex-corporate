<?php
/**
 * The template for displaying the footer.
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

	<div id="footer-wrap" class="site-footer clr">

		<div id="footer" class="clr">

			<?php get_template_part( 'partials/footer-widgets' ); ?>

		</div><!-- #footer -->

	</div><!-- #footer-wrap -->

	<?php get_template_part( 'partials/footer-copyright' ); ?>

	</div><!-- #main-content -->

</div><!-- #wrap -->


<?php wp_footer(); ?>
</body>
</html>