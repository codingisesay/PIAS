<?php 
include('../adminSession.php');
include('../../connection.php');

?>
<?php 
$qid = $_REQUEST['qid'];

$query = "DELETE FROM LectureSubjectiveQuestion WHERE LectureSubjectiveQuestionId ='$qid'";
$run = mysqli_query($conn,$query);

if($run){?>
<script>

alert('Question Deleted From Lecture!!');
location.replace('classroomLecture.php');
</script>


<?php

}else{?>
<script>

alert('Question Not Deleted From Lecture!!');
location.replace('classroomLecture.php');

</script>


<?php

}

?>