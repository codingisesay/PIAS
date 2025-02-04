<?php 
function FetchDataFromCourseTypeTable(){
    include('../../connection.php');
    $query ="SELECT * FROM CourseType";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $courseType[] = array("CourseId" => $data['CourseTypeId'],"CourseTypeName" => $data['CourseTypeName']);

    }

    return $courseType;
    mysqli_close($conn);
}

function FetchDataFromCourseSubTypeTable(){
    include('../../connection.php');
    $query ="SELECT * FROM CourseSubType";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $courseSubType[] = array("CourseSubTypeId" => $data['CourseSubTypeId'],"CourseSubTypeName" => $data['CourseSubTypeName'],"CourseTypeId" => $data['CourseTypeId']);

    }

    return $courseSubType;

    mysqli_close($conn);
}

function FetchDataFromCourseTable(){

    include('../../connection.php');
    $query ="SELECT Course.CourseId,CourseType.CourseTypeName,CourseSubType.CourseSubTypeName,Course.CourseMedium,Course.CourseName,Course.Fee,
    Course.FeeAmount,Course.BaseYear,Course.TargetYear,Course.LiveChannel,Course.LiveChat,Course.CourseStartDate,Course.CourseEndDate,Course.CourseStatus FROM Course JOIN CourseType ON Course.CourseTypeId = CourseType.CourseTypeId JOIN CourseSubType ON Course.CourseSubTypeId = CourseSubType.CourseSubTypeId";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $course[] = array("CourseId" => $data['CourseId'],"CourseTypeName" => $data['CourseTypeName'],"CourseSubTypeName" => $data['CourseSubTypeName'],
        "CourseMedium" => $data['CourseMedium'],"CourseName" => $data['CourseName'],
        "Fee" => $data['Fee'],"FeeAmount" => $data['FeeAmount'],"BaseYear" => $data['BaseYear'],
        "TargetYear" => $data['TargetYear'],"LiveChannel" => $data['LiveChannel'],"LiveChat" => $data['LiveChat'],
        "CourseStartDate" => $data['CourseStartDate'],"CourseEndDate" => $data['CourseEndDate'],"CourseStatus" => $data['CourseStatus']
    );

    }

    return $course;

    mysqli_close($conn);

}


function FetchDataFromCourseTableByID($moduleId){

    include('../../connection.php');
    $query ="SELECT Course.CourseId,CourseType.CourseTypeId,CourseType.CourseTypeName,CourseSubType.CourseSubTypeId ,CourseSubType.CourseSubTypeName,Course.CourseMedium,Course.CourseName,Course.Fee,
    Course.FeeAmount,Course.BaseYear,Course.TargetYear,Course.LiveChannel,Course.LiveChat,Course.CourseStartDate,Course.CourseEndDate,Course.CourseStatus FROM Course JOIN CourseType ON Course.CourseTypeId = CourseType.CourseTypeId JOIN CourseSubType ON Course.CourseSubTypeId = CourseSubType.CourseSubTypeId 
    WHERE Course.CourseId  = '$moduleId'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $courseById[] = array("CourseId" => $data['CourseId'],"CourseTypeId"=>$data['CourseTypeId'],"CourseTypeName" => $data['CourseTypeName'],"CourseSubTypeId"=>$data['CourseSubTypeId'],"CourseSubTypeName" => $data['CourseSubTypeName'],
        "CourseMedium" => $data['CourseMedium'],"CourseName" => $data['CourseName'],
        "Fee" => $data['Fee'],"FeeAmount" => $data['FeeAmount'],"BaseYear" => $data['BaseYear'],
        "TargetYear" => $data['TargetYear'],"LiveChannel" => $data['LiveChannel'],"LiveChat" => $data['LiveChat'],
        "CourseStartDate" => $data['CourseStartDate'],"CourseEndDate" => $data['CourseEndDate'],"CourseStatus" => $data['CourseStatus']
       
    
    );

    }

    return $courseById;

    mysqli_close($conn);

}

function FetchDataFromSubject(){
    include('../../connection.php');
    $query ="SELECT * FROM Subjects";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $subjects[] = array("SubjectId" => $data['SubjectId'],"SubjectName" => $data['SubjectName']);

    }

    return $subjects;
    mysqli_close($conn);
}

function FetchAdminUserData(){
    include('../../connection.php');
    $query ="SELECT * FROM adminUser WHERE AdminRole = '1'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $faculty[] = array("AdminUserID" => $data['AdminUserID'],"Name" => $data['Name']);

    }

    return $faculty;
    mysqli_close($conn);

}

function fetchDataFromLectureTable(){

    include('../../connection.php');
    $query ="SELECT Lecture.LectureId,Lecture.CourseId,Lecture.SubjectId,Lecture.SubjectLocalName,Lecture.LectureStartTime,Lecture.LectureEndTime,Lecture.Faculty,Lecture.VideoEmbedCode,Lecture.Synopsis,Course.CourseName,Subjects.SubjectName FROM Lecture JOIN Course ON Lecture.CourseId = Course.CourseId JOIN Subjects ON Lecture.SubjectId = Subjects.SubjectId";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $lectures[] = array("LectureId" => $data['LectureId'],"CourseId" => $data['CourseId'],"SubjectId" => $data['SubjectId'],"SubjectLocalName" => $data['SubjectLocalName'],
        "LectureStartTime" => $data['LectureStartTime'],"LectureEndTime" => $data['LectureEndTime'],"Faculty" => $data['Faculty'],"VideoEmbedCode" => $data['VideoEmbedCode'],
        "Synopsis" => $data['Synopsis'],"CourseName" => $data['CourseName'],"SubjectName" => $data['SubjectName']
    );

    }

    return $lectures;
    mysqli_close($conn);
    
}


function fetchDataFromLectureTableById($lectureId){

    include('../../connection.php');
    $query ="SELECT Lecture.LectureId,Lecture.CourseId,Lecture.SubjectId,Lecture.SubjectLocalName,Lecture.LectureStartTime,Lecture.LectureEndTime,Lecture.Faculty,Lecture.VideoEmbedCode,Lecture.Synopsis,Course.CourseName,Subjects.SubjectName FROM Lecture JOIN Course ON Lecture.CourseId = Course.CourseId JOIN Subjects ON Lecture.SubjectId = Subjects.SubjectId
    WHERE Lecture.LectureId = '$lectureId'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $lecturesById[] = array("LectureId" => $data['LectureId'],"CourseId" => $data['CourseId'],"SubjectId" => $data['SubjectId'],"SubjectLocalName" => $data['SubjectLocalName'],
        "LectureStartTime" => $data['LectureStartTime'],"LectureEndTime" => $data['LectureEndTime'],"Faculty" => $data['Faculty'],"VideoEmbedCode" => $data['VideoEmbedCode'],
        "Synopsis" => $data['Synopsis'],"CourseName" => $data['CourseName'],"SubjectName" => $data['SubjectName']
    );

    }

    return $lecturesById;
    mysqli_close($conn);
    
}

function FetchLectureHandout($lectureId){
    include('../../connection.php');
    $query ="SELECT * FROM LectureHandout WHERE LectureId  = '$lectureId'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $handout[] = array("HandoutId" => $data['HandoutId'],"LectureId" => $data['LectureId'],
        "HandoutName" => $data['HandoutName'],"HandoutLink" => $data['HandoutLink']);

    }

    return $handout;
    mysqli_close($conn);


}

function FetchAllSubjectiveQuestion(){
    include('../../connection.php');
    $query ="SELECT * FROM SubjectiveQuestion";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $subjectiveQuestion[] = $data;

    }

    return $subjectiveQuestion;
    mysqli_close($conn);


}


function FetchNatureOfSubjective(){
    include('../../connection.php');
    $query ="SELECT * FROM NatureSubjectiveQuestion";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $naturesubjectiveQuestion[] = $data;

    }

    return $naturesubjectiveQuestion;
    mysqli_close($conn);


}

function FetchAllObjectiveQuestion(){
    include('../../connection.php');
    $query ="SELECT * FROM ObjectiveQuestion";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $ObjectiveQuestion[] = $data;

    }

    return $ObjectiveQuestion;
    mysqli_close($conn);


}


function FetchSubjectiveQuestionForLecture($lecture){
    include('../../connection.php');
    $query = "SELECT LectureSubjectiveQuestion.LectureSubjectiveQuestionId,LectureSubjectiveQuestion.Marks,LectureSubjectiveQuestion.WordLimit,SubjectiveQuestion.SubQuestionText,SubjectiveQuestion.SubjectiveQuestionId,NatureSubjectiveQuestion.Name FROM LectureSubjectiveQuestion LEFT JOIN SubjectiveQuestion ON LectureSubjectiveQuestion.SubjectiveQuestionId = SubjectiveQuestion.SubjectiveQuestionId LEFT JOIN NatureSubjectiveQuestion ON LectureSubjectiveQuestion.NatureSubjectiveQuestionId = NatureSubjectiveQuestion.NatureSubjectiveQuestionId WHERE LectureSubjectiveQuestion.LectureId = '$lecture'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $lectureSubjectiveQuestion[] = $data;
    }

    return $lectureSubjectiveQuestion;
    mysqli_close($conn);


}
function FetchObjectiveQuestionForLecture($lecture){
    include('../../connection.php');
    $query = "SELECT LectureObjectiveQuestion.LectureObjectiveQuestionId,LectureObjectiveQuestion.Marks,ObjectiveQuestion.ObjectiveQuestionId,ObjectiveQuestion.ObjQuestionText FROM LectureObjectiveQuestion JOIN ObjectiveQuestion ON LectureObjectiveQuestion.ObjectiveQuestionId = ObjectiveQuestion.ObjectiveQuestionId WHERE LectureObjectiveQuestion.LectureId = '$lecture'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $lectureObjectiveQuestion[] = $data;
    }

    return $lectureObjectiveQuestion;
    mysqli_close($conn);


}




?>