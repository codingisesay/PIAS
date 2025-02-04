<?php 

include('../adminSession.php');
include('../../connection.php');

if(isset($_REQUEST['submit'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$counsellingComment = mysqli_real_escape_string($conn,$_POST['counsellingComment']);
$counsellingDoneBy = mysqli_real_escape_string($conn,$_POST['counsellingDoneBy']);
$counsellingDateTime = mysqli_real_escape_string($conn,$_POST['counsellingDateTime']);

$query = "UPDATE counselling_student SET
counselling_status = '$status',
counselling_comment = '$counsellingComment',
counselling_done_by = '$counsellingDoneBy',
counsellingDateTime = '$counsellingDateTime' WHERE id='$id'";

$run = mysqli_query($conn,$query);
if($run){?>
<script>

alert("Record Updated");
location.replace('counsellinghome.php');

</script>

<?php

}else{?>
    <script>
    
    alert("Record Not Updated");
    location.replace('counsellinghome.php');
    
    </script>
    
    <?php

}


}



?>