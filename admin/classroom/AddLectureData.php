<?php 
error_reporting(0);
include('../adminSession.php');
include('../adminNavbar.php');
include('classroomAdminFunction.php');

?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- 
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>  -->

  
<style>
  .select2-container .select2-selection--single{
    height:40px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
         border-radius: 0px !important; 
}

</style>
</head>
<body>
<?php 
$lectureId = $_REQUEST['lecture'];
$handout = FetchLectureHandout($lectureId);
// $handoutcount = count($handout);
$subjectiveQuestion = FetchAllSubjectiveQuestion();
$ObjectiveQuestion = FetchAllObjectiveQuestion();

$naturesubjectiveQuestion = FetchNatureOfSubjective();
$lectureSubjectiveQuestion = FetchSubjectiveQuestionForLecture($lectureId);
$lectureObjectiveQuestion = FetchObjectiveQuestionForLecture($lectureId);

?>
<div class="container-fluid">
    <br>
    <br>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Handout Section</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        <div class="container-fluid">
  <h2>Lecture Id: <?php  echo $lectureId; ?></h2>
  <p></p>
  <form action="uploadclassroomhanout.php" method="POST" enctype="multipart/form-data">
    <p>Custom file:</p>
    <div class="custom-file mb-3">
        <input type="hidden" name="lectureId" value="<?php echo $lectureId; ?>">
      
      <input type="file" class="custom-file-input" id="customFile" name="handoutfile" required>
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>

  
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


  <div class="container-fluid">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Uploaded Handouts</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><table class="table table-bordered">
    <thead>
      
      <tr>
        <th>Lecture ID</th>
        <th>Handout Name</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
   <?php 
   foreach($handout as $han){?>
           <tr>
        <td><?php echo $han['LectureId']; ?></td>
        <td><?php echo $han['HandoutName']; ?></td>
        <td><a href="deleteClassRoomHandout.php?handoutId=<?php echo $han['HandoutId']; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
      </tr>
   
   
   <?php

   }
   
   ?>
        

   
      
    </tbody>
  </table></div>
      </div>
    </div>
  </div> 
</div>
</div>
        </div>
      </div>
    </div>
    

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Subjective Question Section</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body">
        <form action="uploadLectureSubjetiveQurstion.php" method="POST">
        <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label for="sel1">Select Question:</label><br>
      <select class="form-control select2 selectedData" id="selectedvalue2" name='questionId' required>
       <option value="">Select any one</option>
       <?php 
       foreach($subjectiveQuestion as $SQ){?>
       
       <option value="<?php echo $SQ['SubjectiveQuestionId']; ?>"><?php echo $SQ['SubQuestionText']; ?></option>
       
       
       <?php

       }
       
       
       ?>
       
      
    
      </select>
      </div>

    </div>
    </div>
      </div>
        

      <div class="container-fluid">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
    <label for="sel1">Question Nautre:</label><br>
      <select class="form-control selectedData" id="selectedvalue3" name="nature" required>
       <option value="">Select any one</option>
       <?php 
       foreach($naturesubjectiveQuestion as $NQ){?>
       
       <option value="<?php echo $NQ['NatureSubjectiveQuestionId']; ?>"><?php echo $NQ['Name']; ?></option>
       
       <?php

       }
       
       ?>
   
      
       
    
      </select>
      </div>

    </div>


    <div class="col-md-4">
    <div class="form-group">
    <label for="sel1">Question Marks:</label><br>
      <input type="text" class="form-control" placeholder="Ex-10 Marks" name='marks' required>
       
      </div>

    </div>

    <div class="col-md-4">
    <div class="form-group">
    <label for="sel1">Question Word Limit:</label><br>
    <input type="text" class="form-control" placeholder="Ex-250 Words" name="wordlimit" required>
      </div>

    </div>


    </div>
      </div>

      <div class="container-fluid">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <input type="hidden" name="lectireId" value="<?php echo $lectureId; ?>">
    <input type='submit' class="btn btn-success" name='submit' value="Submit">
      </div>

    </div>
    </div>
  </div>
  </form>
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
  <table class="table table-bordered table-striped">
    <thead>
      
      <tr>
        <th>Qid</th>
        <th>Question Text</th>
        <th>Question Type</th>
        <th>Question Marks</th>
        <th>Question Word Limit</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach($lectureSubjectiveQuestion as $LSQ){?>
      <tr>
        <td><?php echo $LSQ['SubjectiveQuestionId']; ?></td>
        <td><?php echo $LSQ['SubQuestionText']; ?></td>
        <td><?php echo $LSQ['Name']; ?></td>
        <td><?php echo $LSQ['Marks']; ?></td>
        <td><?php echo $LSQ['WordLimit']; ?></td>
        <td><button type="button" class="btn btn-primary" disabled>Edit</button></td>
        <td><a href="deleteLectureSubjectiveQuestion.php?qid=<?php echo $LSQ['LectureSubjectiveQuestionId'];?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
      </tr>
      
      
      
      <?php

      }
      
      
      ?>
    
   
 
    </tbody>
  </table>
    </div></div></div>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Objective Question Section</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse in">
        <div class="panel-body">
        <form action="uploadLectureObjectiveQurstion.php" method="POST">
        <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label for="sel1">Select Question:</label><br>
      <select class="form-control select2 selectedData" id="selectedvalue3" name="questionId" required>
       <option value="">Select any one</option>
       <?php 
       foreach($ObjectiveQuestion as $OQ){?>
       
       <option value="<?php echo $OQ['ObjectiveQuestionId']; ?>"><?php echo $OQ['ObjQuestionText']; ?></option>
       
       <?php

       }
       
       ?>
       
      
    
      </select>
      </div>

    </div>
    </div>
      </div>


      <div class="container-fluid">
    <div class="row">

    <div class="col-md-4">
    <div class="form-group">
    <label for="sel1">Question Marks:</label><br>
      <input type="text" class="form-control" placeholder="Ex-10 Marks" name="marks" required>
       
      </div>

    </div>

    </div>
      </div>

      <div class="container-fluid">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
    <input type="hidden" name="lectireId" value="<?php echo $lectureId; ?>">
    <input type="submit" class="btn btn-success" name='submit' value="Submit">
      </div>

    </div>


    </div>
      </div>
        </form>
      <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
  <table class="table table-bordered table-striped">
    <thead>
      
      <tr>
        <th>Qid</th>
        <th>Question Text</th>
        <th>Question Marks</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach($lectureObjectiveQuestion as $LOQ){?>
      
      <tr>
        <td><?php echo $LOQ['ObjectiveQuestionId'];?></td>
        <td><?php echo $LOQ['ObjQuestionText'];?></td>
        <td><?php echo $LOQ['Marks'];?></td>
        
        <td><button type="button" class="btn btn-primary" disabled>Edit</button></td>
        <td><a href="deleteLectureObjectiveQuestion.php?qid=<?php echo $LOQ['LectureObjectiveQuestionId'];?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
      </tr>
      
      
      <?php

      }
      
      
      
      ?>
    
     
 
    </tbody>
  </table>
    </div></div></div>
        </div>
      </div>
    </div>
  </div> 
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>

$(document).ready(function(){
  $('.select2').select2();
 
 })  
 
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

 
 

</script>  
</body>
</html>
