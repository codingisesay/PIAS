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
$moduleId = $_REQUEST['course'];
$courseById = FetchDataFromCourseTableByID($moduleId);
$CourseType = FetchDataFromCourseTypeTable();
$CourseTypeSub = FetchDataFromCourseSubTypeTable();

$CourseTypeCount = count($CourseType);
$CourseTypeSubCount = count($CourseTypeSub);
// echo "<pre>";
// print_r($courseById);


?>
  <br>
<div class="container-fluid">
  <form action="UpdateCourse.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Edit Course</th>
    
  </tr>
  <tr style="display: none;">
    <td><input type='hidden' name="courseId" value="<?php echo $courseById[0]['CourseId']; ?>"></td>
  </tr>
  <tr>
    <td style="width:25%;">Course Type</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="courseType" required>
        <option value="<?php echo $courseById[0]['CourseTypeId']?>"><?php echo $courseById[0]['CourseTypeName']?></option>
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
        <option value='<?php echo $courseById[0]['CourseSubTypeId']?>'><?php echo $courseById[0]['CourseSubTypeName']?></option>
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
        <option value="<?php echo $courseById[0]['CourseMedium']?>"><?php echo $courseById[0]['CourseMedium']?></option>
        <option value="English">English</option>
        <option value="Hindi">Hindi</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td >Course Name</td>
    <td><div class="form-group">
  <input type="text" class="form-control" id="usr" placeholder="Write Course Name.." value="<?php echo $courseById[0]['CourseName']?>" name='courseName' required>
</div></td>
  </tr>
  <tr>
  <td >Fee</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="coourseFee" required>
        <option value='<?php echo $courseById[0]['Fee']; ?>'><?php 
        
        $feeStatus = $courseById[0]['Fee']; 
        
        echo $freeStatus = ($feeStatus == 0)?("Free"):("Paid");
        
        ?></option>
        <option value='1'>Paid</option>
        <option value='0'>Free</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td>Fee Amount</td>
    <td><div class="form-group">
  <input type="number" class="form-control" id="usr" placeholder="Write Course Amount.." value="<?php echo $courseById[0]['FeeAmount'];?>" name="courseFreeAmount" required>
</div></td>
  </tr>
  <tr>
  <td>BaseYear</td>
    <td><div class="form-group">
  <input type="number" class="form-control" id="usr" min="2022" max="2050" placeholder="Write Base Year.." value="<?php echo $courseById[0]['BaseYear'];?>" name="BaseYear" required>
</div></td>
  </tr>
  <tr>
  <td>Target Year</td>
    <td><div class="form-group">
    <input type="number" class="form-control" id="usr" min="2022" max="2050" placeholder="Write Target Year.." value="<?php echo $courseById[0]['TargetYear'];?>" name="TargetYear" required>
</div></td>
  </tr>
  <tr>
  <td>Live Channel</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="LiveChannel" required>
        <option value="<?php echo $courseById[0]['LiveChannel'];?>"><?php 
        
        $liveChanelStatus = $courseById[0]['LiveChannel'];

        echo $ChanelStatus = ($liveChanelStatus == 0)?("Disable"):("Enable");
        
        ?></option>
        <option value="1">Enable</option>
        <option value="0">Disable</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td>Live Chat</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="LiveChat" required>
      <option value="<?php echo $courseById[0]['LiveChat'];?>"><?php

      $liveChatStatus = $courseById[0]['LiveChat'];

        echo $ChatStatus = ($liveChatStatus == 0)?("Disable"):("Enable");
      
      ?></option>
        <option value="1">Enable</option>
        <option value="0">Disable</option>
      </select></div></</td>
  </tr>
  <tr>
  <td >Course Start Date</td>
    <td><div class="form-group">
  
  <input type="date" class="form-control" id="usr" name="CourseStartDate" value="<?php echo $courseById[0]['CourseStartDate'];?>" required>
</div></td>
  </tr>
  <tr>
  <td>Course End Date</td>
    <td><div class="form-group">
  
  <input type="date" class="form-control" id="usr" name="CourseEndDate" value="<?php echo $courseById[0]['CourseEndDate'];?>" required>
</div></td>
  </tr>
  <tr>
  <td>Course Status</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="CourseStatus" required>
      <option value="<?php echo $courseById[0]['CourseStatus'];?>"><?php 
       $CourseStatus = $courseById[0]['CourseStatus'];

       echo $StatusCourse = ($CourseStatus == 0)?("Inactive"):("Active");
       
       ?></option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select></div></</td>
  </tr>
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" name='submit' value="Update"></td>
   
  </tr>
</table>
      </form>
</div>

</body>
