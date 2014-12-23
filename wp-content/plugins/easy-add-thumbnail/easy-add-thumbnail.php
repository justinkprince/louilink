<?php
/*
* Plugin Name: Easy Add Thumbnail
* Plugin URI: http://wordpress.org/extend/plugins/easy-add-thumbnail/
* Description: Checks if you defined the featured image, and if not it sets the featured image to the first uploaded image into that post. So easy like that...
* Author: Samuel Aguilera
* Version: 1.1
* Author URI: http://www.samuelaguilera.com
* Requires at least: 3.7
* Tested up to: 3.8
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License version 3 as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( function_exists( 'add_theme_support' ) ) {

add_theme_support( 'post-thumbnails' ); // This should be in your theme. But we add this here because this way we can have featured images before swicth to a theme that supports them.
      
      function easy_add_thumbnail($post) {
          
          $already_has_thumb = has_post_thumbnail();
         
              if (!$already_has_thumb)  {

              $attached_image = get_children( "order=ASC&post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

                          if ($attached_image) {

                            $attachment_values = array_values($attached_image);
                            $first_child_image = $attachment_values[0];
                                                    
                                add_post_meta($post->ID, '_thumbnail_id', $first_child_image->ID, true);                                 
                        
                           }
                           
                         
                        }
      }

  add_action('the_post', 'easy_add_thumbnail');
 
  // hooks added to set the thumbnail when publishing too
  add_action('new_to_publish', 'easy_add_thumbnail');
  add_action('draft_to_publish', 'easy_add_thumbnail');
  add_action('pending_to_publish', 'easy_add_thumbnail');
  add_action('future_to_publish', 'easy_add_thumbnail');


}

?>