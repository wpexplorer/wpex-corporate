<?php
/**
 * Header branding: Logo & Site Description
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Vars
$blog_name          = get_bloginfo( 'name' );
$blog_description   = get_bloginfo( 'description' );
$home_url           = home_url(); ?>

<div class="site-branding clr">

    <div id="logo" class="clr">

        <?php if ( has_custom_logo() ) : ?>

            <a href="<?php echo esc_url( $home_url ); ?>" title="<?php echo esc_attr( $blog_name ); ?>" rel="home"><?php the_custom_logo(); ?></a>

        <?php else : ?>

            <div class="site-text-logo clr">
                <a href="<?php echo esc_url( $home_url ); ?>" title="<?php echo esc_attr( $blog_name ); ?>" rel="home"><?php echo strip_tags( $blog_name ); ?></a>
                <?php if ( $blog_description ) { ?>
                    <div class="blog-description"><?php echo wp_kses_post( $blog_description ); ?></div>
                <?php } ?>
            </div><!-- .site-text-logo -->

        <?php endif; ?>

    </div><!-- #logo -->

</div><!-- .site-branding -->