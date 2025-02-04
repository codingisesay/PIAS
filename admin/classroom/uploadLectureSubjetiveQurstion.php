<?php 
include('../adminSession.php');
include('../../connection.php');
?>
<?php 
if(isset($_REQUEST['submit'])){

    $lectireId = mysqli_real_escape_string($conn, $_POST['lectireId']);
    $questionId = mysqli_real_escape_string($conn, $_POST['questionId']);
    $nature = mysqli_real_escape_string($conn, $_POST['nature']);
    $marks = mysqli_real_escape_string($conn, $_POST['marks']);
    $wordlimit = mysqli_real_escape_string($conn, $_POST['wordlimit']);
    $adminId = $_SESSION['AdminUserID'];

    $query = "INSERT INTO `LectureSubjectiveQuestion` (`SubjectiveQuestionId`, `LectureId`, `NatureSubjectiveQuestionId`, `Marks`, `WordLimit`, `insertBy`)
                      VALUES ('$questionId', '$lectireId', '$nature', '$marks', '$wordlimit', '$adminId')";
                          $run = mysqli_query($conn,$query);
                          if($run){?>
                          <script>
                              alert("Subjective Question Added In Lecture !!");
                              location.replace('AddLectureData.php');
                          </script>
                          
                          
                          <?php
                      
                          }else{
                      
                            echo("Error description: " . mysqli_error($conn));
                           
                      
                          }



}



?>