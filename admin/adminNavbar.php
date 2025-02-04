<?php 
// include('../connection.php');

?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container-fluid" style="margin-top:5px;">
<?php
$link = (empty($_SERVER['HTTPS']) ? 'http' : 'https')."://$_SERVER[HTTP_HOST]";
?>
  <a href="<?php echo $link.'/admin/adminHome.php'?>"><button type="button" class="btn btn-primary">Home</button></a>
  <a href="<?php echo $link.'/admin/counselling/counsellinghome.php' ?>"> <button type="button" class="btn btn-primary">Counselling</button></a>
  
  <a href="<?php echo $link.'/admin/registration/registrationhome.php' ?>"> <button type="button" class="btn btn-primary">Registration</button></a>
  <a href="<?php echo $link.'/admin/classroom/classroomPackage.php'?>"><button type="button" class="btn btn-primary">Classroom Package</button></a>
  <a href="<?php echo $link.'/admin/classroom/classroomLecture.php' ?>"><button type="button" class="btn btn-primary">Classroom Lecture</button></a>
  <a href="<?php echo $link.'/admin/subjectiveQuestion/subjectiveQuestionHome.php' ?>"><button type="button" class="btn btn-primary">Add Subjective Question</button></a>
  <a href="<?php echo $link.'/admin/objectiveQuestion/objectiveQuestionHome.php' ?>"><button type="button" class="btn btn-primary">Add Objective Question</button></a>
  <a href="<?php echo $link.'/admin/liveAndlatest/latestSessionupdate.php' ?>"><button type="button" class="btn btn-primary">Latest Session Video</button></a>
  <a href="<?php echo $link.'/admin/course_bundling/course_bundling_home.php' ?>"><button type="button" class="btn btn-primary">Course Bundling</button></a>
 <a href="<?php echo $link.'/admin/adminLogout.php' ?>"> <button type="button" class="btn btn-primary">LogOut</button></a>

</div>