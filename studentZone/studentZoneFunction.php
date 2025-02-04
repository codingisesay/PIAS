<?php 
function fetchStudentCourses($student_id){
    include('../connection.php');
    $query = "SELECT StudentAssignCourse.CourseId,Course.CourseTypeId,Course.CourseSubTypeId,Course.CourseMedium,Course.CourseName,CourseSubType.CourseSubTypeName
    FROM StudentAssignCourse 
    JOIN Course ON
     StudentAssignCourse.CourseId = Course.CourseId 
     JOIN CourseSubType ON
     Course.CourseSubTypeId = CourseSubType.CourseSubTypeId
    WHERE StudentAssignCourse.StudentId = '$student_id'";
    $run = mysqli_query($conn,$query);
    $row = mysqli_num_rows($run);
    $allCourses = [];
    if($row > 0){
        while($data = mysqli_fetch_assoc($run)){

            array_push($allCourses,$data);

        }

     

        $studentCoursesCount = count($allCourses);

        for($all = 0; $all < $studentCoursesCount; $all++){

            $course = $allCourses[$all]['CourseId'];

            $queryAll = "SELECT CourseBoundling.BoundleCourseWith, Course.CourseTypeId,Course.CourseSubTypeId,Course.CourseMedium,Course.CourseName,CourseSubType.CourseSubTypeName
             FROM CourseBoundling JOIN Course
            ON CourseBoundling.BoundleCourseWith = Course.CourseId
            JOIN CourseSubType ON
            Course.CourseSubTypeId = CourseSubType.CourseSubTypeId
            WHERE CourseBoundling.BoundleCourse = '$course'";
            $runAll = mysqli_query($conn,$queryAll);
            while($dataAll = mysqli_fetch_assoc($runAll)){

                array_push($allCourses,$dataAll);

            }


        }

   
        return  $allCourses;


    }else{
        return $allCourses;
    }
  
mysqli_close($conn);

}

function checkCourseType($studentCourses,$id){
   $stu = 0;
    foreach($studentCourses as $scc){
    if($scc['CourseTypeId'] == $id){
        $stu++;
    }

    }

    return $stu;


}


?>