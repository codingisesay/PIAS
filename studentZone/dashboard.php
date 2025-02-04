<?php 
include('dash_board_page_layout.php');

?>

<style>
  a{
    text-decoration: none;
  }
  a:hover{
    text-decoration: underline;
  }
</style>

<!-- Page content-->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<?php 
echo $page_content = '<header class="w3-container" style="padding-top:22px">
<h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
</header>
<div class="w3-row-padding w3-margin-bottom">

<div class="w3-quarter">
  <div class="w3-container w3-black w3-padding-16">
    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
    <div class="w3-right">
      <h3></h3>
    </div>
    <div class="w3-clear"></div>
    <h4><a href="classroom_course.php" class="btn btn-primary">Classroom</a></h4>
  </div>
</div>

<div class="w3-quarter">
  <div class="w3-container w3-black w3-padding-16">
    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
    <div class="w3-right">
      <h3></h3>
    </div>
    <div class="w3-clear"></div>
    <h4><a href="prelimsTest_course.php" class="btn btn-primary">Prelims</a></h4>
  </div>
</div>
<div class="w3-quarter">
  <div class="w3-container w3-black w3-padding-16">
    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
    <div class="w3-right">
      <h3></h3>
    </div>
    <div class="w3-clear"></div>
    <h4><a href="mainTest_course.php" class="btn btn-primary">Mains</a></h4>
  </div>
</div>
<div class="w3-quarter">
  <div class="w3-container w3-black w3-padding-16">
    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
    <div class="w3-right">
      <h3></h3>
    </div>
    <div class="w3-clear"></div>
    <h4><a href="studyMaterial_course.php" class="btn btn-primary">Study Materials</a></h4>
  </div>
</div>


</div>

<div class="w3-row-padding w3-margin-bottom">

<div class="w3-quarter">
  <div class="w3-container w3-black w3-padding-16">
    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
    <div class="w3-right">
      <h3></h3>
    </div>
    <div class="w3-clear"></div>
    <h4>Live Streaming</h4>
  </div>
</div>';



?>
</div>