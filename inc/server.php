<?php if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
$user=wp_get_current_user();
if(in_array("administrator", $user->roles)){?>
<div id="basic-informations">
  <h3>Basic Informations</h3>  
<?php
foreach($_SERVER as $key => $value){
	echo "<p id='info-1'><span class='key'>$key</span><input readonly='readonly' class='value' value='$value'> <br/>"; 
}
?>
  </div>
  <div id="main-phpini"
  <h3>PHP.ini Configuration Details</h3>
  <hr />
  <div class='phpini'>
<div class='phpini-1'>
<?php
echo 'open_basedir = ' . ini_get('open_basedir').'<br>';
echo 'precision = ' . ini_get('precision').'<br>';
echo 'short_open_tag = ' . ini_get('short_open_tag').'<br>';
echo 'display_errors = ' . ini_get('display_errors').'<br>';
echo 'disable_functions = <b><br>' . ini_get('disable_functions').'</b><br>';
echo 'max_execution_time = ' . ini_get('max_execution_time').'<br>';
echo 'memory_limit = ' . ini_get('memory_limit').'<br>';
echo 'error_reporting = ' . ini_get('error_reporting').'<br>';
echo 'log_errors = ' . ini_get('log_errors').'<br>';
echo 'error_log = ' . ini_get('error_log').'<br>';
echo 'sendmail_from = ' . ini_get('sendmail_from').'<br>';
echo 'sendmail_path = ' . ini_get('sendmail_path').'<br>';
echo 'default_mimetype = ' . ini_get('default_mimetype').'<br>';
echo 'upload_tmp_dir = ' . ini_get('upload_tmp_dir').'<br>';
echo 'open_basedir = ' . ini_get('open_basedir').'<br>';
echo 'post_max_size = ' . ini_get('post_max_size') .'<br>';

?>
</div>
<div class='phpini-1'>
  <?php
echo 'upload_max_filesize = ' . ini_get('upload_max_filesize').'<br>';
echo 'max_file_uploads = ' . ini_get('max_file_uploads').'<br>';
echo 'allow_url_fopen = ' . ini_get('allow_url_fopen').'<br>';
echo 'mysql.default_port = ' . ini_get('mysql.default_port').'<br>';
echo 'mysql.default_host = ' . ini_get('mysql.default_host').'<br>';
echo 'mysql.default_user = ' . ini_get('mysql.default_user').'<br>';
echo 'mysql.default_password = ' . ini_get('mysql.default_password').'<br>';
echo 'mysqli.default_port = ' . ini_get('mysqli.default_port').'<br>';
echo 'mysqli.default_host = ' . ini_get('mysqli.default_host').'<br>';
echo 'mysqli.default_user = ' . ini_get('mysqli.default_user').'<br>';
echo 'mysqli.default_pw = ' . ini_get('mysqli.default_pw').'<br>';
echo 'session.save_path = ' . ini_get('session.save_path').'<br>';
echo 'session.name = ' . ini_get('session.name').'<br>';
echo 'url_rewriter.tags = ' . ini_get('url_rewriter.tags').'<br>';
?>
</div>
</div>
</div>
  <div id="phple">
  <h3>PHP Loaded Extention</h3>
<table id="phple">
  <thead>
    <tr>
      <td>Name</td>
      <td>Version</td>
    </tr>
  </thead>
  <tbody>
<?php
	$extensions = get_loaded_extensions();
	ksort($extensions);
	foreach($extensions as $extension) {
		$version = phpversion($extension);
		echo "<tr><td>".str_pad($extension, 30);
		echo "</td><td>".phpversion($extension) . "</td></tr>";
	}
?>
</tbody>
 </table>
</div> 
<?php
}else{
	echo "Only Administrator Can View This Section.";
}
echo "</div>";
?>