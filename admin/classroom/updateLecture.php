<?php 
include('../adminSession.php');
include('../../connection.php');
if(isset($_REQUEST['submit'])){
    
    
    $LectureId = mysqli_real_escape_string($conn, $_POST['lectureId']);
    $moduleId = mysqli_real_escape_string($conn, $_POST['moduleId']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $SubjectLocalName = mysqli_real_escape_string($conn, $_POST['SubjectLocalName']);
    $classStartTime = mysqli_real_escape_string($conn, $_POST['classStartTime']);
    $classEndTime = mysqli_real_escape_string($conn, $_POST['classEndTime']);

    $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
    $embedcode = mysqli_real_escape_string($conn, $_POST['embedcode']);
    $Content = mysqli_real_escape_string($conn, $_POST['Content']);
   

    // $query="INSERT INTO `Lecture` (`CourseId`, `SubjectId`, `SubjectLocalName`, `LectureStartTime`, `LectureEndTime`, `Faculty`, `VideoEmbedCode`, `Synopsis`)
    //                        VALUES ('$moduleId', '$subject', '$SubjectLocalName', '$classStartTime', '$classEndTime', '$faculty', '$embedcode', '$Content')";

    $query ="UPDATE Lecture
    SET `CourseId`='$moduleId',
     `SubjectId`='$subject',
      `SubjectLocalName`='$SubjectLocalName',
       `LectureStartTime`='$classStartTime',
        `LectureEndTime`='$classEndTime',
         `Faculty`='$faculty',
          `VideoEmbedCode`='$embedcode',
           `Synopsis`='$Content' WHERE Lecture.LectureId = '$LectureId'";
                          $run = mysqli_query($conn,$query);

                          if($run){
                            
                            // echo("Error description: " . mysqli_error($conn));
                            
                            ?>
                          <script>
                          alert("Lecture Updated");
                          location.replace('createLecture.php');
                          
                          </script>
                          <?php

                          }else{
                            
                               echo("Error description: " . mysqli_error($conn));
                            
                            ?>
                          
                          <!-- <script>
                          alert("This Course Is Already Created");
                          location.replace('createLecture.php');
                          
                          </script> -->
                          
                          <?php

                          }
    

}



?>