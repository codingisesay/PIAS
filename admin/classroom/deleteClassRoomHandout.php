<?php 
include('../adminSession.php');
include('../../connection.php');

?>
<?php 
$handoutID = $_REQUEST['handoutId'];
$queryForHandout = "SELECT * FROM LectureHandout WHERE HandoutId = '$handoutID'";
$runForHandout = mysqli_query($conn,$queryForHandout);
$data = mysqli_fetch_assoc($runForHandout);
// echo "<pre>";
// print_r($data);
$handoutPath = '../../'.$data['HandoutLink'];
$query = "DELETE FROM LectureHandout WHERE HandoutId ='$handoutID'";
$run = mysqli_query($conn,$query);
// unlink($handoutPath);
if($run){

    unlink($handoutPath);

}
mysqli_close($conn);
if($run){?>

<script>
alert("Handout Deleted!!");
location.replace('classroomLecture.php');


</script>

<?php

}else{?>

    <script>
    alert("Handout Not Deleted!!");
    location.replace('classroomLecture.php');
    
    
    </script>
    
    <?php

}

?>