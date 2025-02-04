<?php 
include('../adminSession.php');
include('classroomAdminFunction.php');


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
$course = FetchDataFromCourseTable();

$courseCount = count($course);

// echo "<pre>";
// print_r($course);


?>

<br>
<div class="container-fluid">
<a href="createPackage.php"><button type="button" class="btn btn-success">Create Package</button></a>

</div>

<div class="container-fluid">
         
  <table class="table table-striped display" id="myTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Sub Type</th>
       
        <th>Medium</th>
        <th>Name</th>
        <th>Fee</th>
        <th>Fee Amount</th>
        <th>Base Year</th>
        <th>TargetYear</th>
        <th>Live Channel</th>
        <th>Live Chat</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Edit</th>
        
      </tr>
    </thead>
    <tbody>
<?php 
for($courseLoop = 0; $courseLoop < $courseCount; $courseLoop++){?>

<tr>
        <td><?php echo $course[$courseLoop]['CourseId']?></td>
        <td><?php echo $course[$courseLoop]['CourseTypeName']?></td>
        <td><?php echo $course[$courseLoop]['CourseSubTypeName']?></td>
  
        <td><?php echo $course[$courseLoop]['CourseMedium']?></td>
        <td><?php echo $course[$courseLoop]['CourseName']?></td>
        <td><?php echo $course[$courseLoop]['Fee']?></td>
        <td><?php echo $course[$courseLoop]['FeeAmount']?></td>
        <td><?php echo $course[$courseLoop]['BaseYear']?></td>
        <td><?php echo $course[$courseLoop]['TargetYear']?></td>
        <td><?php echo $course[$courseLoop]['LiveChannel']?></td>
        <td><?php echo $course[$courseLoop]['LiveChat']?></td>
        <td><?php echo $course[$courseLoop]['CourseStartDate']?></td>
        <td><?php echo $course[$courseLoop]['CourseEndDate']?></td>
        <td><?php echo $course[$courseLoop]['CourseStatus']?></td>
        <td><a href="editClassroomPackage.php?course=<?php echo $course[$courseLoop]['CourseId'];?>"><button type="button" class="btn btn-info">Edit</button></a></td>
      </tr>




<?php

}

?>

    </tbody>
  
  <tfoot>
  <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Sub Type</th>
      
        <th>Medium</th>
        <th>Name</th>
        <th>Fee</th>
        <th>Fee Amount</th>
        <th>Base Year</th>
        <th>TargetYear</th>
        <th>Live Channel</th>
        <th>Live Chat</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
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