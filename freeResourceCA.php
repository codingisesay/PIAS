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
<?php 
$cid = $_REQUEST['cid'];

$freeResourceModules = fetchFreeResourceCurrentAffairsModules($cid);
$freeResourceModulesCount = count($freeResourceModules);


?>
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>CURRENT AFFAIRS</h3>
  <p class="w3-large">Browse Our Free Current Affairs Programs.</p>
  <div class="container">
  <!-- <div id="myBtnContainer">
  <button class="btn btn-success active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn btn-success" onclick="filterSelection('Hindi')"> Hindi</button>
  <button class="btn btn-success" onclick="filterSelection('English')"> English</button>

</div> -->
  <div class="w3-row-padding" style="margin-top:64px">

  <?php 
  if($freeResourceModulesCount >= 1){
    for($freeResource = 0; $freeResource < $freeResourceModulesCount; $freeResource++){?>
  
      <div class="w3-third w3-section">
          <a href="freeResourceModule.php?mod=<?php echo $freeResourceModules[$freeResource]['CourseId']; ?>"><ul class="w3-ul w3-white w3-hover-shadow">
            <li class="w3-black w3-large w3-padding-32"><?php echo $freeResourceModules[$freeResource]['CourseName']
            
            ?></li>
            <!-- <li class="w3-padding-16"><b>10GB</b> Storage</li>
            <li class="w3-padding-16"><b>10</b> Emails</li>
            <li class="w3-padding-16"><b>10</b> Domains</li>
            <li class="w3-padding-16"><b>Endless</b> Support</li> -->
          
            <!-- <li class="w3-light-grey w3-padding-24">
              <a href="freeResourceCA.php"><button class="w3-button w3-black w3-padding-large">VIEW</button></a>
            </li> -->
          </ul></a>
        </div>
      
      
      <?php
    
      }
    }else{
      echo "No Record Found!";
    }
      
      ?>

  


  </div>
</div>
</div>
<?php
include('HomePageFooter.php');


?>
<script>
// filterSelection("all")
// function filterSelection(c) {
//   var x, i;
//   x = document.getElementsByClassName("filterDiv");
//   if (c == "all") c = "";
//   for (i = 0; i < x.length; i++) {
//     w3RemoveClass(x[i], "show");
//     if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
//   }
// }

// function w3AddClass(element, name) {
//   var i, arr1, arr2;
//   arr1 = element.className.split(" ");
//   arr2 = name.split(" ");
//   for (i = 0; i < arr2.length; i++) {
//     if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
//   }
// }

// function w3RemoveClass(element, name) {
//   var i, arr1, arr2;
//   arr1 = element.className.split(" ");
//   arr2 = name.split(" ");
//   for (i = 0; i < arr2.length; i++) {
//     while (arr1.indexOf(arr2[i]) > -1) {
//       arr1.splice(arr1.indexOf(arr2[i]), 1);     
//     }
//   }
//   element.className = arr1.join(" ");
// }

// // Add active class to the current button (highlight it)
// var btnContainer = document.getElementById("myBtnContainer");
// var btns = btnContainer.getElementsByClassName("btn");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function(){
//     var current = document.getElementsByClassName("active");
//     current[0].className = current[0].className.replace(" active", "");
//     this.className += " active";
//   });
// }
</script>
</body>

