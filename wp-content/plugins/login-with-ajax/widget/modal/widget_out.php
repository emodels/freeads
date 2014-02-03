<?php 
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
	<div class="lwa lwa-template-modal"><?php //class must be here, and if this is a template, class name should be that of template directory ?>
            <a href="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" class="lwa-links-modal" style="color: white; padding-right: 10px"><u><?php esc_html_e('Sign Up','login-with-ajax') ?></u></a>
            <a href="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" class="lwa-links-modal" style="color: white"><u><?php esc_html_e('Log In','login-with-ajax') ?></u></a>
		<?php 
		//FOOTER - once the page loads, this will be moved automatically to the bottom of the document.
		?>
		<div class="lwa-modal" style="display:none;">
	        <form name="lwa-form" class="lwa-form" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">
	        	<span class="lwa-status"></span>
	            <table>
	                <tr class="lwa-username">
	                    <td class="username_label">
	                        <label><?php esc_html_e( 'Username','login-with-ajax' ) ?></label>
	                    </td>
	                    <td class="username_input">
	                        <input type="text" name="log" id="lwa_user_login" class="input" />
	                    </td>
	                </tr>
	                <tr class="lwa-password">
	                    <td class="password_label">
	                        <label><?php esc_html_e( 'Password','login-with-ajax' ) ?></label>
	                    </td>
	                    <td class="password_input">
	                        <input type="password" name="pwd" id="lwa_user_pass" class="input" value="" />
	                    </td>
	                </tr>
                	<tr><td colspan="2"><?php do_action('login_form'); ?></td></tr>
	                <tr class="lwa-submit">
	                    <td class="lwa-submit-button">
	                        <input type="submit" name="wp-submit" class="lwa-wp-submit" value="<?php esc_attr_e('Log In','login-with-ajax'); ?>" tabindex="100" />
	                        <input type="hidden" name="lwa_profile_link" value="<?php echo !empty($lwa_data['profile_link']) ? 1:0 ?>" />
                        	<input type="hidden" name="login-with-ajax" value="login" />
	                    </td>
	                    <td class="lwa-links">
	                        <input name="rememberme" type="checkbox" id="lwa_rememberme" value="forever" /> <label><?php esc_html_e( 'Remember Me','login-with-ajax' ) ?></label>
	                        <br />
				        	<?php if( !empty($lwa_data['remember']) ): ?>
							<a class="lwa-links-remember" href="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" title="<?php esc_attr_e('Password Lost and Found','login-with-ajax') ?>"><?php esc_attr_e('Lost your password?','login-with-ajax') ?></a>
							<?php endif; ?>
							<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
							<br />  
							<a href="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" class="lwa-links-register-inline"><?php esc_html_e('Register','login-with-ajax'); ?></a>
							<?php endif; ?>
	                    </td>
	                </tr>
	            </table>
	        </form>
        	<?php if( !empty($lwa_data['remember']) ): ?>
	        <form name="lwa-remember" class="lwa-remember" action="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" method="post" style="display:none;">
	        	<span class="lwa-status"></span>
	            <table>
	                <tr>
	                    <td>
	                        <strong><?php esc_html_e("Forgotten Password", 'login-with-ajax'); ?></strong>         
	                    </td>
	                </tr>
	                <tr class="lwa-remember-email">	                    
	                	<td>  
	                        <?php $msg = __("Enter username or email", 'login-with-ajax'); ?>
	                        <input type="text" name="user_login" id="lwa_user_remember" value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}" />
							<?php do_action('lostpassword_form'); ?>
	                    </td>
	                </tr>
	                <tr>
	                    <td>
	                        <input type="submit" value="<?php esc_attr_e("Get New Password", 'login-with-ajax'); ?>" />
	                          <a href="#" class="lwa-links-remember-cancel"><?php esc_html_e("Cancel",'login-with-ajax'); ?></a>
	                        <input type="hidden" name="login-with-ajax" value="remember" />
	                    </td>	                
	                </tr>
	            </table>
	        </form>
	        <?php endif; ?>
		    <?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : //Taken from wp-login.php ?>
		    <div class="lwa-register" style="display:none;">
				<form name="lwa-register"  action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">
	        		<span class="lwa-status"></span>
					<table>
		                <tr>
		                    <td>
		                        <strong><?php esc_html_e('Register For This Site','login-with-ajax') ?></strong>         
		                    </td>
		                </tr>
		                <tr class="lwa-username">
		                    <td>  
		                        <?php $msg = __('Username','login-with-ajax') ?>
		                        <input type="text" name="user_login" id="user_login"  value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}" /></label>   
		                    </td>
		                </tr>
		                <tr class="lwa-email">
		                    <td>  
		                        <?php $msg = __('E-mail','login-with-ajax') ?>
		                        <input type="text" name="user_email" id="user_email"  value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}"/></label>   
		                    </td>
		                </tr>
		                <tr>
		                    <td>
								<?php
								//If you want other plugins to play nice, you need this: 
								do_action('register_form'); 
							?>
		                    </td>
		                </tr>
		                <tr>
		                    <td>
		                        <?php esc_html_e('A password will be e-mailed to you.') ?><br />
								<input type="submit" value="<?php esc_attr_e('Register','login-with-ajax'); ?>" tabindex="100" />
								<a href="javascript:alert('ssss');$('.lwa-modal-close').click();" class="lwa-links-register-inline-cancel"><?php esc_html_e("Cancel",'login-with-ajax'); ?></a>
								<input type="hidden" name="login-with-ajax" value="register" />
		                    </td>
		                </tr>
		            </table>
				</form>
			</div>
			<?php endif; ?>
		</div>
	</div>