<?php 
include('../adminSession.php');
include('../../connection.php');
?>
<?php 

if(isset($_REQUEST['submit'])){

     $studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
     $studentMailId = mysqli_real_escape_string($conn, $_POST['studentMailId']);
     $studentPassword = mysqli_real_escape_string($conn, $_POST['studentPassword']);

     $studentPasswordHash = md5($studentPassword);

     $studentMobileNo = mysqli_real_escape_string($conn, $_POST['studentMobileNo']);
     $portalStatus = mysqli_real_escape_string($conn, $_POST['portalStatus']);
     $studentModules =  $_POST['studentModules'];
    
     $mode = mysqli_real_escape_string($conn, $_POST['mode']);

     $adminId = $_SESSION['AdminUserID'];
     $studentModulescount = count($studentModules);

     $query = "INSERT INTO `Students` (`Name`, `MailId`, `Password`, `MobileNo`, `StudentStatus`, `InsertBy`)
                 VALUES ('$studentName', '$studentMailId', '$studentPasswordHash', '$studentMobileNo', '$portalStatus','$adminId')";

                 $runStudentDetail = mysqli_query($conn,$query);

                 if($runStudentDetail){

                    $queryForStudentId = "SELECT * FROM Students WHERE MailId = '$studentMailId'";
                    $runqueryForStudentId = mysqli_query($conn,$queryForStudentId);
                    $data = mysqli_fetch_assoc($runqueryForStudentId);
                    $studentId = $data['StudentId'];
                    
                    for($i=0; $i < $studentModulescount; $i++){
                      
                        $queryForModuleAssign = "INSERT INTO `StudentAssignCourse` (`StudentId`, `CourseId`, `mode`,`InsertBy`)
                         VALUES ('$studentId', '$studentModules[$i]', '$mode','$adminId')";
                         mysqli_query($conn,$queryForModuleAssign);


                    

                    }?>
                    <script>
                        alert("Student Portal Created And Module is Also Assigned");
                        location.replace('registrationhome.php');
                    </script>
                    
                    <?php


                 }else{
                    echo("Error description: " . mysqli_error($conn));
                 }
    



}



?>