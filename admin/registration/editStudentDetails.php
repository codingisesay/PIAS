<?php 

include('../adminSession.php');
include('../adminNavbar.php');
include('../classroom/classroomAdminFunction.php');
include('registrationFunction.php');


?>
<head>
  <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<link rel="stylesheet" href="../library/chosen/chosen.min.css">

<link rel="stylesheet" href="../library/sellect.js-master/src/sellect.css">
    <!-- <link rel="stylesheet" href="../library/sellect.js-master/demo/demo.css"> -->

    
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
$studentId = $_REQUEST['Sid'];
$studntDetalsWithCourseassign = fetchStudentDataWithModule($studentId);
$course = FetchDataFromCourseTable();
$AllbatchName = [];
$selectBatch = [];



foreach($course as $c){

    array_push($AllbatchName,$c['CourseName']);

}

foreach($studntDetalsWithCourseassign as $SDWC){

    array_push($selectBatch,$SDWC['CourseName']);

}

$Allbatch = json_encode($AllbatchName);
$b = json_encode($selectBatch);

// echo "<pre>";
// print_r($Allbatch);

// echo "<pre>";
//  print_r($selectBatch);


?>
  <br>
<div class="container-fluid">
  <form action="#" method="POST">
<table id="customers">
  <tr>
    <th colspan="3">Edit Student Portal</th>
    
  </tr>
  <tr>
    <td style="width:25%;">Student Name</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="studentName" id="usr" placeholder="Write Student Name.." value="<?php echo $studntDetalsWithCourseassign[0]['Name'];?>" required></div></td></div></td>
  
    
  </tr>
  <tr>
  <td >Student Mail Id</td>
    <td><div class="form-group">
    <input type="email" class="form-control" name="studentMailId" id="usr" placeholder="Write Student Email.." value="<?php echo $studntDetalsWithCourseassign[0]['MailId'];?>" required></div></td></div></</td>
  </tr>
  <tr>
  <td >Student Password</td>
    <td><div class="form-group">
    <input type="text" class="form-control" name="studentPassword" id="usr" placeholder="Write Student Password.." value="<?php echo $studntDetalsWithCourseassign[0]['Password'];?>" required></div></td>
  </tr>
  <tr>
  <td >Student Mobile No.</td>
    <td><div class="form-group">
    <input type="number" class="form-control" name="studentMobileNo" id="usr" placeholder="Write Mobile No.." value="<?php echo $studntDetalsWithCourseassign[0]['MobileNo'];?>" required></div></td>
  </tr>
  <tr>
  <td >Portal Status</td>
    <td><div class="form-group">
    <select class="form-control" id="sel1" name="portalStatus" required>
        <option value="<?php $studntDetalsWithCourseassign[0]['StudentStatus'];?>">
        <?php if($studntDetalsWithCourseassign[0]['StudentStatus'] == 0){
         echo "Pending";
        }elseif($studntDetalsWithCourseassign[0]['StudentStatus'] == 1){
         echo "Active";
        }elseif($studntDetalsWithCourseassign[0]['StudentStatus'] == 2){

            echo "Deactive";

        }
         ?></option>
        <option value="0">Pending</option>
        <option value="1">Active</option>
        <option value="3">Deactive</option>

        
    
      </select>
</div></td>
  </tr>
  <tr>
  <td >Module Assign</td>
    <td>
      <input type="text" id="my-element" name="insert_batch">
</td>
  </tr>

  <td>Course Mode</td>
    <td><div class="form-group">
      <select class="form-control"  name="mode"  required>
        <option value="<?php echo $studntDetalsWithCourseassign[0]['mode']; ?>"><?php echo $var1 = ($studntDetalsWithCourseassign[0]['mode']== 0)?("Online"):("Offline"); ?></option>
        <option value="0">Online</option>
        <option value="1">Offline</option>

        
    
      </select></div></</td>
  </tr>
  
  <tr>
  <td colspan="2"><input type="submit" class="btn btn-success" value="Submit" name="submit"></td>
   
  </tr>
</table>
  </form>
</div>

</body>
<script src="../library/sellect.js-master/src/sellect.js"></script>
<script src="../library/chosen/chosen.jquery.min.js"></script>
<script>
    var mySellect = sellect("#my-element", {
        // originList: ['banana', 'apple', 'pineapple', 'papaya', 'grape', 'orange', 'grapefruit', 'guava', 'watermelon', 'melon'],
        // // destinationList: ['banana', 'papaya', 'grape', 'orange', 'guava'],
        originList: <?php echo $Allbatch; ?>,
        destinationList: <?php echo $b; ?>,
        
        onInsert: updateDemoLists,
        onRemove: updateDemoLists
    });

    mySellect.init();

    // demo code to return lists
    function updateDemoLists(event, item) {
        var selectedList = document.getElementById('selected-list');
        var unselectedList = document.getElementById('unselected-list');
        var selectedArr;
        var unselectedArr;

        while (selectedList.firstChild) {
            selectedList.removeChild(selectedList.firstChild);
        }

        while (unselectedList.firstChild) {
            unselectedList.removeChild(unselectedList.firstChild);
        }

        selectedArr = mySellect.getSelected();
        unselectedArr = mySellect.getUnselected();

        selectedArr.forEach(function (item, index, arr){
            var span = document.createElement('span');
            span.innerText = item;
            selectedList.appendChild(span);
        });

        unselectedArr.forEach(function (item, index, arr){
            var span = document.createElement('span');
            span.innerText = item;
            unselectedList.appendChild(span);
        });
      
        
        
    }
</script>


<script>
// $(document).ready(function(){
   
//   $("#save").click(function(){
//     var Content = CKEDITOR.instances['Content'].getData();
//     alert(Content);
//   });
//   CKEDITOR.replace('Content');

//   $('#select_batch').chosen();

// });
</script>