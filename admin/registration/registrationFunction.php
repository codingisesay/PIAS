<?php 
function FetchStudentData(){
    include('../../connection.php');
    $query = "SELECT * FROM Students";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $studentList[] = $data;

    }
    return $studentList;
}

function fetchStudentDataWithModule($studentId){
    include('../../connection.php');
    $query="SELECT Students.StudentId,Students.Name,Students.MailId,Students.Password,Students.MobileNo,Students.StudentStatus,StudentAssignCourse.CourseId,StudentAssignCourse.mode,Course.CourseId,Course.CourseName FROM Students JOIN StudentAssignCourse ON Students.StudentId = StudentAssignCourse.StudentId JOIN Course ON StudentAssignCourse.CourseId = Course.CourseId WHERE Students.StudentId = '$studentId'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $studntDetalsWithCourseassign[] = $data;

    }
    return $studntDetalsWithCourseassign;
}



?>