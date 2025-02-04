<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Analysis</title>
    <link rel="stylesheet" href="../css/result_analysis.css">
</head>
<body>
    <div class="container">
        <h1>Test Result Analysis</h1>
        <table>
            <thead>
                <tr>
                    <th>Q. No.</th>
                    <th>Question</th>
                    <th>Subject</th>
                    <th>Answer, Difficulty and Nature</th>
                    <th>Your Answer and Marks</th>
                    <th>Explanation</th>
                </tr>
            </thead>
            <tbody>
 <?php
	session_start();
	if(!isset($_SESSION['StudentId']) && !isset($_SESSION['MailId']) && !isset($_SESSION['MobileNo']) && !isset($_SESSION["Name"])){

	  header('location:../login.php');

	}
	
	$course_id = $_GET['course_id'];
	
	include('../connection.php');

	$StudentId = $_SESSION['StudentId'];
	$testId = 1; // This should be passed or retrieved based on the test being taken


                 $sql = "
                    SELECT 
                        oq.ObjectiveQuestionId, 
                        oq.ObjQuestionText, 
                        oq.Option_A, 
                        oq.Option_B, 
                        oq.Option_C, 
                        oq.Option_D, 
                        oq.CorrectAnswer, 
                        oq.explanation,
                        tr.UserAnswer,
                        tr.IsCorrect
                    FROM 
                        TestResults tr
                    JOIN 
                        ObjectiveQuestion oq 
                    ON 
                        tr.QuestionId = oq.ObjectiveQuestionId
                    WHERE 
                        tr.StudentId = ? AND tr.TestId = ?
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $StudentId , $testId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ObjectiveQuestionId'] . "</td>";
                        echo "<td>" . $row['ObjQuestionText'] . "</td>";
                        echo "<td>Subject</td>"; // Assuming you have a subject field
                        echo "<td>" . $row['CorrectAnswer'] . "</td>";
                        echo "<td>" . ($row['UserAnswer'] ? $row['UserAnswer'] : 'Not Attempted') . "</td>";
                        echo "<td>" . $row['explanation'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No results found</td></tr>";
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>