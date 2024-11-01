<?php
/*
Plugin Name: Ultimate Info
Plugin URI: https://persian-vc.com/ultimate-info/
Description: Show All Server And Wordpress Information. This Plugin Is Free For Ever
Version: 2
Author: KHL32
Author URI: https://persian-vc.com
*/
if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

function load_res_file_ui(){
	wp_enqueue_script( 'ultimate-info-js', plugins_url('resource/js/js.js',__FILE__));
	wp_enqueue_style('ultimate-info-css',plugins_url('resource/css/style.css',__FILE__));
}
add_action('admin_enqueue_scripts','load_res_file_ui');
//-----------------------
function Res_ui_main_menu(){
	include('class-Ultimate-Info.php');
	$ui_class = new Ultimate_Info\ultimate_info_ui;
	$user=wp_get_current_user();
if(in_array("administrator", $user->roles)){	
	$ui_class->main_UI();
}else{
	echo "<span class=\"attention\">Only administrator can view this section</span>";
}
}
//------------------------
function Res_ui_admin_menu(){
	add_menu_page('Ultimate Info','Ultimate Info',5,'Ultimate-Info','Res_ui_main_menu',plugins_url('resource/misc/icon.png',__FILE__));
}
add_action('admin_menu','Res_ui_admin_menu');
?>
