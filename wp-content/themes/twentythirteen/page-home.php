<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
        <style type="text/css">
            .div_hover{
                background: #f7f7f7;
                min-width: 150px;
            }
            .div_hover:hover{
                background: #e6e6e6;
            }
        </style>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
                    <header class="entry-header" style="padding: 0px; margin: 10px">
                        <div id="div_category_list">
                            <?php foreach (get_categories() as $category) { ?>
                            <?php 
                            $option = '_category_image' . $category->cat_ID;
                            $image = get_option($option);  
                            ?>
                            <div class="div_hover" style="text-align: center; float: left; border: solid 1px silver; border-radius: 5px; padding: 10px; margin-right: 10px"><a href="<?php echo get_category_link($category); ?>"><img src="<?php echo $image; ?>" style="width: 100px" /><br/><?php echo $category->name; ?></a></div>
                            <?php } ?>
                            <div id="div_home_into" style="float: left; padding: 0 10px 0 10px; text-align: justify">
                                <h4 style="margin-top: 5px; text-align: left">Welcome to FreeAds. We publish your Advertisements for free !!</h4>
                                FreeAds web portal allows community to publish and manage their own Online Advertisements. We have implemented design that is very much user friendly and therefore within few minuted time anyone may able to publish their advertisements easily.
                            </div>
                            <div class="clear"></div>
                        </div>
                    </header>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>