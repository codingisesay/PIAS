<?php 

include('../adminSession.php');
include('../adminNavbar.php');
include('classroomAdminFunction.php');

?>
<head>
  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
$CourseType = FetchDataFromCourseTypeTable();
$CourseTypeSub = FetchDataFromCourseSubTypeTable();

$CourseTypeCount = count($CourseType);
$CourseTypeSubCount = count($CourseTypeSub);

// echo "<pre>";
// print_r($CourseType);

// echo "<pre>";
// print_r($CourseTypeSub);




?>
  <br>
<div class="container-fluid">
  <form action="insertCourse.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Create Course</th>
    
  </tr>
  <tr>
    <td style="width:25%;">Course Type</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="courseType" required>
        <option value="">Select Any One</option>
        <?php 
        for($courseTypeLoop = 0; $courseTypeLoop < $CourseTypeCount; $courseTypeLoop++){?>
        
        <option value='<?php echo $CourseType[$courseTypeLoop]['CourseId'];?>'><?php echo $CourseType[$courseTypeLoop]['CourseTypeName'];?></option>
        
        
        <?php

        }
        
        
        ?>
        
      </select></div></td>
  
    
  </tr>
  <tr>
  <td >Course Sub Type</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="courseSubType" required>
        <option value=''>Select Any One</option>
        <?php 
        for($courseSubTypeLoop = 0; $courseSubTypeLoop < $CourseTypeSubCount; $courseSubTypeLoop++){?>
        
        <option value="<?php echo $CourseTypeSub[$courseSubTypeLoop]['CourseSubTypeId'];?>"><?php echo $CourseTypeSub[$courseSubTypeLoop]['CourseSubTypeName'];?></option>
        
        
        <?php

        }
        
        
        ?>
      
      </select></div></</td>
  </tr>
  <tr>
  <td >Course Medium</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="medium" required>
        <option value="">Select Any One</option>
        <option value="English">English</option>
        <option value="Hindi">Hindi</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td >Course Name</td>
    <td><div class="form-group">
  <input type="text" class="form-control" id="usr" placeholder="Write Course Name.." name='courseName' required>
</div></td>
  </tr>
  <tr>
  <td >Fee</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="coourseFee" required>
        <option value=''>Select Any One</option>
        <option value='1'>Paid</option>
        <option value='0'>Free</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td>Fee Amount</td>
    <td><div class="form-group">
  <input type="number" class="form-control" id="usr" placeholder="Write Course Amount.." name="courseFreeAmount" required>
</div></td>
  </tr>
  <tr>
  <td>BaseYear</td>
    <td><div class="form-group">
  <input type="number" class="form-control" id="usr" min="2022" max="2050" placeholder="Write Base Year.."  name="BaseYear" required>
</div></td>
  </tr>
  <tr>
  <td>Target Year</td>
    <td><div class="form-group">
    <input type="number" class="form-control" id="usr" min="2022" max="2050" placeholder="Write Target Year.." name="TargetYear" required>
</div></td>
  </tr>
  <tr>
  <td>Live Channel</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="LiveChannel" required>
        <option value="">Select Any One</option>
        <option value="1">Enable</option>
        <option value="0">Disable</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td>Live Chat</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="LiveChat" required>
      <option value="">Select Any One</option>
        <option value="1">Enable</option>
        <option value="0">Disable</option>
      </select></div></</td>
  </tr>
  <tr>
  <td >Course Start Date</td>
    <td><div class="form-group">
  
  <input type="date" class="form-control" id="usr" name="CourseStartDate" required>
</div></td>
  </tr>
  <tr>
  <td>Course End Date</td>
    <td><div class="form-group">
  
  <input type="date" class="form-control" id="usr" name="CourseEndDate" required>
</div></td>
  </tr>
  <tr>
  <td>Course Status</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="CourseStatus" required>
      <option value="">Select Any One</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select></div></</td>
  </tr>
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" name='submit' value="Submit"></td>
   
  </tr>
</table>
      </form>
</div>

</body>
