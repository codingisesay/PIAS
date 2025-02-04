<?php 
function FetchSubjectiveQuestion(){
    include('../../connection.php');
    $query = "SELECT * FROM SubjectiveQuestion";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $allQuestion[] = $data;

    }
    return $allQuestion;
    mysqli_close($conn);
}

function FetchSubjectiveQuestionById($qid){
    include('../../connection.php');
    $query = "SELECT * FROM SubjectiveQuestion WHERE SubjectiveQuestionId = '$qid'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $allQuestionById[] = $data;

    }
    return $allQuestionById;
    mysqli_close($conn);
}



?>