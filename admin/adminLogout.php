
<?php 
$link = (empty($_SERVER['HTTPS']) ? 'http' : 'https')."://$_SERVER[HTTP_HOST]/admin/index.php";
session_start();
session_destroy();
header('location:'.$link);


?>

