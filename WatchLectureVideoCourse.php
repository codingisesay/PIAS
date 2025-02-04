<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WatchLecture</title>
	<link rel="stylesheet" href="css/watchLectureVideo.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php 
    include('functions.php');
    $courseId = $_REQUEST['Course'];
    $lectureId = $_REQUEST['lecture'];
   
    $LectursOfBatch =  fetchAttLecturesOfCours($courseId);
    $couse_detail = courseDetail($courseId);

    $lectureHanout = fatchLectureHandout($lectureId);
    $LectursOfBatchcount = count($LectursOfBatch);

    $lectureOfCourse = LectureOfClass($courseId,$lectureId);

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
                    <div>
                        <p>
                        <p><iframe width="750" height="500" src="<?php echo $lectureOfCourse[0]['VideoEmbedCode'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></p>
                            
                           
                            
                    </p>
                    
                    </div>
                    <div class="summary">
                        <h3><?php echo $lectureOfCourse[0]['SubjectLocalName'];?></h3>
                        <?php echo $lectureOfCourse[0]['Synopsis']; ?>
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
</body>
</html>