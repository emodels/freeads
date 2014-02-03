<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
                    <header class="archive-header" style="border-bottom: solid 1px silver">
                                <?php 
                                $category = get_the_category();
                                $option = '_category_image' . $category[0]->cat_ID;
                                $image = get_option($option); 
                                ?>
                            <h1 class="archive-title" style="padding: 0px; margin: 0px"><img src="<?php echo $image; ?>" style="width: 100px" /><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
				<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>