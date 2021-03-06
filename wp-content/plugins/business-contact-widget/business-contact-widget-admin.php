<?php
/*  Copyright 2012 StressFree Sites  (info@stressfreesites.co.uk : alex@stressfreesites.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 3, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!current_user_can('manage_options')){
    wp_die( __( 'You do not have sufficient permissions to access this page.', 'bcw-language' ) );           
}

if(isset($_POST['submit'])){ 
    //get all widget details as some details are not changed
    $widget = get_option('widget_business-contact-widget','');
    
    $widget[2]['telephone'] = sanitize_text_field($_POST['bcw_telephone']);
    $widget[2]['fax'] = sanitize_text_field($_POST['bcw_fax']);
    $widget[2]['mobileName'] = sanitize_text_field($_POST['bcw_mobileName']);
    $widget[2]['mobileNo'] = sanitize_text_field($_POST['bcw_mobileNo']);
    $widget[2]['mobileName2'] = sanitize_text_field($_POST['bcw_mobileName2']);
    $widget[2]['mobileNo2'] = sanitize_text_field($_POST['bcw_mobileNo2']);
    $widget[2]['mobileName3'] = sanitize_text_field($_POST['bcw_mobileName3']);
    $widget[2]['mobileNo3'] = sanitize_text_field($_POST['bcw_mobileNo3']);
    $widget[2]['otherTelephoneName'] = sanitize_text_field($_POST['bcw_otherTelephoneName']);
    $widget[2]['otherTelephoneNo'] = sanitize_text_field($_POST['bcw_otherTelephoneNo']);
    $widget[2]['email'] = sanitize_text_field($_POST['bcw_email']);
    $widget[2]['personalEmailName'] = sanitize_text_field($_POST['bcw_personalEmailName']);
    $widget[2]['personalEmail'] = sanitize_text_field($_POST['bcw_personalEmail']);
    $widget[2]['personalEmailName2'] = sanitize_text_field($_POST['bcw_personalEmailName2']);
    $widget[2]['personalEmail2'] = sanitize_text_field($_POST['bcw_personalEmail2']);
    $widget[2]['personalEmailName3'] = sanitize_text_field($_POST['bcw_personalEmailName3']);
    $widget[2]['personalEmail3'] = sanitize_text_field($_POST['bcw_personalEmail3']);
    $widget[2]['otherEmailName'] = sanitize_text_field($_POST['bcw_otherEmailName']);
    $widget[2]['otherEmail'] = sanitize_text_field($_POST['bcw_otherEmail']);  
    $widget[2]['mainAddressName'] = $_POST['bcw_mainAddressName'];
    $widget[2]['mainAddress'] = $_POST['bcw_mainAddress'];
    $widget[2]['secondaryAddressName'] = $_POST['bcw_secondaryAddressName'];
    $widget[2]['secondaryAddress'] = $_POST['bcw_secondaryAddress'];
    $widget[2]['message'] = $_POST['bcw_message'];
    $widget[2]['map'] = $_POST['bcw_map'];
    $widget[2]['openingTimes'] = $_POST['bcw_openingTimes'];

    update_option('widget_business-contact-widget', $widget); 
    
    $loadJqueryUI = $_POST['bcw_load_jquery_ui'];
    update_option('bcw_load_jquery_ui', $loadJqueryUI);
    $style = $_POST['bcw_style'];
    update_option('bcw_style', $style);    

    $loadScripts = $_POST['bcw_load_scripts'];
    update_option('bcw_load_scripts', $loadScripts);
        
    ?>
    <div class="updated"><p><strong><?php _e('Options saved.', 'bcw-language');?></strong></p></div>
    <?php
}
else{
    //get widget values
    $widget = get_option('widget_business-contact-widget','');
}

if($widget != ''){
    if(!isset($widget[2]['telephone'])){
        $defaults = array('telephone' => '', 'fax' => '', 'mobileName' => '', 'mobileNo' => '', 'mobileName2' => '', 'mobileNo2' => '', 'mobileName3' => '', 'mobileNo3' => '', 'otherTelephoneName' => '', 'otherTelephoneNo' => '', 
                          'email' => '', 'personalEmailName' => '', 'personalEmail' => '', 'personalEmailName2' => '', 'personalEmail2' => '', 'personalEmailName3' => '', 'personalEmail3' => '', 'otherEmailName' => '', 'otherEmail' => '',
                          'address' => '', 
                          'secondaryAddress' => '', 
                          'message' => '',
                          'map' => '<iframe width="220" height="220" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?client=safari&amp;oe=UTF-8&amp;q=London&amp;ie=UTF8&amp;hq=&amp;hnear=London,+United+Kingdom&amp;gl=uk&amp;t=m&amp;z=11&amp;ll=51.507335,-0.127683&amp;output=embed"></iframe>', 
                          'openingTimes' => '');

        $widget[2] = wp_parse_args((array) $widget, $defaults);        
    }

    $loadJqueryUI = get_option('bcw_load_jquery_ui','true');
    $style = get_option('bcw_style','Grey');  

    $loadScripts = get_option('bcw_load_scripts', array('jQuery' => 1, 
                                                         'jQuery-ui-core' => 1,
                                                         'jQuery-ui-tabs' => 1));
    ?>
    <div class="wrap">
        <?php 
        echo '<div class="created-by">' . __('Plugin created by', 'bcw-language') . '<br/><a href="http://stressfreesites.co.uk" target="_blank"><img src="' . plugins_url('business-contact-widget/images/stressfreesites.png') . '" /></a></div>';
        
        echo '<div id="icon-options-general" class="icon32"><br /></div><h2>' . __('Business Contact Widget', 'bcw-language') . '</h2>'; 
        
        echo '<div class="links"><a href="http://stressfreesites.co.uk/development" target="_blank"><img src="' . plugins_url('business-contact-widget/images/home_small.jpg') . '" /><a href="http://facebook.com/stressfreesites" target="_blank"><img src="' . plugins_url('business-contact-widget/images/facebook_small.jpg') . '" /><a href="http://twitter.com/stressfreesites" target="_blank"><img src="' . plugins_url('business-contact-widget/images/twitter_small.jpg') . '" /><a href="http://stressfreesites.co.uk/forums" target="_blank"><img src="' . plugins_url('business-contact-widget/images/support_small.jpg') . '" /></a></div>';        
        ?>
        <form name="bcw_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <?php echo '<h3>' . __('Contact Settings', 'bcw-language') . '</h3>'; ?>

            <?php echo '<img src="' . plugins_url('/business-contact-widget/images/telephone.png') . '" alt="Telephone"/><h4 class="bcw-admin-title">' . __('Telephone Settings', 'bcw-language') . '</h4>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_telephone"><?php _e('Telephone','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_telephone" name="bcw_telephone" value="<?php echo $widget[2]['telephone']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_fax"><?php _e('Fax','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_fax" name="bcw_fax" value="<?php echo $widget[2]['fax']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mobileName"><?php _e('Mobile Person\'s Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mobileName" name="bcw_mobileName" value="<?php echo $widget[2]['mobileName']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mobileNo"><?php _e('Their Mobile Number','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mobileNo" name="bcw_mobileNo" value="<?php echo $widget[2]['mobileNo']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mobileName2"><?php _e('2nd Mobile Person\'s Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mobileName2" name="bcw_mobileName2" value="<?php echo $widget[2]['mobileName2']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mobileNo2"><?php _e('Their Mobile Number','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mobileNo2" name="bcw_mobileNo2" value="<?php echo $widget[2]['mobileNo2']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mobileName3"><?php _e('3rd Mobile Person\'s Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mobileName3" name="bcw_mobileName3" value="<?php echo $widget[2]['mobileName3']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mobileNo3"><?php _e('Their Mobile Number','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mobileNo3" name="bcw_mobileNo3" value="<?php echo $widget[2]['mobileNo3']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_otherTelephoneName"><?php _e('Other Telephone Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_otherTelephoneName" name="bcw_otherTelephoneName" value="<?php echo $widget[2]['otherTelephoneName']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_otherTelephoneNo"><?php _e('Other Telephone Number','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_otherTelephoneNo" name="bcw_otherTelephoneNo" value="<?php echo $widget[2]['otherTelephoneNo']; ?>" />		
                  </td>
                </tr>            
               </tbody>
            </table><br />

            <?php echo '<img src="' . plugins_url('/business-contact-widget/images/email.png') . '" alt="Email"/><h4 class="bcw-admin-title">' . __('Email Settings', 'bcw-language') . '</h4>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_email"><?php _e('Email','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_email" name="bcw_email" value="<?php echo $widget[2]['email']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_personalEmailName"><?php _e('Personal Email Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_personalEmailName" name="bcw_personalEmailName" value="<?php echo $widget[2]['personalEmailName']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_personalEmail"><?php _e('Personal Email Address','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_personalEmail" name="bcw_personalEmail" value="<?php echo $widget[2]['personalEmail']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_personalEmailName2"><?php _e('2nd Personal Email Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_personalEmailName2" name="bcw_personalEmailName2" value="<?php echo $widget[2]['personalEmailName2']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_personalEmail2"><?php _e('2nd Personal Email Address','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_personalEmail2" name="bcw_personalEmail2" value="<?php echo $widget[2]['personalEmail2']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_personalEmailName3"><?php _e('3rd Personal Email Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_personalEmailName3" name="bcw_personalEmailName3" value="<?php echo $widget[2]['personalEmailName3']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_personalEmail3"><?php _e('3rd Personal Email Address','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_personalEmail3" name="bcw_personalEmail3" value="<?php echo $widget[2]['personalEmail3']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_otherEmailName"><?php _e('Other Email Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_otherEmailName" name="bcw_otherEmailName" value="<?php echo $widget[2]['otherEmailName']; ?>" />		
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_otherEmail"><?php _e('Other Email Address','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_otherEmail" name="bcw_otherEmail" value="<?php echo $widget[2]['otherEmail']; ?>" />		
                  </td>
                </tr>
              </tbody>
            </table><br />

            <?php echo '<img src="' . plugins_url('/business-contact-widget/images/address.png') . '" alt="Address" /><h4 class="bcw-admin-title">' . __('Address Settings', 'bcw-language') . '</h4>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mainAddressName"><?php _e('Main Address Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_mainAddressName" name="bcw_mainAddressName" value="<?php echo $widget[2]['mainAddressName']; ?>" />		
                  </td>
                </tr>  
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_mainAddress"><?php _e('Main Address','bcw-language'); ?></label>
                  </th>
                  <td>
                      <textarea id="bcw_mainAddress" name="bcw_mainAddress"><?php echo $widget[2]['mainAddress']; ?></textarea>	
                  </td>
                </tr>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_secondaryAddressName"><?php _e('Secondary Address Name','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_secondaryAddressName" name="bcw_secondaryAddressName" value="<?php echo $widget[2]['secondaryAddressName']; ?>" />		
                  </td>
                </tr>  
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_secondaryAddress"><?php _e('Secondary Address','bcw-language'); ?></label>
                  </th>
                  <td>
                      <textarea id="bcw_secondaryAddress" name="bcw_secondaryAddress"><?php echo $widget[2]['secondaryAddress']; ?></textarea>	
                  </td>
                </tr>                
              </tbody>
            </table><br />
            
            <?php echo '<img src="' . plugins_url('/business-contact-widget/images/write.png') . '" alt="Write" /><h4 class="bcw-admin-title">' . __('Message Settings', 'bcw-language') . '</h4>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_message"><?php _e('Message Now','bcw-language'); ?></label>
                  </th>
                  <td>
                      <input id="bcw_message" name="bcw_message" value="<?php echo esc_html(stripslashes($widget[2]['message'])); ?>" />
                      <p class="description">Enter the shortcode for a contact form to allow instant messages.</p>
                  </td>
                </tr>
              </tbody>
            </table><br />

            <?php echo '<img src="' . plugins_url('/business-contact-widget/images/map.png') . '" alt="Map"/><h4 class="bcw-admin-title">' . __('Location Settings', 'bcw-language') . '</h4>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_map"><?php _e('Map (iframe)','bcw-language'); ?></label>
                  </th>
                  <td>
                      <textarea id="bcw_map" name="bcw_map"><?php echo esc_html(stripslashes($widget[2]['map'])); ?></textarea>
                      <p class="description"><?php _e('Insert the iframe code generated from online tools like Google maps', 'bcw-language'); ?></p>
                  </td>
                </tr>
              </tbody>
            </table><br />

            <?php echo '<img src="' . plugins_url('/business-contact-widget/images/clock.png') . '" alt="Openings" /><h4 class="bcw-admin-title">' . __('Opening Times Settings', 'bcw-language') . '</h4>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <label for="bcw_openingTimes"><?php _e('Opening Times','bcw-language'); ?></label>
                  </th>
                  <td>
                      <textarea id="bcw_openingTimes" name="bcw_openingTimes"><?php echo $widget[2]['openingTimes']; ?></textarea>
                  </td>
                </tr>
              </tbody>
            </table><br />

            <hr />
            <?php echo '<h3>' . __('Style Settings', 'bcw-language') . '</h3>'; ?>

            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <?php _e('Load jQuery UI styling', 'bcw-language'); ?>
                  </th>
                  <td>
                      <input class="checkbox" type="checkbox" id="bcw_load_jquery_ui" name="bcw_load_jquery_ui" <?php checked($loadJqueryUI, 'true'); ?> value="true" />
                      <label for="bcw_load_jquery_ui"><?php _e('If another plugin or your theme already has jQuery UI loaded (incorrectly) then untick this to stop the plugin\'s styling overriding and interferaring. NOTE: this will make the selection below redundant', 'bcw-language'); ?></label><br />           
                  </td>               
                </tr>
                <tr valign="top">
                  <th scope="row">
                    <label for="bcw_style"><?php _e('Widget Style','bcw-language'); ?></label>
                  </th>
                  <td>
                    <select name="bcw_style"> 
                        <option <?php if($style == 'Grey') echo ('SELECTED');?>>Grey</option>
                        <option <?php if($style == 'Black') echo ('SELECTED');?>>Black</option>
                        <option <?php if($style == 'Blue') echo ('SELECTED');?>>Blue</option>          
                     </select><p class="description"><?php _e('Change the widget style to match your website', 'bcw-language'); ?></p>
                   </td>               
                </tr>           
              </tbody>
            </table>
            <hr />
            
            <?php echo '<h3 class="bcw-admin-title">' . __('System Settings', 'bcw-language') . '</h3>'; ?>
            <table class="form-table">
              <tbody>
                <tr valign="top">
                  <th scope="row">
                      <?php _e('Load jQuery and jQuery UI scripts', 'bcw-language'); ?>
                  </th>
                  <td>                  
                      <input type="checkbox" name="bcw_load_scripts[jQuery]" value="1" <?php checked( 1 == $loadScripts['jQuery'] ); ?> />
                      <label for="bcw_load_scripts[jQuery]">jQuery</label><br/>
                      <input type="checkbox" name="bcw_load_scripts[jQuery-ui-core]" value="1" <?php checked( 1 == $loadScripts['jQuery-ui-core'] ); ?> />
                      <label for="bcw_load_scripts[jQuery-ui-core]">jQuery-UI-Core</label><br/>
                      <input type="checkbox" name="bcw_load_scripts[jQuery-ui-tabs]" value="1" <?php checked( 1 == $loadScripts['jQuery-ui-tabs'] ); ?> />
                      <label for="bcw_load_scripts[jQuery-ui-tabs]">jQuery-UI-Tabs</label><br/>
                      <p class="description"><?php _e('If another plugin or your theme already has jQuery, jQuery UI or jQuery UI Tabs loaded (incorrectly) then untick the corresponding script to stop the plugin\'s loading it twice causing it not to work.', 'bcw-language'); ?></p>           
                  </td>               
                </tr>

             </tbody>
            </table>
            <hr/>
            
            <p class="submit">
                <input type="submit" name="submit" class="button-primary" value="<?php _e('Update Options', 'bcw-language') ?>" />
            </p>
        </form>
        <?php 
        echo '<h3>' . __('Troubleshooting', 'bcw-language') . '</h3>';
        echo '<h4>' . __('If the widget does not display correctly', 'bcw-languaage') . '</h4>';
        echo '<p class="description">' . __('If this happen it means that you have a theme or plugin which loads jQuery or jQuery UI incorrectly. To resolve this untick the options jQuery, jQuery UI and jQuery UI Tabs. See if that makes the widget display correctly. If it doesn\'t try ticking jQuery UI Tabs, then checking, then ticking jQuery UI and so on.' , 'bcw-language') . '</p>';           
        echo '<h4>' . __('If the widget interferes with the styling of other areas of your website', 'bcw-language') . '</h4>';
        echo '<p class="description">' . __('If this happens you do not need the default styling of the widet. To resolve this untick the styling option load jQuery UI styling.' , 'bcw-language') .'</p>';           
        ?>
    </div>
    <?php
}
else{
    ?>
    <div class="wrap">
        <div style="float:right;padding:10px;text-align:right;"><?php _e('Plugin created by', 'bcw-language'); ?><br/><a href="http://stressfreesites.co.uk" target="_blank"><img src="<?php echo plugins_url('business-contact-widget/images/stressfreesites.png'); ?>" /></a></div>    
        <div class="error"><p><strong><?php _e('Please add the Business Contact Widget to one of your <a href="widgets.php">sidebars</a> then come back to this page to edit the settings.', 'bcw-language');?></strong></p></div>
    </div>
    <?php
}

?>