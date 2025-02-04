<?php
// questions.php
include('../connection.php');
$sql = "SELECT * FROM ObjectiveQuestion";
$result = $conn->query($sql);

$questions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

$conn->close();

echo json_encode($questions);
?>
