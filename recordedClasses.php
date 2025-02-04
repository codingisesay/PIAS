<!DOCTYPE html>
<html lang="en">
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 0px;
  bottom: 0;
  padding-top: 100px;
  height: inherit;
}
ul{
 padding-top: 15px;
float: right;
margin: 0px;
}
li{

  list-style-type: none;
  align:right;
   display: inline;
}

/*.w3-theme{
  background-color: red;
}*/

</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top" style="z-index: 1111; background-color: red;">
  <div class="w3-bar w3-top w3-left-align w3-large" style="background-color: #063261; color: white;">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>

    <a href="index.php" class="w3-bar-item w3-button" style="font-size: 40px; background-color: white;"><b><span style="color:#063261;">Patriotic</span><span style="color:red;">IAS</span></b></a>
    <ul>
   <li> <a href="#" class="w3-bar-item w3-button  w3-hover-white">Video</a></li>
    <li><a href="#" class="w3-bar-item w3-button  w3-hover-white">Assignment</a></li>
    <li><a href="#" class="w3-bar-item w3-button  w3-hover-white" >Prelims</a></li>
    <li><a href="#" class="w3-bar-item w3-button  w3-hover-white">Mains</a></li>
    <li><a href="#" class="w3-bar-item w3-button  w3-hover-white">Ask Your Doubt</a></li>
    <li><a href="#" class="w3-bar-item w3-button  w3-hover-white">Feedback</a></li>
  </ul>
  </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item" style="color: red;"><b>Classes</b></h4>
  
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="#">Modern Indian History 01</a>
  
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-top-64" style="margin-top:40px;">
    <div class="w3-twothird w3-container">
      
      <iframe class="embed-responsive-item youtube-video" src="https://www.youtube.com/embed/6pIbq3D1rbE?si=Krl5UrL5ni3wvkBS" frameborder="5px" width="100%" height="500" scrolling="no" style="overflow: hidden" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
    <div class="w3-third w3-container">
      <h3 class="w3-text-red">Class Notes</h3>
      <p class="w3-border">
     <a href="#" class="w3-bar-item w3-button  w3-hover-white">Human Rights</a><br>
<a href="#" class="w3-bar-item w3-button  w3-hover-white">Fundamental Rights</a><br>
<a href="#" class="w3-bar-item w3-button  w3-hover-white">Human Rights</a><br>
<a href="#" class="w3-bar-item w3-button  w3-hover-white">Fundamental Rights</a><br>
   </p>
    </div>
  </div>

  <div class="w3-row">
    <div class="w3-twothird w3-container">
      <h2 class="w3-text-teal">Class Summary</h2>
      <h3 class="w3-text-red">Polity Class 01</h3>
      <p style="text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum
        dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum
        dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum
        dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>



  

<!-- END MAIN -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
