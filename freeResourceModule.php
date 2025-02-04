<?php 
error_reporting(0);


?>
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
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>CURRENT AFFAIRS</h3>
  <p class="w3-large">Browse Our Free Current Affairs Programs.</p>
  <div class="container">
  <div class="w3-row-padding" style="margin-top:64px">
<?php 
$mod = $_REQUEST['mod'];

$LectursOfBatch = fetchAttLecturesOfCoursWithHandout($mod);
$coursedetail = courseDetail($mod);

// echo "<pre>";
// print_r($coursedetail);

    if(($coursedetail[0]['CourseTypeId'] == 6 || $coursedetail[0]['CourseTypeId'] == 7) & $coursedetail[0]['Fee'] == 0 & $coursedetail[0]['CourseStatus'] = 1){
     
        foreach($LectursOfBatch as $lb){?>
        
  <div class="w3-third w3-section">
      <a href="classroomHandouts/<?php echo $lb['HandoutName'];?>" target="_blank"><ul class="w3-ul w3-black w3-hover-shadow">
        <li class="w3-white w3-large w3-padding-32"><?php echo $lb['SubjectLocalName'];?><i class="fa fa-cloud-download" style="font-size:24px"></i></li>
        <!-- <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>  -->
      
        <!-- <li class="w3-light-grey w3-padding-24">
          <a href="freeResourceCA.php"><button class="w3-button w3-black w3-padding-large">VIEW</button></a>
        </li>  -->
      </ul></a>
    </div>


        
        <?php

        }
        
        
        ?>

    </div>
</div>
</div>
      
    
    <?php

    }else{?>
    
    <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
<h3>This is Not a Valid Url</h3>
</div>
</div>
</div>
</div>
    
    <?php

    }
    
    ?>




<?php
include('HomePageFooter.php');


?>
</body>