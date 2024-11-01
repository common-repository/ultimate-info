<?php
namespace Ultimate_Info;
if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
define("UI_PATH",plugin_dir_path(__FILE__));
class ultimate_Info_Ui {
	// Define Main Plugin Functions
	public function main_UI(){
		$sc = plugins_url("resource/js/js.js",__FILE__);
echo '
<div class="wrap">
<div class="uimain">
  <h2 id="ultimate-info-title"><span>Wellcome To Ultimate Info V 2 </span></h2>
<div class="ui">
  <ul>
    <li><a id="li-server">Server</a></li>
    <li><a id="li-wordpress">Wordpress</a></li>
    <li><a id="li-about">About</a></li>
  </ul>
  </div>
<div id="server-items">
<ul>
<li><span id="server-items-bi">Basic Informations</span></li>
<li><span id="server-items-phpini">PHP.ini Configuration</span></li>
<li><span id="server-items-phple">PHP Loaded Extention</span></li>
</ul>
</div>
<hr />
<div class="tab-title">';
$this->server_UI();
echo '
  </div>
  <div id="tabs-wi">
<div class="tab-title">';
$this->wordpress_UI();
echo '
</div>
  </div>';
$this->about_UI();
echo '
  </div>
</div>
';
}		

public function about_UI(){
	$ui_image = plugins_url('resource/images/ui-bg.jpg',__FILE__);
	echo '
<div id="about">
<img id="about-img" src="';echo $ui_image;
echo '" />
<p><strong>Ultimate Info</strong> is a free plugin for wordpress website administrators to find usefull information about Herself website. Ultimate Info will be update in evry month. I hope you will be happy.
</p><hr />
<p>
<strong>Author: </strong>Alex [KHL32]
<br>
<strong>site: </strong><a href="https://persian-vc.com/">https://persian-vc.com/</a>
<br>
<strong>E-mail: </strong>f32black@gmail.com
</p>
</div>
	';
}

public function server_UI(){
$user=wp_get_current_user();
if(in_array("administrator", $user->roles)){
include (UI_PATH.'inc/server.php');
}else{
	echo "<span class=\"attention\">Only Administrator Can View This Section.</span>";
}
}

public function wordpress_UI(){
	$user=wp_get_current_user();
if(in_array("administrator", $user->roles)){
	include (UI_PATH.'inc/wordpress.php');	
	}else{
		echo "<span class=\"attention\">Only Administrator Can View This Section.</span>";
	}
}
}
?>