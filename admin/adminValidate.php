<?php 

include("../connection.php");

if(isset($_REQUEST['submit'])){

$userMailId = trim(mysqli_real_escape_string($conn,$_REQUEST['usermailID']));
$userPassword  = trim(mysqli_real_escape_string($conn,$_REQUEST['userPassword']));
$userPasswordMd5 = md5($userPassword);


if($userMailId != "" && $userPasswordMd5 != ""){

	$queryForlogin = "SELECT * FROM adminUser WHERE adminUser.MailId = '$userMailId' AND adminUser.Password = '$userPasswordMd5'";

$run = mysqli_query($conn,$queryForlogin);
$row = mysqli_num_rows($run);

if ($row == 1) {

  $data = mysqli_fetch_assoc($run);
  $userId = $data['AdminUserID'];
  session_start();
  $_SESSION["AdminUserID"] = $userId;
  header("location:adminHome.php");
 
} else {?>

<script type="text/javascript">
alert("User Or Password Not Match");
location.replace("index.php");
</script>


	<?php

}
$conn->close();

}else{?>

<script type="text/javascript">
alert("All the Fields Are Required");
location.replace("index.php");
</script>

	<?php


}

}


?>