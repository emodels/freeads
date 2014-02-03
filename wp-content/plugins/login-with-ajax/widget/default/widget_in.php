<?php 
/*
 * This is the page users will see logged in. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<div class="lwa">
	<?php 
		global $current_user;
		get_currentuserinfo();
	?>
	<span class="lwa-title-sub" style="display:none"><?php echo __( 'Hi ', 'login-with-ajax' ) . " " . $current_user->display_name  ?></span>
	<div style="border:solid 1px gray; border-radius: 5px; background-color: #f7f7f7;">
		<table style="border: none">
		<tr>
			<td class="lwa-avatar" style="border: none; padding-left: 7px">
				<?php echo get_avatar( $current_user->ID, $size = '50' );  ?>
			</td>
			<td class="lwa-info" style="border: none; padding-left: 10px">
				<?php
					//Admin URL
					if ( $lwa_data['profile_link'] == '1' ) {
						if( function_exists('bp_loggedin_user_link') ){
							?>
							<a href="<?php bp_loggedin_user_link(); ?>"><?php esc_html_e('Profile','login-with-ajax') ?></a><br/>
							<?php	
						}else{
							?>
							<a href="<?php echo trailingslashit(get_admin_url()); ?>edit.php"><?php esc_html_e('My Account','login-with-ajax') ?></a><br/>
							<?php	
						}
					}
					//Logout URL
					?>
					<a id="wp-logout" href="<?php echo wp_logout_url() ?>"><?php esc_html_e( 'Log Out' ,'login-with-ajax') ?></a><br />
					<?php
					//Blog Admin
					if( current_user_can('list_users') ) {
						?>
						<a href="<?php echo get_admin_url(); ?>"><?php esc_html_e("blog admin", 'login-with-ajax'); ?></a>
						<?php
					}
				?>
			</td>
		</tr>
	</table>
	</div>
</div>