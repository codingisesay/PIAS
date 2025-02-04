<?php 
include('../adminSession.php');
include('../../connection.php');
if(isset($_REQUEST['submit'])){

    $courseId = mysqli_real_escape_string($conn, $_POST['courseId']);
    $courseType = mysqli_real_escape_string($conn, $_POST['courseType']);
    $courseSubType = mysqli_real_escape_string($conn, $_POST['courseSubType']);
   
    $medium = mysqli_real_escape_string($conn, $_POST['medium']);
    $courseName = mysqli_real_escape_string($conn, $_POST['courseName']);

    $coourseFee = mysqli_real_escape_string($conn, $_POST['coourseFee']);
    $courseFreeAmount = mysqli_real_escape_string($conn, $_POST['courseFreeAmount']);
    $BaseYear = mysqli_real_escape_string($conn, $_POST['BaseYear']);
    $TargetYear = mysqli_real_escape_string($conn, $_POST['TargetYear']);
    $LiveChannel = mysqli_real_escape_string($conn, $_POST['LiveChannel']);
    $LiveChat = mysqli_real_escape_string($conn, $_POST['LiveChat']);
    $CourseStartDate = mysqli_real_escape_string($conn, $_POST['CourseStartDate']);
    $CourseEndDate = mysqli_real_escape_string($conn, $_POST['CourseEndDate']);
    $CourseStatus = mysqli_real_escape_string($conn, $_POST['CourseStatus']);

    // $query="INSERT INTO `Course` (`CourseTypeId`, `CourseSubTypeId`,`ModuleId`, `CourseMedium`, `CourseName`, `Fee`, `FeeAmount`, `BaseYear`, `TargetYear`, `LiveChannel`, `LiveChat`, `CourseStartDate`, `CourseEndDate`, `CourseStatus`)
    //                       VALUES ('$courseType', '$courseSubType', '$ModuleId', '$medium', '$courseName', '$coourseFee', '$courseFreeAmount', '$BaseYear', '$TargetYear', '$LiveChannel', '$LiveChat', '$CourseStartDate', '$CourseEndDate', '$CourseStatus')";
    //                       $run = mysqli_query($conn,$query);

     $query = "UPDATE Course
     SET `CourseTypeId` = '$courseType',
      `CourseSubTypeId`= '$courseSubType',
     
       `CourseMedium` = '$medium',
        `CourseName` ='$courseName',
         `Fee`='$coourseFee',
          `FeeAmount`='$courseFreeAmount',
           `BaseYear`='$BaseYear',
            `TargetYear`='$TargetYear',
             `LiveChannel`='$LiveChannel',
              `LiveChat`='$LiveChat',
               `CourseStartDate`='$CourseStartDate',
                `CourseEndDate`='$CourseEndDate',
                 `CourseStatus` = '$CourseStatus' WHERE CourseId = '$courseId'" ;         
                 
                 $run = mysqli_query($conn,$query);

                          if($run){?>
                          <script>
                          alert("Course Updated");
                          location.replace('classroomPackage.php');
                          
                          </script>
                          <?php

                          }else{
                            
                            // echo("Error description: " . mysqli_error($conn));
                            
                            ?>
                          
                          <script>
                          alert("Record Not Updated");
                          location.replace('classroomPackage.php');
                          
                          </script>
                          
                          <?php

                          }
    

}



?>