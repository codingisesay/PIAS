<?php
	session_start();
	if(!isset($_SESSION['StudentId']) && !isset($_SESSION['MailId']) && !isset($_SESSION['MobileNo']) && !isset($_SESSION["Name"])){

	  header('location:../login.php');

	}
	
	$course_id = $_GET['course_id'];
	
	include('../connection.php');
?>
	<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Test</title>
    <link type="text/css" rel="stylesheet" href="/css/styles.css" />
</head>

<div class="container">
<form id="mcqForm" action="submit.php" method="POST">
        <div class="header">
            <h1>GS TEST 2 - GEOGRAPHY (2777)</h1>
            <div class="timer">1 Hour <span id="timer">59:59</span></div>
            <button type="submit" class="submit-btn" id="submit-btn">SUBMIT</button>
        </div>
        <div class="content">
            <div class="questions-list" id="questions-list">
                <!-- Questions will be populated here -->
            </div>	
            <div class="question-detail">
                
                    <div id="question-container">
                        <!-- Question content will be dynamically inserted here -->
                    </div>
                    <div class="navigation-buttons">
                        <button type="button" id="prev-btn">Previous</button>
                        <button type="button" id="next-btn">Next</button>
                    </div>
					
                </form>
            </div>
        </div>
    </div>
    <script src="/js/testScript.js"></script>
</html>
