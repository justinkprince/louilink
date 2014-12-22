<?php
/**
 * @author: Javier Reyes Gomez (http://www.sociable.es)
 * @date: 05/10/2008
 * @license: GPLv2
 */

include_once 'fbConfig.php';

	global $wp_version, $fbconnect,$fb_reg_formfields;

			
			// Display the options page form
			$siteurl = get_option('home');
			if( substr( $siteurl, -1, 1 ) !== '/' ) $siteurl .= '/';
			?>
			<div class="wrap">
				<h2><?php _e('Sociable! - Facebook Connect Wordpress Plugin', 'fbconnect') ?></h2>
<fb:fan profile_id="62885075047" stream="1" connections="10" logobar="1" width="600"></fb:fan>
<div style="font-size:12px; padding-left:10px"><a href="http://www.sociable.es/">Sociable - The Social Media Blog</a> </div>


			</div>
