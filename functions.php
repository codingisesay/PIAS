<?php 
function FetchDataFromCourseTypeTable(){
    include('connection.php');
    $query ="SELECT Course.CourseId,CourseType.CourseTypeName,CourseSubType.CourseSubTypeName,Course.CourseMedium,Course.CourseName,Course.Fee,
    Course.FeeAmount,Course.BaseYear,Course.TargetYear,Course.LiveChannel,Course.LiveChat,Course.CourseStartDate,Course.CourseEndDate,Course.CourseStatus FROM Course JOIN CourseType ON Course.CourseTypeId = CourseType.CourseTypeId JOIN CourseSubType ON Course.CourseSubTypeId = CourseSubType.CourseSubTypeId
     WHERE (Course.Fee = '0' OR Course.Fee = '1') AND Course.CourseStatus = '1' AND (Course.CourseTypeId = '1' OR Course.CourseTypeId = '2') ORDER by Course.CourseId DESC";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $courses[] = array("CourseId" => $data['CourseId'],"CourseTypeName" => $data['CourseTypeName'],"CourseSubTypeName" => $data['CourseSubTypeName'],
        "CourseMedium" => $data['CourseMedium'],"CourseName" => $data['CourseName'],"Fee" => $data['Fee'],"FeeAmount" => $data['FeeAmount'],
        "BaseYear" => $data['BaseYear'],"TargetYear" => $data['TargetYear'],"LiveChannel" => $data['LiveChannel'],"LiveChat" => $data['LiveChat'],
        "CourseStartDate" => $data['CourseStartDate'],"CourseEndDate" => $data['CourseEndDate'],"CourseStatus" => $data['CourseStatus']);

    }

    return $courses;
    mysqli_close($conn);
}


function fetchAttLecturesOfCours($course_id){
    include('connection.php');
    $query = "SELECT * FROM Lecture WHERE CourseId = '$course_id'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $LectursOfBatch[] = array("LectureId" => $data['LectureId'],"CourseId" => $data['CourseId'],"SubjectLocalName" => $data['SubjectLocalName'],"VideoEmbedCode" => $data['VideoEmbedCode'],
        "Synopsis" => $data['Synopsis']);

    }

    return $LectursOfBatch;
    mysqli_close($conn);
}

function fetchSubCoursByCourseId($course_id){
    include('connection.php');
    $query = "SELECT * FROM CourseSubType WHERE CourseTypeId  = '$course_id'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $subCoursesByCourse[] = array("CourseSubTypeId" => $data['CourseSubTypeId'],"CourseSubTypeName" => $data['CourseSubTypeName'],"CourseTypeId" => $data['CourseTypeId']);

    }

    return $subCoursesByCourse;
    mysqli_close($conn);
}

function fetchFreeResourceCurrentAffairsModules($cid){

    include('connection.php');
    $query = "SELECT * FROM Course WHERE (CourseTypeId   =  '6' OR CourseTypeId   =  '7') AND CourseSubTypeId = '$cid' AND Fee = '0' AND CourseStatus = '1'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $freeResourceModules[] = array("CourseId" => $data['CourseId'],"CourseName" => $data['CourseName'],"CourseMedium" => $data['CourseMedium']);

    }

    return $freeResourceModules;
    mysqli_close($conn);

}


function fetchAttLecturesOfCoursWithHandout($course_id){
    include('connection.php');
    $query = "SELECT * FROM `Lecture` l join Course c on c.CourseId =l.CourseId left join LectureHandout lh on lh.LectureId = l.LectureId where c.CourseId = '$course_id'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        /*$LectursOfBatch[] = array("LectureId" => $data['LectureId'],"CourseId" => $data['CourseId'],"SubjectLocalName" => $data['SubjectLocalName'],"VideoEmbedCode" => $data['VideoEmbedCode'],
        "Synopsis" => $data['Synopsis']);*/
        $LectursOfBatch[] = $data;
    }
    // echo "<pre>";
    // print_r($LectursOfBatch);

    return $LectursOfBatch;
    mysqli_close($conn);
}

function courseDetail($courseId){
    include('connection.php');
    $query = "SELECT * FROM Course WHERE CourseId = '$courseId'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $coursedetail[] = $data;
    }

    return $coursedetail;
    mysqli_close($conn);


}

function fatchLectureHandout($lecture_id){

    include('connection.php');
    $query = "SELECT * FROM LectureHandout WHERE LectureId = '$lecture_id'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $lectureHanout[] = $data;
    }

    return $lectureHanout;
    mysqli_close($conn);

}

function LectureOfClass($course_id,$lecture_id){
    include('connection.php');
    $query = "SELECT * FROM Lecture WHERE LectureId = '$lecture_id' AND CourseId = '$course_id'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $lectureOfCourse[] = $data;
    }

    return $lectureOfCourse;
    mysqli_close($conn);

}

function FetchSubjectiveQuestionForLecture($lecture){
    include('connection.php');
    $query = "SELECT LectureSubjectiveQuestion.LectureSubjectiveQuestionId,LectureSubjectiveQuestion.Marks,LectureSubjectiveQuestion.WordLimit,SubjectiveQuestion.SubQuestionText,SubjectiveQuestion.SubjectiveQuestionId,SubjectiveQuestion.explanation,NatureSubjectiveQuestion.Name FROM LectureSubjectiveQuestion LEFT JOIN SubjectiveQuestion ON LectureSubjectiveQuestion.SubjectiveQuestionId = SubjectiveQuestion.SubjectiveQuestionId LEFT JOIN NatureSubjectiveQuestion ON LectureSubjectiveQuestion.NatureSubjectiveQuestionId = NatureSubjectiveQuestion.NatureSubjectiveQuestionId WHERE LectureSubjectiveQuestion.LectureId = '$lecture'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $lectureSubjectiveQuestion[] = $data;
    }

    return $lectureSubjectiveQuestion;
    mysqli_close($conn);


}


function FetchObjectiveQuestionForLecture($lecture){
    include('connection.php');
    $query = "SELECT LectureObjectiveQuestion.LectureObjectiveQuestionId,LectureObjectiveQuestion.Marks,ObjectiveQuestion.ObjectiveQuestionId,ObjectiveQuestion.ObjQuestionText,ObjectiveQuestion.Option_A,ObjectiveQuestion.Option_B,ObjectiveQuestion.Option_C,ObjectiveQuestion.Option_D,ObjectiveQuestion.CorrectAnswer,ObjectiveQuestion.explanation FROM LectureObjectiveQuestion JOIN ObjectiveQuestion ON LectureObjectiveQuestion.ObjectiveQuestionId = ObjectiveQuestion.ObjectiveQuestionId WHERE LectureObjectiveQuestion.LectureId = '$lecture'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $lectureObjectiveQuestion[] = $data;
    }

    return $lectureObjectiveQuestion;
    mysqli_close($conn);


}

function fetchliveandlatestlink(){
    include('connection.php');
    $query = "SELECT * FROM LiveAndLatestSessionVideo";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $liveandlatestlink[] = $data;
    }

    return $liveandlatestlink;
    mysqli_close($conn);


}


?>