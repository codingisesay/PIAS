<?php 

include('../adminSession.php');
include('../adminNavbar.php');
include('../classroom/classroomAdminFunction.php');


?>
<head>
  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

 <!-- <link href="../library/SearchableDropdown/src/selectstyle.css" rel="stylesheet">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="../library/SearchableDropdown/src/selectstyle.js"></script> -->
<link rel="stylesheet" href="../library/chosen/chosen.min.css">
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
$course = FetchDataFromCourseTable();


?>
  <br>
<div class="container-fluid">
  <form action="insertStudentDetails.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Create Student Portal</th>
    
  </tr>
  <tr>
    <td style="width:25%;">Student Name</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="studentName" id="usr" placeholder="Write Student Name.." required></div></td></div></td>
  
    
  </tr>
  <tr>
  <td >Student Mail Id</td>
    <td><div class="form-group">
    <input type="email" class="form-control" name="studentMailId" id="usr" placeholder="Write Student Email.." required></div></td></div></</td>
  </tr>
  <tr>
  <td >Student Password</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="studentPassword" id="usr" placeholder="Write Student Password.." required></div></td>
  </tr>
  <tr>
  <td >Student Mobile No.</td>
    <td><div class="form-group">
    <input type="number" class="form-control" name="studentMobileNo" id="usr" placeholder="Write Mobile No.." required></div></td>
  </tr>
  <tr>
  <td >Portal Status</td>
    <td><div class="form-group">
    <select class="form-control" id="sel1" name="portalStatus" required>
        <option value="">Select Any One</option>
        <option value="0">Pending</option>
        <option value="1">Active</option>
        <option value="2">Deactive</option>

        
    
      </select>
</div></td>
  </tr>
  <tr>
  <td >Module Assign</td>
    <td><div class="form-group">
      <select class="form-control" id="select_batch" name="studentModules[]" multiple required>
       <?php 
       foreach($course as $co){?>
       
       <option value="<?php echo $co['CourseId']?>"><?php echo $co['CourseId']."-".$co['CourseName']?></option>
       
       
       <?php


       }

       
       
       ?>

        
    
      </select></div></</td>
  </tr>

  <td>Course Mode</td>
    <td><div class="form-group">
      <select class="form-control"  name="mode"  required>
        <option value="">Select Any One</option>
        <option value="0">Online</option>
        <option value="1">Offline</option>

        
    
      </select></div></</td>
  </tr>
  
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" value="Submit" name="submit"></td>
   
  </tr>
</table>
  </form>
</div>

</body>
<script src="../library/chosen/chosen.jquery.min.js"></script>
<script>
$(document).ready(function(){
   
  $("#save").click(function(){
    var Content = CKEDITOR.instances['Content'].getData();
    alert(Content);
  });
  CKEDITOR.replace('Content');

  $('#select_batch').chosen();

});
</script>