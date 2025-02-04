<?php 
include('functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patriotic IAS</title>
  <link rel="icon" type="image/x-icon" href="photos/final_logo.jpeg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->

</head>
<style>
.freediv{
  margin-bottom: 50px;
}

</style>

<body>
  <?php
$liveandlatestlink = fetchliveandlatestlink();
// echo "<pre>";
// print_r($liveandlatestlink);

?>
<nav class="navbar navbar-inverse navbar-fixed-top act">
<div class="container-fluid" style="margin:0px; background-color:white; padding:25px;">
<div class="col-sm-3">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color:black; font-size:25px;"><img src="photos/final_logo.jpeg" style="position:relative; bottom:60px; width:200px; height:100px; margin-top: 30px; "></a>

   
    <button class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <i class="fa fa-bars" style="font-size:24px;color:black;"></i>
      </button>
    </div>
  </div>
    <div class="col-sm-9">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">
      <li><a href="course Prospectus/Prospectus Patriotic IAS.pdf" target="_blank" style="color:black; font-weight: bold;"><button type="button" class="btn btn-success" style="position:relative; bottom:7px;">Download Prospectus</button></a></li>
                <li><a href="#classroom" style="color:black; font-weight: bold;">CLASSROOM</a></li>
        <li><a href="#demo" style="color:black; font-weight: bold;">FREE COURSES</a></li>
        <li><a href="#contact" style="color:black; font-weight: bold;">ABOUT US</a></li>

        <li><a href="#resource" style="color:black; font-weight: bold;">RESOURCE</a></li>
        <li><a href="login.php" style="color:black; font-weight: bold;"><span ></span> LOGIN</a></li>
        <li><a href="#classroom" style="color:black; font-weight: bold;"> TOPPERS TALK</a></li>

      </ul>
    </div>
</div>
  </div>
</nav> 

<div id="myCarousel" class="carousel slide positionofbannerimg" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>  
       <!-- <li data-target="#myCarousel" data-slide-to="4"></li> -->
     
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
       <div class="item active">
        <img src="photos/course_2025.jpeg" alt="newcourseorg" style="width:100%; height:500px;">
      </div>
      <div class="item">
        <img src="photos/newcourse1.jpeg" alt="newcourse1" style="width:100%; height:500px;">
      </div>
      <div class="item">
        <img src="photos/newbanner3.jpeg" alt="New york" style="width:100%; height:500px;">
      </div>
      <div class="item">
        <img src="photos/newbanner4.jpeg" alt="New york" style="width:100%; height:500px;">
      </div>
      <!-- <div class="item">
        <img src="photos/newbanner5.jpeg" alt="New york" style="width:100%; height:500px;">
      </div> -->
   
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!-- <div class="container-fluid"> -->
  <!-- <h5 class="mentoringMSg"><span style="color:#063261;">For Any Mentorship, Please Call On </span>06394877241</h5> -->
<!-- </div> -->
  <div class="container" style="padding-bottom:50px;">
    
     <div class="row">
    <div class="col-sm-6">
      <h3 class="header_div_title">LIVE & LATEST SESSION</h3>
      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="<?php echo $liveandlatestlink[0]['VideoEmbedCodeEnglish']; ?>"></iframe>
      
    </div>
    </div>

    <div class="col-sm-6">
      <h3 class="header_div_title">लाइव और नवीनतम सत्र</h3>
      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="<?php echo $liveandlatestlink[0]['VideoEmbedCodeHindi']; ?>"></iframe>
      
    </div>
    </div>
</div>
</div>
<?php 
$courses = FetchDataFromCourseTypeTable();
$coursesCount = count($courses);
// echo "<pre>";
// print_r($courses);


?>

<div class="w3-container w3-center w3-dark-grey" style="padding:100px 16px;" id="classroom">
  <h3>Classroom</h3>
  <p class="w3-large">Browse Our Paid Courses</p>
  <div class="w3-row-padding" style="margin-top:64px;">
  <?php 
   for($classroomloop = 0; $classroomloop < $coursesCount; $classroomloop++){
    if($courses[$classroomloop]['Fee'] == 1){?>
      
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black  w3-padding-32"><b><?php echo $courses[$classroomloop]['CourseName']?></b></li>
        <li class="w3-padding-16"><b>Course Type: </b><?php echo $courses[$classroomloop]['CourseTypeName']?></li>
        <li class="w3-padding-16"><b>Course Sub Type: </b><?php echo $courses[$classroomloop]['CourseSubTypeName']?></li>
        <li class="w3-padding-16"><b>Course Medium: </b><?php echo $courses[$classroomloop]['CourseMedium']?></li>
        <li class="w3-padding-16"><b>Course Fee: </b>Rs. <?php echo $courses[$classroomloop]['FeeAmount']?> +GST/-</li>

        <li class="w3-light-grey w3-padding-24">
        <a href="register.php?course_id=<?php echo $courses[$classroomloop]['CourseId']; ?>"><button class="w3-button w3-black w3-padding-large">Counselling</button></a>
        <a href="course Prospectus/Prospectus Patriotic IAS.pdf" target="_blank"><button class="w3-button w3-black w3-padding-large">Details</button></a>
        </li>
      </ul>
    </div>
  
  
  <?php
  }
}
  
  
  
  ?>
 

 </div>
</div>


<div class="w3-container w3-center" style="padding:100px 16px;" id="demo">
  <h3>Free Courses</h3>
  <p class="w3-large">Browse Our Free Courses</p>
  <div class="w3-row-padding" style="margin-top:64px;">
  <?php 
   for($classroomloop = 0; $classroomloop < $coursesCount; $classroomloop++){
    if($courses[$classroomloop]['Fee'] == 0){?>
      
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
      <li class="w3-black w3-padding-32"><b><?php echo $courses[$classroomloop]['CourseName']?></b></li>
        <li class="w3-padding-16"><b>Course Type: </b><?php echo $courses[$classroomloop]['CourseTypeName']?></li>
        <li class="w3-padding-16"><b>Course Sub Type: </b><?php echo $courses[$classroomloop]['CourseSubTypeName']?></li>
        <li class="w3-padding-16"><b>Course Medium: </b><?php echo $courses[$classroomloop]['CourseMedium']?></li>
        <li class="w3-padding-16"><b>Course Fee: </b>Rs. <?php echo $courses[$classroomloop]['FeeAmount']?> /-</li>

        <li class="w3-light-grey w3-padding-24">
          <a href="watchLectureVideo.php?course=<?php echo $courses[$classroomloop]['CourseId']; ?>"><button class="w3-button w3-black w3-padding-large">View</button></a>
          <!-- <button class="w3-button w3-black w3-padding-large">Details</button> -->
        </li>
      </ul>
    </div>
  
  
  <?php
  }
}
  
  
  
  ?>
 

 </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:100px 16px" id="contact">
  <h3 class="w3-center">About Us</h3>
  <p class="w3-center w3-large">Know Us and Contact Us !</p>
<div class="container-fluid">
  <div class="row">

  <div class="col-sm-6">
    <!-- <img src="/w3images/map.jpg" class="w3-image w3-greyscale" style="width:100%;margin-top:48px"> -->
    <div class="w3-container w3-padding-30 w3-center" id="team">
<div class="w3-row"><br>
    <!-- <div class="w3-quarter"> -->
  <img src="photos/final_logo.jpeg" alt="Boss" style="width:40%" class="w3-circle w3-hover-opacity">
  <h3 style="color:red;">Our Vision</h3>
  <p class="w3-large " style="color:DarkBlue; font-family: Courier New, monospace; text-align:justify;"><i>PatrioticIAS is founded on the principle of providing quality education at an affordable cost, ensuring that candidates from all sections of society have access to top-notch preparation resources. We aim to bridge the gap between aspirants from different socioeconomic backgrounds by offering a holistic curriculum that covers every aspect of the UPSC/State PSC exams.
</i></p>
<!-- </div> -->
</div>
  </div>
</div>
    <div class="col-sm-6">
    <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Third Floor KV Tower, Padleyganj Road, Gorakhpur</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +91 9971932488</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: info@patrioticias.in</p><br>
    <p><div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Third Floor KV Tower, Padleyganj Road, Gorakhpur&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://sprunkiplay.com/">Sprunki Game</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div></p>
  </div>
    </div>

</div>
</div>
</div>
  
    <!-- Image of location/map -->
    
  </div>
</div>

<div class="w3-container" style="padding:100px 16px" id="resource">
  <h3 class="w3-center">RESOURCE (Hindi And English)</h3>
  <p class="w3-center w3-large">Browse Our Free Resources</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter freediv">
    <a href="freeResouceCurrentAffairs.php?medium=eng"> <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Current Affairs (English)</p></a>

    </div>
    <div class="w3-quarter freediv">
    <a href="freeResouceCurrentAffairs.php?medium=hin"> <i class="fa fa-desktop w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Current Affairs (Hindi)</p></a>

    </div>
    <div class="w3-quarter freediv">
    <a href="freeResouceCurrentAffairs.php?medium=PYPeng"><i class="fa fa-desktop w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">UPSC Previous Year Paper (English)</p></a>

    </div>
    <div class="w3-quarter freediv">
    <a href="freeResouceCurrentAffairs.php?medium=PYPhin"> <i class="fa fa-desktop w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">UPSC Previous Year Paper (Hindi)</p></a>

    </div>
    
    <div class="w3-quarter freediv">
    <a href="freeResouceCurrentAffairs.php?medium=PCSeng"> <i class="fa fa-desktop w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">PCS (English)</p></a>

    </div>
    <div class="w3-quarter freediv">
    <a href="freeResouceCurrentAffairs.php?medium=PCShin"><i class="fa fa-desktop w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">PCS (Hindi)</p></a>

    </div>
  </div>
</div>


<?php include('HomePageFooter.php');?>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>


