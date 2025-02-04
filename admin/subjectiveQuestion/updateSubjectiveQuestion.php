<?php 
include('../adminSession.php');
include('../../connection.php');

?>

<?php 

if(isset($_REQUEST['submit'])){
    $Qid = mysqli_real_escape_string($conn, $_POST['Qid']);
    $questionText = mysqli_real_escape_string($conn, $_POST['Content']);
    $questionExp = mysqli_real_escape_string($conn, $_POST['Content1']);
    $adminId = $_SESSION['AdminUserID'];
    $query = "UPDATE SubjectiveQuestion
    SET `SubQuestionText`='$questionText',
     `explanation`='$questionExp',
     `insertedBy`='$adminId'
     WHERE SubjectiveQuestion.SubjectiveQuestionId  = '$Qid'";

$run = mysqli_query($conn,$query);

     if($run){?>
        <script>
            alert("Subjective Question Updated !!");
            location.replace('subjectiveQuestionHome.php');
        </script>
        
        
        <?php
    
        }else{
    
      
            ?>
        <script>
            alert("Subjective Question Not Updated !!");
            location.replace('subjectiveQuestionHome.php');
        </script>
        
        
        <?php
    
        }

}


?>