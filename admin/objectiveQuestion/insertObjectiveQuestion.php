<?php 
include('../adminSession.php');
include('../../connection.php');
?>

<?php 
if(isset($_REQUEST['submit'])){
    $questionText = mysqli_real_escape_string($conn,$_POST['Content']);
    $optionA = mysqli_real_escape_string($conn,$_POST['Content1']);
    $optionB = mysqli_real_escape_string($conn,$_POST['Content2']);
    $optionC = mysqli_real_escape_string($conn,$_POST['Content3']);
    $optionD = mysqli_real_escape_string($conn,$_POST['Content4']);
    $correctAns = mysqli_real_escape_string($conn,$_POST['correctAns']);
    $exp = mysqli_real_escape_string($conn,$_POST['Content5']);
    $adminId = $_SESSION['AdminUserID'];

    $query = "INSERT INTO `ObjectiveQuestion` (`ObjQuestionText`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `CorrectAnswer`, `explanation`, `insertedBy`)
     VALUES ('$questionText', '$optionA', '$optionB', '$optionC', '$optionD', '$correctAns', '$exp', '$adminId')";
     $run = mysqli_query($conn,$query);

     if($run){?>
     <script>

        alert("Objective Question Created !!");
        location.replace('objectiveQuestionHome.php');


     </script>
     
     
     <?php

     }

}



?>