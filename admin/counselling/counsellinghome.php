<?php 
include('../adminSession.php');
include('counsellingfunction.php');

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
$counsellingData = fetchcounsellingTableData();
// echo "<pre>";
// print_r($counsellingData);


?>

<br>
<!-- <div class="container-fluid">
<a href="createPackage.php"><button type="button" class="btn btn-success">Create Package</button></a>

</div> -->

<div class="container-fluid">
         
  <table class="table table-striped display" id="myTable">
    <thead>
      <tr>
        <th>Course</th>
        <th>Received DateTime</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Enq MSG</th>
        <th>Status</th>
        <th>Counselling by</th>
        <th>Counselling DateTime</th>
        <th>Edit</th>
        
      </tr>
    </thead>
    <tbody>
<?php 
foreach($counsellingData as $cd){?>
<tr>
      
      <td><?php echo $cd['course_id']."-".$cd['CourseName']; ?></td>
      <td><?php echo $cd['InsertDateTime']; ?></td>
      <td><?php echo $cd['enq_per_name']; ?></td>
      <td><?php echo $cd['enq_per_email']; ?></td>
      <td><?php echo $cd['enq_per_phone']; ?></td>
      <td><?php echo $cd['enq_per_msg']; ?></td>
      <td><?php echo $cd['counselling_status']; ?></td>
      <td><?php echo $cd['counselling_done_by']; ?></td>
      <td><?php echo $cd['counsellingDateTime']; ?></td>
      <td><a href="editcounselling.php?id=<?php echo $cd['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a></td>
    </tr>



<?php

}


?>




    </tbody>
  
  <tfoot>
  <tr>
  <th>Course</th>
        <th>Received DateTime</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Enq MSG</th>
        <th>Status</th>
        <th>Counselling by</th>
        <th>Counselling DateTime</th>
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