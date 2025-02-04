<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WatchLecture</title>
	<link rel="stylesheet" href="css/watchLectureVideo.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php 
    include('functions.php');
    $courseId = $_REQUEST['course'];
    $lectureId = $_REQUEST['lecture'];
   
    $LectursOfBatch =  fetchAttLecturesOfCours($courseId);
    $couse_detail = courseDetail($courseId);

    $lectureHanout = fatchLectureHandout($lectureId);
    $LectursOfBatchcount = count($LectursOfBatch);

    $lectureOfCourse = LectureOfClass($courseId,$lectureId);

    $lectureSubjectiveQuestion = FetchSubjectiveQuestionForLecture($lectureId);

    // echo "<pre>";
    // print_r($lectureOfCourse);

    if($couse_detail[0]['Fee'] == 0 & $couse_detail[0]['CourseTypeId'] == 2 & $couse_detail[0]['CourseStatus'] = 1){?>
   
    
<div class="wrapper">
    <div class="sidebar">
        <a href="index.php"><h4>Patriotic IAS</h4></a>
        <ul>
            <?php 
            if($LectursOfBatchcount != 0){
                for($lecturesloop = 0; $lecturesloop < $LectursOfBatchcount; $lecturesloop++){?>
            
                    <li><a href="WatchLectureVideoCourse.php?lecture=<?php echo $LectursOfBatch[$lecturesloop]['LectureId'] ?>&Course=<?php echo $LectursOfBatch[$lecturesloop]['CourseId'];?>"><?php echo $LectursOfBatch[$lecturesloop]['SubjectLocalName']?></a></li>
                    
                    
                    
                    <?php
        
                    }

            }else{
                ?>
            
                    <li><a href="#">No Lecture Yet</a></li>
                    
                    
                    
                    <?php

            }

            
            
            ?>
            
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-block d-lg-none" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">VIDEO</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="PrelimeQuestionLectureCourse.php?lecture=<?php echo $lectureId; ?>&course=<?php echo $courseId; ?>">PRELIMS QUESTION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="MainsQuestionLectureCourse.php?lecture=<?php echo $lectureId; ?>&course=<?php echo $courseId; ?>">MAINS QUESTION</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">CLASS NOTES</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">FEEDBACK</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
        </div>  
        <div class="my-container">
            <div class="row info">
                <div class="col-sm-12 col-lg-8">
                    <div class="summary">
                        <?php 
                        $i=0;
                        foreach($lectureSubjectiveQuestion as $LSQ){
                            $i++;
                            ?>
                             <div class="w3-panel w3-pale-green w3-round-xlarge" style="padding:10px;">
                    <h4 style="color:red;"><b>Question <?php echo $i; ?>:</b></h4>
    <p> <?php echo $LSQ['SubQuestionText'];?></p>
    <h4 style="color:red;display:inline-block;"><b>Marks : <?php echo $LSQ['Marks'];?></b></h4>
     <h4 style="color:red; float:right;"><b>Word Limit : <?php echo $LSQ['WordLimit'];?></b></h4>
     <p><button class="w3-button w3-green w3-round" id="explbtn<?php echo $i; ?>">Answer and Explanations</button></p>
     <div class="w3-panel w3-green w3-round-xlarge" id="expl<?php echo $i; ?>" style="display: none;">
        
        <p><?php echo $LSQ['explanation']?></p>
    </div>
  </div>
                        
                        
                        
                        <?php

                        }
                        
                        
                        ?>
 
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                     <!-- <div class="right-bar">
                        <h4 class="imp-link">Important Links</h4>
                        <div class="imp-link-links">
                            <a>
                                UPCOMING CLASS SCHEDULE
                            </a>
                        </div>
                        <div class="imp-link-links">
                            <a>
                                YOUR CLASSROOM QUERIES
                            </a>
                        </div>
                        <div class="imp-link-links">
                            <a>
                                BLANK ASSIGNMENT SHEET
                            </a>
                        </div>
                    </div> -->
                    <div class="right-bar">
                        <h4 class="imp-link">Class Notes</h4>
                        
                            <?php 
                            foreach($lectureHanout as $lh){?>
                            <div class="imp-link-links">
                            <a href="<?php echo $lh['HandoutLink']; ?>" target="_blank">
                                <?php echo preg_replace('/[0-9]/','',$lh['HandoutName']); ?>
                            </a>
                            </div>
                            <?php

                            }
                            
                            ?>
                           
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    
    <?php

    }else{

        echo "Invalid URL!!";

    }
    
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var displaylenth = <?php echo $i; ?>;
        for(let display = 1; display <= displaylenth;display++){

            $("#explbtn"+display).click(function(){
            $("#expl"+display).toggle();
  });

        }
    })
</script>
</body>
</html>