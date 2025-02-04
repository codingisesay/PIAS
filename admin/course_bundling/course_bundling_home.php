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
<?php include('../adminNavbar.php'); 


?>
<br>
<div class="container-fluid">
<a href="course_bundling_form.php"><button type="button" class="btn btn-success">Course Bundling</button></a>

</div>

<div class="container-fluid">
         
  <table class="table table-striped display" id="myTable">
    <thead>
      <tr>
        <th>Boundled Id</th>
        <th>Primary Course</th>
        <th>Secondary Course</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for($lectursLoop = 0; $lectursLoop < $lecturescount; $lectursLoop++){?>
      <tr>
        <td><?php echo $lectures[$lectursLoop]['LectureId'];?></td>
        <td><?php echo $lectures[$lectursLoop]['CourseId'];?></td>
        <td><?php echo $lectures[$lectursLoop]['CourseName'];?></td>
        <td><a href="editLecture.php?lecture=<?php echo $lectures[$lectursLoop]['LectureId']; ?>"><button type="button" class="btn btn-info">Edit</button></a></td>

      </tr>
      
      
      <?php

      }
      
      
      ?>
   
      
      
    </tbody>
  
  <tfoot>
  <tr>
        <th>Boundled Id</th>
        <th>Primary Course</th>
        <th>Secondary Course</th>
        <th>Edit</th>
      </tr>
        </tfoot>
        </table>
</div>
</body>
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
