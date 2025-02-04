
<?php 

include('dash_board_page_layout.php');

include('studentZoneFunction.php');
	
$student_id = $_SESSION['StudentId'];

$studentCourses = fetchStudentCourses($student_id);
$id = 4;
$stu = checkCourseType($studentCourses,$id);

$output = "";

if(count($studentCourses) > 0){
      $output .= "<header class='w3-row-padding' style=''> </header>";
      
        $output .= "<div class='w3-row-padding w3-margin-bottom'>";
        if($stu > 0){
            foreach($studentCourses as $sc){

                if($sc['CourseTypeId'] == 4){
                
                  $output .="<div class='w3-third w3-section'>";
                  $output .= "<ul class='w3-ul w3-white w3-hover-shadow'>
                       
                        <li class='w3-black w3-xlarge w3-padding-32'>$sc[CourseName]</li>
                        <li class='w3-padding-16'>$sc[CourseSubTypeName] -  $sc[CourseMedium]
                        </li>
                        <li class='w3-light-white w3-padding-24'>
                        <a type='button' href='classlist.php?course_id=$sc[CourseId]' class='w3-button w3-black w3-padding-large'>View</a>
                        </li>
                      </ul>";
                  $output .="</div>";
              }
            
            }


        }else{

            $output.="<h1>No Module Assign In This Section</h1>";

        }

}else{

  $output.="No Module Assign";

  }



?>

<!-- Page content-->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<?php 

echo $output;

?>
</div>