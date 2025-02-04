<?php error_reporting(0);?>
<head>
  <title>Patriotic IAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
<?php 
include('HomePageNavBar.php');
include('functions.php');
// include('functions.php');
$course_id = $_REQUEST['course_id'];
$courseDetail = courseDetail($course_id);
// echo "<pre>";
// print_r($courseDetail);
?>
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>COUNSELLING FORM</h3>
  <p class="w3-large">Please fill this form for Registration, We will get back to You as soon as possible!</p>
  <div class="container">
  <form action="insertStudentCounselling.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">COUNSELLING FORM</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
    <input class="w3-input w3-border" name="courseId" type="hidden" placeholder="Course" value="<?php echo $course_id; ?>">
      <input class="w3-input w3-border" name="first" type="text" placeholder="Course" value="<?php echo $courseDetail[0]['CourseName']?>" disabled>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="name" type="text" placeholder="Your Name" REQUIRED>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Email" REQUIRED>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="phone" type="number" placeholder="Phone" REQUIRED>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="message" type="text" placeholder="Message">
    </div>
</div>

<p class="w3-center">
<input type="submit" name="submit" value="Send" class="w3-button w3-section w3-blue w3-ripple">
</p>
</form>
</div>
</div>
<?php
include('HomePageFooter.php');


?>
</body>