<?php 
include('../adminSession.php');
include('../../connection.php');

?>

<?php 

if(isset($_REQUEST['submit'])){
    $Qid = mysqli_real_escape_string($conn, $_POST['Qid']);
    $questionText = mysqli_real_escape_string($conn, $_POST['Content']);
    $optionA = mysqli_real_escape_string($conn, $_POST['Content1']);
    $optionB = mysqli_real_escape_string($conn, $_POST['Content2']);
    $optionC = mysqli_real_escape_string($conn, $_POST['Content3']);
    $optionD = mysqli_real_escape_string($conn, $_POST['Content4']);
    $correctAns = mysqli_real_escape_string($conn, $_POST['correctAns']);
    $questionExp = mysqli_real_escape_string($conn, $_POST['Content5']);
    $adminId = $_SESSION['AdminUserID'];

    $query = "UPDATE ObjectiveQuestion
    SET `ObjQuestionText`='$questionText',
     `Option A`='$optionA',
     `Option B`='$optionB',
     `Option C`='$optionC',
     `Option D`='$optionD',
     `CorrectAnswer`='$correctAns',
     `explanation`='$questionExp',
     `insertedBy`='$adminId'
     WHERE ObjectiveQuestion.ObjectiveQuestionId  = '$Qid'";

$run = mysqli_query($conn,$query);

     if($run){?>
        <script>
            alert("Objective Question Updated !!");
            location.replace('objectiveQuestionHome.php');
        </script>
        
        
        <?php
    
        }else{
            echo("Error description: " . mysqli_error($conn));
      
            ?>
        <!-- <script>
            alert("Objective Question Not Updated !!");
            location.replace('objectiveQuestionHome.php');
        </script> -->
        
        
        <?php
    
        }

}


?>