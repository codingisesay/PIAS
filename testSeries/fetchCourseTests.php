<?php
	session_start();
	if(!isset($_SESSION['StudentId']) && !isset($_SESSION['MailId']) && !isset($_SESSION['MobileNo']) && !isset($_SESSION["Name"])){

	  header('location:../login.php');

	}
	
	include('../connection.php');

	$studentId = $_SESSION['StudentId'];

	$stmt = $conn->prepare("SELECT p.PrelimsTestPaperId, p.TestPaperLocalName, p.CourseId, c.CourseName
							FROM PrelimsTestPaper p
							INNER JOIN Course c ON p.CourseId = c.CourseId
							INNER JOIN StudentAssignCourse sac ON sac.CourseId = c.CourseId
							WHERE sac.StudentId = ?");
	$stmt->bind_param("i", $studentId);
	$stmt->execute();
	$result = $stmt->get_result();
	$tests = $result->fetch_all(MYSQLI_ASSOC);

	echo json_encode($tests);
?>
