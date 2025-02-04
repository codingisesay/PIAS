<?php 
include('../adminSession.php');
include('../../connection.php');
?>
<?php 

if(isset($_REQUEST['submit'])){

    $primary_course = mysqli_real_escape_string($conn, $_POST['primary_course']);
     $boundledcourse =  $_POST['boundledcourse'];
     $adminId = $_SESSION['AdminUserID'];
     $boundledcoursecount = count($boundledcourse);
    //  echo "<pre>";
    //  print_r($boundledcourse);

    for($i = 0; $i < $boundledcoursecount; $i++){
        $query = "INSERT INTO `CourseBoundling` (`BoundleCourse`, `BoundleCourseWith`,`InsertBy`) 
                   VALUES ('$primary_course', '$boundledcourse[$i]','$adminId')";
                   mysqli_query($conn,$query);

    }?>
    <script>
        alert("Course Boundled Successfull!");
        location.replace('course_bundling_home.php');
    </script>
    
    
    <?php

     
}



?>