<?php 

include('../adminSession.php');
include('../adminNavbar.php');
include('classroomAdminFunction.php');

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

$lectureId = $_REQUEST['lecture'];
  $courses = FetchDataFromCourseTable();
  $coursesCount = Count($courses);

  $subject = FetchDataFromSubject();
  $subjectCount = Count($subject);

  $faculty = FetchAdminUserData();
  $facultyCount = count($faculty);

  $lecturesById = fetchDataFromLectureTableById($lectureId);

//   $lecturesByIdcount = count($lecturesById);

  // echo "<pre>";
  // print_r($faculty);
  
  ?>
  <br>
<div class="container-fluid">
  <form action="updateLecture.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Edit Lecture</th>
    
  </tr>
  <tr style="display: none;">
    <td><input type="hidden" name="lectureId" value="<?php echo $lecturesById[0]['LectureId']; ?>"></td>
  </tr>
  <tr>
    <td style="width:25%;">Course Name</td>
    <td><div class="form-group">
      <select class="form-control" id="CourseModule" name="moduleId" required>
        <option value="<?php echo $lecturesById[0]['CourseId']; ?>"><?php echo $lecturesById[0]['CourseId']."-".$lecturesById[0]['CourseName'];?></option>
        <?php 
        for($module = 0; $module < $coursesCount; $module++){?>
        
        <option value="<?php echo $courses[$module]['CourseId']; ?>"><?php echo $courses[$module]['CourseId']."-".$courses[$module]['CourseName']; ?></option>
        
        <?php

        }
        
        
        ?>
       
      </select></div></td>
  
    
  </tr>
  <tr>
  <td >Subject</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="subject" required>
        <option value="<?php echo $lecturesById[0]['SubjectId']; ?>"><?php echo $lecturesById[0]['SubjectName']; ?></option>
        <?php 
        for($subjectloop = 0; $subjectloop < $subjectCount; $subjectloop++){?>
        
        <option value="<?php echo $subject[$subjectloop]['SubjectId']?>"><?php echo $subject[$subjectloop]['SubjectName']?></option>
        
        <?php 

          

        }
        
        ?>

      </select></div></</td>
  </tr>
  <tr>
  <td >Lecture Local Name</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="SubjectLocalName" id="usr" placeholder="Write Subject Name And Number" value="<?php echo $lecturesById[0]['SubjectLocalName']; ?>" required></div></</td>
  </tr>
  <tr>
  <td >Class Start Time</td>
    <td><div class="form-group">
    <input type="datetime-local" name="classStartTime" class="form-control" id="usr" value="<?php echo $lecturesById[0]['LectureStartTime']; ?>" required></div></</td>
  </tr>
  <tr>
  <td >Class End Time</td>
    <td><div class="form-group">
    <input type="datetime-local" name="classEndTime" class="form-control" id="usr" value="<?php echo $lecturesById[0]['LectureEndTime']; ?>" required>
</div></td>
  </tr>
  <tr>
  <td >Faculty</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="faculty" required>
        <option value="<?php echo $lecturesById[0]['Faculty']; ?>"><?php echo $lecturesById[0]['Faculty']; ?></option>
        <?php 
        for($facultyLoop = 0; $facultyLoop < $facultyCount;$facultyLoop++){?>
        
        <option value="<?php echo $faculty[$facultyLoop]['AdminUserID']; ?>"><?php echo $faculty[$facultyLoop]['Name']; ?></option>
        
        <?php

        }
        
        
        ?>
        
    
      </select></div></</td>
  </tr>
  <tr>
  <td>Video Embed Code</td>
    <td><div class="form-group">
 <textarea class="form-control" rows="5" placeholder="Video Embed Code.." name="embedcode" ><?php echo $lecturesById[0]['VideoEmbedCode']; ?></textarea>
</div></td>
  </tr>
  <tr>
  <td>Synopsis</td>
    <td><div class="form-group">
    <textarea name="Content" id="Content" placeholder="Required, at least 4 characters"><?php echo $lecturesById[0]['Synopsis']; ?></textarea><br>
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