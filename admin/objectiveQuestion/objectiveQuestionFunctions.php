<?php 

function FetchSubjectiveQuestion(){
    include('../../connection.php');
    $query = "SELECT * FROM ObjectiveQuestion";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $allQuestion[] = $data;

    }
    return $allQuestion;
    mysqli_close($conn);
}

function FetchObjectiveQuestionById($qid){
    include('../../connection.php');
    $query = "SELECT * FROM ObjectiveQuestion WHERE ObjectiveQuestionId = '$qid'";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){

        $allQuestionById[] = $data;

    }
    return $allQuestionById;
    mysqli_close($conn);
}


?>