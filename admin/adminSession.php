<?php
session_start();
$link = (empty($_SERVER['HTTPS']) ? 'http' : 'https')."://$_SERVER[HTTP_HOST]/admin/index.php";
if(!isset($_SESSION['AdminUserID'])){
	
	header('location:'.$link);


}

?>