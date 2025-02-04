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


  <br>
<div class="container-fluid">
  <form action="insertSubjectiveQuestion.php" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Create Subjective Question</th>
    
  </tr>
  <tr>
    <td style="width:25%;">Question Text</td>
    <td><div class="form-group">
    <textarea name="Content" id="Content" placeholder="Required, at least 4 characters"></textarea><br></div></td>
  
    
  </tr>
 
  <tr>
  <td>Explanation</td>
    <td><div class="form-group">
    <textarea name="Content1" id="Content1" placeholder="Required, at least 4 characters"></textarea><br>
</div></td>
  </tr>
  
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" name='submit' value="Submit"></td>
   
  </tr>
</table>
      </form>
</div>

</body>
<script>
$(document).ready(function(){
   
  $("#save").click(function(){
    var Content = CKEDITOR.instances['Content'].getData();
    var Content1 = CKEDITOR.instances['Content1'].getData();
    alert(Content);
    alert(Content1);
  });
  CKEDITOR.replace('Content');
  CKEDITOR.replace('Content1');

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