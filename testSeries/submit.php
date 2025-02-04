<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	if(!isset($_SESSION['StudentId']) && !isset($_SESSION['MailId']) && !isset($_SESSION['MobileNo']) && !isset($_SESSION["Name"])){

	  header('location:../login.php');

	}
	
	//$course_id = $_GET['course_id'];
	
	include('../connection.php');

$StudentId = $_SESSION['StudentId'];
$testId = 1; // This should be passed or retrieved based on the test being taken

$sql = "SELECT * FROM ObjectiveQuestion";
$result = $conn->query($sql);

$score = 0;
$totalQuestions = $result->num_rows;
while ($row = $result->fetch_assoc()) {
    $questionId = $row['ObjectiveQuestionId'];
    $correctAnswer = $row['CorrectAnswer'];
    $userAnswer = isset($_POST['question' . $questionId]) ? $_POST['question' . $questionId] : null;
	if($userAnswer == $correctAnswer)
		$isCorrect = 1;
	else
		$isCorrect = 0;
	
    if ($isCorrect) {
        $score++;
    }

    $stmt = $conn->prepare("INSERT INTO TestResults (StudentId, TestId, QuestionId, UserAnswer, IsCorrect) 
                        VALUES (?, ?, ?, ?, ?) 
                        ON DUPLICATE KEY UPDATE 
                        UserAnswer = VALUES(UserAnswer), 
                        IsCorrect = VALUES(IsCorrect)");

	$stmt->bind_param("iiisi", $StudentId, $testId, $questionId, $userAnswer, $isCorrect);
    $stmt->execute();
    $stmt->close();
}

echo "Your score is $score out of $totalQuestions.";
$redirect_url =  'result_analysis.php';
header('Location: '.$redirect_url);
$conn->close();
?>
