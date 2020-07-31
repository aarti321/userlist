<?php
/**
 * Plugin Name:       User listing
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 * 
 */

defined('ABSPATH')||exit;

define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());

add_action('admin_menu','plugin_menu');
function plugin_menu(){
    add_menu_page('User Listing','User Listing','manage_options','User-options','Userprocess',$icon_url ='', $postion =null);
    add_submenu_page('User-options','settings','settings','manage_options','settings','add_new_funct');
}

function Userprocess(){
    include_once PLUGIN_DIR_PATH."/includes/list.php";
}

function add_new_funct(){
    include_once PLUGIN_DIR_PATH."/includes/setting.php";
}

add_shortcode('list','frontendlist');

function frontendlist(){
    
   
    $args1 = array(
     'role' => 'subscriber',
     'orderby' => 'user_nicename',
     'order' => 'ASC'
    );
     $subscribers = get_users($args1);
    echo '<ul>';
     foreach ($subscribers as $user) {
     echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
     }
    echo '</ul>';

    $args1 = array(
        'role' => 'subscriber',
        'orderby' => 'user_nicename',
        'order' => 'ASC'
       );
        $subscribers = get_users($args1);
       echo '<ul>';
        foreach ($subscribers as $user) {
        echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
        }
       echo '</ul>';
       ?>
   
       
       <?php
       $args2 = array(
        'role' => 'admin',
        'orderby' => 'user_nicename',
        'order' => 'ASC'
       );
        $authors = get_users($args2);
       echo '<ul>';
        foreach ($authors as $user) {
        echo '<li>' . $user->display_name.'['.$user->user_email . ']</li>';
        }
       echo '</ul>';
    
}


   

