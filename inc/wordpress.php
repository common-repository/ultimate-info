<?php if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
$user=wp_get_current_user();
if(in_array("administrator", $user->roles)){?>

<div id="wordpress">
<div class="tab-title">
	Your Wordpress Information
</div>
<span class="prop">Site Url: </span><span class="val"><?php echo bloginfo('url');?></span><br>
<span class="prop">Admin Email: </span><span class="val"><?php echo bloginfo('admin_email');?></span><br>
<span class="prop">Atom Url: </span><span class="val"><?php echo bloginfo('atom_url');?></span><br>
<span class="prop">Charset: </span><span class="val"><?php echo bloginfo('charset');?></span><br>
<span class="prop">Comments Atom Url: </span><span class="val"><?php echo bloginfo('comments_atom_url');?></span><br>
<span class="prop">Comments Rss2 Url: </span><span class="val"><?php echo bloginfo('comments_rss2_url');?></span><br>
<span class="prop">Description </span><span class="val"><?php echo bloginfo('description');?></span><br>
<span class="prop">Home: </span><span class="val"><?php echo bloginfo('home');?></span><br>
<span class="prop">Html_type: </span><span class="val"><?php echo bloginfo('html_type');?></span><br>
<span class="prop">Language: </span><span class="val"><?php echo bloginfo('language');?></span><br>
<span class="prop">Name: </span><span class="val"><?php echo bloginfo('name');?></span><br>
<span class="prop">Pingback Url: </span><span class="val"><?php echo bloginfo('pingback_url');?></span><br>
<span class="prop">Rdf Url: </span><span class="val"><?php echo bloginfo('rdf_url');?></span><br>
<span class="prop">Rss2 Url: </span><span class="val"><?php echo bloginfo('rss2_url');?></span><br>
<span class="prop">Rss Url: </span><span class="val"><?php echo bloginfo('rss_url');?></span><br>
<span class="prop">Stylesheet Directory: </span><span class="val"><?php echo bloginfo('stylesheet_directory');?></span><br>
<span class="prop">Stylesheet Url: </span><span class="val"><?php echo bloginfo('stylesheet_url');?></span><br>
<span class="prop">Template Directory: </span><span class="val"><?php echo bloginfo('template_directory');?></span><br>
<span class="prop">Template Url: </span><span class="val"><?php echo bloginfo('template_url');?></span><br>
<span class="prop">Text Direction: </span><span class="val"><?php echo bloginfo('text_direction');?></span><br>
<span class="prop">Wordpress Version: </span><span class="val"><?php echo bloginfo('version');?></span><br>
<span class="prop">WP Url: </span><span class="val"><?php echo bloginfo('wpurl');?></span><br>
<span class="prop">Active Theme: </span><span class="val"><?php
$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
echo $theme_data['Name']." Version ".$theme_data['Version'];
;?></span><br><hr>
<?php $up_dir = wp_upload_dir();?>
<span class="prop">Upload Path: </span><span class="val"><?php echo $up_dir['path'];?></span><br>
<span class="prop">Upload url: </span><span class="val"><?php echo $up_dir['url'];?></span><br>
<span class="prop">Upload Subdir: </span><span class="val"><?php echo $up_dir['subdir'];?></span><br>
<span class="prop">Upload Basedir: </span><span class="val"><?php echo $up_dir['basedir'];?></span><br>
<span class="prop">Upload Base Url: </span><span class="val"><?php echo $up_dir['baseurl'];?></span><br>
<span class="prop">Upload Error: </span><span class="val"><?php echo $up_dir['error'];?></span><br>
<hr>
<?php
	echo "<h2 class='h2ps'>Plugins Status</h2>";
	echo "===========================================================================<br>";
	$plugins = get_plugins();
	ksort($plugins);
	foreach($plugins as $plugin_file => $plugin_data) {
		echo "<span class='prop'>Plugin Name: </span><span class='val'>".$plugin_data['Title']."</span>";
		if(is_plugin_active($plugin_file)) {
			echo '  <span class="bgspan"> Active</span>';
		} else {
			echo ' <span style="color:red;">Inactive</span>';
		}
		echo "  Version: ".$plugin_data['Version'];
	echo "  Plugin URI: ";?><a target="_blank"id="aplink" href='<?php echo $plugin_data["PluginURI"];?>'><?php echo $plugin_data['PluginURI'] . "</a><br><hr>";
	echo "\r\n";
	}
?>
</tbody>
 </table>
<h2 class='h2ps'>Wordpress Users</h2>
===========================================================================<br>
<table id="wpuser">
<tr>
<td class="wpuser-td-title">User Name</td>
<td class="wpuser-td-title">User Email</td>
<td class="wpuser-td-title">User Nicename</td>
<td class="wpuser-td-title">User Url</td>
<td class="wpuser-td-title">Date Registerd</td><div class="user-value">
<?php
if( current_user_can('administrator')) { 
$blogusers = get_users();
foreach ( $blogusers as $user ) {
	echo "<tr><td class=user-value>";
	echo  $user->user_login ;
	echo "</td><td class=user-value>";
	echo  $user->user_email ;
	echo "</td><td class=user-value>";
	echo  $user->user_nicename ;
	echo "</td><td class=user-value>";
	echo  $user->user_url;
	echo "</td><td class=user-value>";
	echo  $user->user_registered ;
	echo "</td></tr>";
} 
} else {
echo "<tr><td class=user-value>
Only Administrator Can View This Section.
";
}

?>
</div>
</tr></table>
<br>
<h2 class='h2ps'>Wordpress Posts</h2>
===========================================================================<br>
<?php
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
$drafted_posts = $count_posts->draft;
$count_pages = wp_count_posts('page');
$page_post = $count_pages->publish;
?>
<span class="prop">Published Post Count: </span><span class="val"><?php echo $published_posts;?></span><br>
<span class="prop">Draft Post Count: </span><span class="val"><?php echo $drafted_posts;?></span><br>
<span class="prop">Published Page Count: </span><span class="val"><?php echo $page_post;?>
</span>
<hr />
<h2 class='h2ps'>WP Config Information</h2>
===========================================================================<br>
<?php
if( current_user_can('administrator')) { 
$file = file_get_contents('../wp-config.php');
echo "<textarea id='wp-config-txt' readonly>".$file."</textarea>";
} else {
echo "Only Administrator Can View This Section.";
}
?>
</div>
</div>

<?php
}else{
	echo "Only Administrator Can View This Section.";
}
?>