<?php 
function fetchcounsellingTableData(){
    include('../../connection.php');
    $query = "SELECT counselling_student.id,counselling_student.course_id,counselling_student.enq_per_name,counselling_student.enq_per_email,counselling_student.enq_per_phone,counselling_student.enq_per_msg,counselling_student.counselling_status,counselling_student.counselling_comment,counselling_student.counselling_done_by,counselling_student.counsellingDateTime,counselling_student.InsertDateTime,Course.CourseName FROM `counselling_student` JOIN `Course` ON counselling_student.course_id = Course.CourseId";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $counsellingData[] = $data;

    }

    return $counsellingData;
    mysqli_close($conn);
}


function adminusers(){
    include('../../connection.php');
    $query = "SELECT * FROM adminUser";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $adminUser[] = $data;

    }

    return $adminUser;
    mysqli_close($conn);
}

function fetchcounsellingbyId($id){
    include('../../connection.php');
    $query = "SELECT counselling_student.id,counselling_student.course_id,counselling_student.enq_per_name,counselling_student.enq_per_email,counselling_student.enq_per_phone,counselling_student.enq_per_msg,counselling_student.counselling_status,counselling_student.counselling_comment,counselling_student.counselling_done_by,counselling_student.counsellingDateTime,counselling_student.InsertDateTime,Course.CourseName FROM `counselling_student` JOIN `Course` ON counselling_student.course_id = Course.CourseId WHERE counselling_student.id = '$id'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $counsellingDataById[] = $data;

    }

    return $counsellingDataById;
    mysqli_close($conn);
}




?>