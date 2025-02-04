<?php 

include('../adminSession.php');
include('../adminNavbar.php');


?>
<head>
  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

 <!-- <link href="../library/SearchableDropdown/src/selectstyle.css" rel="stylesheet">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="../library/SearchableDropdown/src/selectstyle.js"></script> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
  <?php 
  $id = $_REQUEST['id'];
include('counsellingfunction.php');
$adminUser = adminusers();
$counsellingDataById = fetchcounsellingbyId($id);
// echo "<pre>";
// print_r($counsellingDataById);

  
  ?>
  <br>
<div class="container-fluid">
  <form action="updatecounselling.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Edit Counselling</th>
    
  </tr>
  <tr style="display: none;">
    <td><input type="hidden" name="id" value="<?php echo $counsellingDataById[0]['id']; ?>"></td>
  </tr>
  <tr>
    <td style="width:25%;">Course Name</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="courseName" id="usr" placeholder="Write Subject Name And Number" value="<?php echo $counsellingDataById[0]['CourseName'];?>" disabled>
</div></td>
  
    
  </tr>
  <tr>
  <td >Received DateTime</td>
    <td><div class="form-group">
    <input type="datetime-local" name="receivedDateTime" class="form-control" id="usr" value="<?php echo $counsellingDataById[0]['InsertDateTime'];?>" disabled>
</div></td>
  </tr>
  <tr>
  <td >Name</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="Name" id="usr" placeholder="Write Subject Name And Number" value="<?php echo $counsellingDataById[0]['enq_per_name'];?>" disabled></div></</td>
  </tr>
  <tr>
  <td >Email</td>
    <td><div class="form-group">
    <input type="text" name="Email" class="form-control" id="usr" value="<?php echo $counsellingDataById[0]['enq_per_email'];?>" disabled></div></</td>
  </tr>
  <tr>
  <td >Phone</td>
    <td><div class="form-group">
    <input type="text" name="phone" class="form-control" id="usr" value="<?php echo $counsellingDataById[0]['enq_per_phone'];?>" disabled>
</div></td>
  </tr>
  <tr>
  <td >Enq MSG</td>
    <td><div class="form-group">

    <textarea class="form-control" rows="5" name="enqMsg" disabled><?php echo $counsellingDataById[0]['enq_per_msg'];?></textarea>
  </div></</td>
  </tr>
  <tr>
  <td>Status</td>
    <td><div class="form-group">
    <select class="form-control" id="CourseModule" name="status" required>
        <option value="<?php echo $counsellingDataById[0]['counselling_status'];?>"><?php echo $var1 = ($counsellingDataById[0]['counselling_status'] == 0)?('Not Done'):('Done');?></option>
       
        
        <option value="1">Done</option>
        <option value="0">Not Done</option>
        
     
       
      </select>
</div></td>
  </tr>

  <tr>
  <td>Counselling Comment</td>
    <td><div class="form-group">
 <textarea class="form-control" rows="5" placeholder="Write Conversation Short Summary" name="counsellingComment" ><?php echo $counsellingDataById[0]['counselling_comment'];?></textarea>
</div></td>
  </tr>



  
  <tr>
  <td>Counselling by</td>
    <td><div class="form-group">
    <select class="form-control" id="CourseModule" name="counsellingDoneBy" required>
        <option value="<?php echo $counsellingDataById[0]['counselling_done_by'];?>"><?php echo $counsellingDataById[0]['counselling_done_by'];?></option>
       <?php 
       foreach($adminUser as $ad){?>
       <option value="<?php echo $ad['AdminUserID'];?>"><?php echo $ad['Name'];?></option>
       
       <?php

       }
       
       ?>
        
        
        
     
       
      </select>

</div></td>
  </tr>

  <td>Counselling DateTime</td>
    <td><div class="form-group">
    <input type="datetime-local" name="counsellingDateTime" class="form-control" id="usr" value="<?php echo $counsellingDataById[0]['counsellingDateTime'];?>" required>
</div></td>
  </tr>
  
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" value="Update" name="submit"></td>
   
  </tr>
</table>
  </form>
</div>

</body>
<script>
$(document).ready(function(){
   
  $("#save").click(function(){
    var Content = CKEDITOR.instances['Content'].getData();
    alert(Content);
  });
  CKEDITOR.replace('Content');

  // $("#save").click(function(){
  //   var Content1 = CKEDITOR.instances['Content1'].getData();
  //   alert(Content);
  // });
  // CKEDITOR.replace('Content1');

//   $('#CourseModule').selectstyle();

//   $('#CourseModule').selectstyle({
//   width  : 250,
//   height : 300,
// });

// $('#CourseModule').selectstyle({
//   onchange : function(val){}
// });
});
</script>