<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header" style="margin: 0px; padding-right: 100px">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
                <h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

                <div class="entry-meta">
			<?php twentythirteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
        <div class="entry-content" style="margin: 0px">
            <?php if (in_category('Auto focus')){ ?>
            <?php $array_image = get_field('main_photograph');?>
            <div style="width: 350px; float: left"><a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo $array_image['sizes']['medium']; ?>" /></a></div>
            <div class="content_info_box_autofocus" style="float: left; padding: 10px; margin-bottom: 20px; margin-top: 10px; background: #f7f7f7; border: solid 1px silver; border-radius: 5px">
                <div>
                    <div style="float: left; width: 100px"><strong>Make</strong></div>
                    <div style="float: left"><?php the_field('make'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 100px"><strong>Model</strong></div>
                    <div style="float: left"><?php the_field('model'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 100px"><strong>Year</strong></div>
                    <div style="float: left"><?php the_field('year'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 100px"><strong>Location</strong></div>
                    <div style="float: left"><?php the_field('location'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 100px"><strong>Price</strong></div>
                    <div style="float: left"><?php the_field('price'); ?></div>
                    <div class="clear"></div>
                </div>
            </div>
            <!--<div class="clear"></div>-->
            <?php } ?>
            <?php if (in_category('Property for Sale')){ ?>
            <?php $array_image = get_field('main_photograph');?>
            <div style="width: 350px; float: left"><a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo $array_image['sizes']['medium']; ?>" /></a></div>
            <div  class="content_info_box_property" style="float: left; padding: 10px; margin-bottom: 20px; margin-top: 10px; background: #f7f7f7; border: solid 1px silver; border-radius: 5px">
                <div>
                    <div style="float: left; width: 150px"><strong>Property Type</strong></div>
                    <div style="float: left"><?php the_field('property_type'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 150px"><strong>Location</strong></div>
                    <div style="float: left"><?php the_field('location'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 150px"><strong>No of Bedrooms</strong></div>
                    <div style="float: left"><?php the_field('no_of_bedrooms'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 150px"><strong>No of Bathrooms</strong></div>
                    <div style="float: left"><?php the_field('no_of_bathrooms'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 150px"><strong>No of Floors</strong></div>
                    <div style="float: left"><?php the_field('no_of_floors'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 150px"><strong>Floor area</strong></div>
                    <div style="float: left"><?php the_field('floor_area'); ?></div>
                    <div class="clear"></div>
                </div>
                <div>
                    <div style="float: left; width: 150px"><strong>Price</strong></div>
                    <div style="float: left"><?php the_field('price'); ?></div>
                    <div class="clear"></div>
                </div>
            </div>
            <!--<div class="clear"></div>-->
            <?php } ?>
            <div style="float: left; text-decoration: none; padding-top: 10px"><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
            <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
        </div><!-- .entry-content -->
	<?php endif; ?>
	<footer class="entry-meta" style="margin: 10px 0 0 0">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
