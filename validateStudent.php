<?php 
include('connection.php');
if(isset($_REQUEST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['first']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $passwordHash = md5($password);

    if(filter_var($username, FILTER_VALIDATE_EMAIL)){

        $query = "SELECT * FROM Students WHERE MailId = '$username' AND Password = '$passwordHash'";
        $run = mysqli_query($conn,$query);
        $row = mysqli_num_rows($run);
        $data = mysqli_fetch_assoc($run);
        if($row == 1){
         $StudentId = $data['StudentId'];
         $MailId = $data['MailId'];
         $MobileNo = $data['MobileNo'];
         $Name = $data['Name'];
         session_start();
         $_SESSION["StudentId"] = $StudentId;
         $_SESSION["MailId"] = $MailId;
         $_SESSION["MobileNo"] = $MobileNo;
         $_SESSION["Name"] = $Name;
         header('location:studentZone/dashboard.php');
            
     
        }

    }else{?>
   
   <script>
    alert("Username Password not Match.");
    location.replace('login.php');
   </script>
   
   <?php

   }


}




?>