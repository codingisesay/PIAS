<?php 
include('../adminSession.php');
include('../adminNavbar.php'); 
include('registrationFunction.php'); 

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
$studentList = FetchStudentData();


?>
<br>
<div class="container-fluid">
<a href="createStudentPortal.php"><button type="button" class="btn btn-success">Create Student Portal</button></a>

</div>

<div class="container-fluid">
         
  <table class="table table-striped display" id="myTable">
    <thead>
      <tr>
        <th>Student Id</th>
        <th>Name</th>
        <th>Mail Id</th>
        <th>Mobile No.</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Print</th>
        
        
      </tr>
    </thead>
    <tbody>
  <?php 
  foreach($studentList as $SL){?>
  
  <tr>
        <td><?php echo $SL['StudentId']; ?></td>
        <td><?php echo $SL['Name']; ?></td>
        <td><?php echo $SL['MailId']; ?></td>
        <td><?php echo $SL['MobileNo']; ?></td>
        <td><?php echo $val =  ($SL['StudentStatus'] == 1)?("Active"):("Inactive"); ?></a></td>
        <td><a href="editStudentDetails.php?Sid=<?php echo $SL['StudentId']; ?>"><button type="button" class="btn btn-primary">Edit</button></td>
        <td><button type="button" class="btn btn-primary">Print</button></td>
       
        
      </tr>
  
  <?php

  }
  
  
  
  ?>

      
      
      
    </tbody>
  
  <tfoot>
  <tr>
        <th>Student Id</th>
        <th>Name</th>
        <th>Mail Id</th>
        <th>Mobile No.</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Print</th>
     
        
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
