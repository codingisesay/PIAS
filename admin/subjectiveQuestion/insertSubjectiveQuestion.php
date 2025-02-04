<?php 
include('../adminSession.php');
include('../../connection.php');
?>
<?php 

if(isset($_REQUEST['submit'])){
    $questionText = mysqli_real_escape_string($conn, $_POST['Content']);
    $questionExplation = mysqli_real_escape_string($conn, $_POST['Content1']);
    $adminId = $_SESSION['AdminUserID'];
    $query = "INSERT INTO `SubjectiveQuestion` (`SubQuestionText`, `explanation`,`insertedBy`) 
    VALUES ('$questionText', '$questionExplation', '$adminId')";
    $run = mysqli_query($conn,$query);
    if($run){?>
    <script>
        alert("Subjective Question Created !!");
        location.replace('subjectiveQuestionHome.php');
    </script>
    
    
    <?php

    }else{

  
        ?>
    <script>
        alert("Subjective Question Not Created !!");
        location.replace('subjectiveQuestionHome.php');
    </script>
    
    
    <?php

    }

}


?>

