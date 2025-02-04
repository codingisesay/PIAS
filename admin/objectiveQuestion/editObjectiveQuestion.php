<?php 

include('../adminSession.php');
include('../adminNavbar.php');


?>
<head>
  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
include('objectiveQuestionFunctions.php');
$qid = $_REQUEST['qid'];
$allQuestionById = FetchObjectiveQuestionById($qid);


?>

  <br>
<div class="container-fluid">
  <form action="updateObjectiveQuestion.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Update Objective Question</th>
    
  </tr>
  <tr>
    <td style="width:25%;">Question Text</td>
    <td><div class="form-group">
      <input type="hidden" name="Qid" value="<?php echo $allQuestionById[0]['ObjectiveQuestionId']; ?>">
      <textarea name="Content" id="Content" placeholder="Required, at least 4 characters"><?php echo $allQuestionById[0]['ObjQuestionText']; ?></textarea><br></div></td>
  
    
  </tr>
  <tr>
  <td >Option A</td>
    <td><div class="form-group">
    <textarea name="Content1" id="Content1" placeholder="Required, at least 4 characters"><?php echo $allQuestionById[0]['Option_A']; ?></textarea><br>
   </div></td>
  </tr>
  <tr>
  <td >Option B</td>
    <td><div class="form-group">
    <textarea name="Content2" id="Content2" placeholder="Required, at least 4 characters"><?php echo $allQuestionById[0]['Option_B']; ?></textarea><br>
   </div></td>
  </tr>
  <tr>
  <td >Option C</td>
    <td><div class="form-group">
    <textarea name="Content3" id="Content3" placeholder="Required, at least 4 characters"><?php echo $allQuestionById[0]['Option_C']; ?></textarea><br>
</div></td>
  </tr>
  <tr>
  <td >Option D</td>
    <td><div class="form-group">
    <textarea name="Content4" id="Content4" placeholder="Required, at least 4 characters"><?php echo $allQuestionById[0]['Option_D']; ?></textarea><br>
      </div></td>
  </tr>
  <tr>
  <td >Correct Answer</td>
    <td><div class="form-group">
      <select class="form-control" id="sel1" name="correctAns" required>
        <option value='<?php echo $allQuestionById[0]['CorrectAnswer']; ?>'><?php echo $allQuestionById[0]['CorrectAnswer']; ?></option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
        
      </select></div></</td>
  </tr>
  <tr>
  <td>Explanation</td>
    <td><div class="form-group">
    <textarea name="Content5" id="Content5" placeholder="Required, at least 4 characters"><?php echo $allQuestionById[0]['explanation']; ?></textarea><br>
</div></td>
  </tr>
  
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" name='submit' value="Update"></td>
   
  </tr>
</table>
      </form>
</div>

</body>
<script>
$(document).ready(function(){
   
  $("#save").click(function(){
    var Content = CKEDITOR.instances['Content'].getData();
    var Content = CKEDITOR.instances['Content1'].getData();
    var Content = CKEDITOR.instances['Content2'].getData();
    var Content = CKEDITOR.instances['Content3'].getData();
    var Content = CKEDITOR.instances['Content4'].getData();
    var Content = CKEDITOR.instances['Content5'].getData();
    alert(Content);
    alert(Content1);
    alert(Content2);
    alert(Content3);
    alert(Content4);
    alert(Content5);
  });
  CKEDITOR.replace('Content');
  CKEDITOR.replace('Content1');
  CKEDITOR.replace('Content2');
  CKEDITOR.replace('Content3');
  CKEDITOR.replace('Content4');
  CKEDITOR.replace('Content5');

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