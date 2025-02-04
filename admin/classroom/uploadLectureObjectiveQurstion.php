<?php 
include('../adminSession.php');
include('../../connection.php');
?>
<?php 
if(isset($_REQUEST['submit'])){

    $lectireId = mysqli_real_escape_string($conn, $_POST['lectireId']);
    $questionId = mysqli_real_escape_string($conn, $_POST['questionId']);

    $marks = mysqli_real_escape_string($conn, $_POST['marks']);
   
    $adminId = $_SESSION['AdminUserID'];

    $query = "INSERT INTO `LectureObjectiveQuestion` (`ObjectiveQuestionId`, `LectureId`, `Marks`,`insertedBy`)
                VALUES ('$questionId', '$lectireId', '$marks','$adminId')";
                          $run = mysqli_query($conn,$query);
                          if($run){?>
                          <script>
                              alert("Objective Question Added In Lecture !!");
                              location.replace('AddLectureData.php');
                          </script>
                          
                          
                          <?php
                      
                          }else{
                      
                            echo("Error description: " . mysqli_error($conn));
                           
                      
                          }



}



?>