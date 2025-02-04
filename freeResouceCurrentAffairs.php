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
?>
<?php 
$medium = $_REQUEST['medium'];
if($medium == 'eng'){

  $courseType = 6;

}elseif($medium == 'hin'){

  $courseType = 7;

}elseif($medium == 'PYPeng'){

  $courseType = 9;

}elseif($medium == 'PYPhin'){

  $courseType = 10;

}elseif($medium == 'PCSeng'){

  $courseType = 11;

}elseif($medium == 'PCShin'){

  $courseType = 12;

}
$subCoursesByCourse = fetchSubCoursByCourseId($courseType);
echo $subCoursesByCourseCount = count($subCoursesByCourse);



?>
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>CURRENT AFFAIRS</h3>
  <p class="w3-large">Browse Our Free Current Affairs Programs.</p>
  <div class="container">
  <div class="w3-row-padding" style="margin-top:64px">

  <?php 
  for($Subtitle = 0; $Subtitle < $subCoursesByCourseCount; $Subtitle++){?>
  
  <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-large w3-padding-32"><?php $string=  strtoupper($subCoursesByCourse[$Subtitle]['CourseSubTypeName']); 
        echo $last4Char = substr($string, 0, -4);
        
        ?></li>
        <!-- <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li> -->
      
        <li class="w3-light-grey w3-padding-24">
          <a href="freeResourceCA.php?cid=<?php echo $subCoursesByCourse[$Subtitle]['CourseSubTypeId'];?>"><button class="w3-button w3-black w3-padding-large">VIEW</button></a>
        </li>
      </ul>
    </div>
  
  
  <?php

  }
  
  
  ?>

  </div>
</div>
</div>
<?php
include('HomePageFooter.php');


?>
</body>