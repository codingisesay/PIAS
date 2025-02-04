<?php 
include('../adminSession.php');
include('../../connection.php');

?>
<?php 
include('classroomAdminFunction.php');

if(isset($_FILES['handoutfile'])){

   $lectureId = $_REQUEST['lectureId'];
 


    $fileName = $lectureId.$_FILES['handoutfile']['name'];
    $fileSize = $_FILES['handoutfile']['size'];
    $fileTmp = $_FILES['handoutfile']['tmp_name'];
    $fileType = $_FILES['handoutfile']['type'];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    // echo "<pre>";
    // print_r($fileType);

    // $query = "INSERT INTO `LectureHandout` (`handoutName`, `handoutPath`, `checklist_id`)
    //            VALUES ('$fileName', 'classroomHandouts/$fileName', '$checklistId')";
if($fileType == 'pdf'){

    $query= "INSERT INTO `LectureHandout` (`LectureId`, `HandoutName`, `HandoutLink`) 
VALUES ('$lectureId', '$fileName', 'classroomHandouts/$fileName')";
     $runforentry = mysqli_query($conn,$query);

     if($runforentry){

        $run = move_uploaded_file($fileTmp,"../../classroomHandouts/".$fileName);

    if($run){?>
    
    <script>
        alert("Handout Uploaded");
        location.replace("classroomLecture.php");
    </script>
    
    <?php
         
    }else{
        ?>
    
        <script>
            alert("Handout Not Uploaded");
            location.replace("classroomLecture.php");
        </script>
        
        <?php

    }

     }else{

        echo "Error: " . $runforentry . "<br>" . mysqli_error($conn);

     }

}else{?>

<script>

    alert("File Type Not Supported");
</script>

<?php

}


    

}





?>