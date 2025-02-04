<?php 
include('../adminSession.php');



?>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
<style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
  tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
</head>
<body>
<?php 
include('../adminNavbar.php'); 
include('objectiveQuestionFunctions.php');
$allQuestion = FetchSubjectiveQuestion();


?>

<br>
<div class="container-fluid">
<a href="createObjectiveQuestion.php"><button type="button" class="btn btn-success">Create Objective Question</button></a>

</div>

<div class="container-fluid">
         
  <table class="table table-striped display" id="myTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Question Text</th>
        <th>Option A</th>
        <th>Option B</th>
        <th>Option C</th>
        <th>Option D</th>
        <th>Answer</th>
        <th>Edit</th>
        
      </tr>
    </thead>
    <tbody>
<?php 
foreach($allQuestion as $AQ){?>

<tr>
        <td><?php echo $AQ['ObjectiveQuestionId']; ?></td>
        <td><?php echo $AQ['ObjQuestionText']; ?></td>
        <td><?php echo $AQ['Option_A']; ?></td>
        <td><?php echo $AQ['Option_B']; ?></td>
        <td><?php echo $AQ['Option_C']; ?></td>
        <td><?php echo $AQ['Option_D']; ?></td>
        <td><?php echo $AQ['CorrectAnswer']; ?></td>
        <td><a href="editObjectiveQuestion.php?qid=<?php echo $AQ['ObjectiveQuestionId']; ?>"><button type="button" class="btn btn-info">Edit</button></td>

      </tr>



<?php

}




?>



    </tbody>
  
  <tfoot>
  <tr>
        <th>Id</th>
        <th>Question Text</th>
        <th>Option A</th>
        <th>Option B</th>
        <th>Option C</th>
        <th>Option D</th>
        <th>Answer</th>
        <th>Edit</th>
        
      </tr>
        </tfoot>
        </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>


<script>

  $(document).ready( function () {
    $('#myTable').DataTable();
} )

new DataTable('#myTable', {
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
                let title = column.footer().textContent;
 
                // Create input element
                let input = document.createElement('input');
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== this.value) {
                        column.search(input.value).draw();
                    }
                });
            });
    }
});



</script>
</body>