<?php 
session_start();
if(isset($_SESSION['StudentId']) && isset($_SESSION['MailId']) && isset($_SESSION['MobileNo']) && isset($_SESSION["Name"])){

  header('location:studentZone/dashboard.php');

}

?>

<html>

<head>
    <title>Patriotic IAS Login Form</title>
    <link rel="icon" type="image/x-icon" href="photos/final_logo.jpeg">
    <link rel="stylesheet" 
          href="css/login.css">
</head>

<body>
    <div class="main">
        <h1>PATRIOTIC IAS</h1>
        <h3>Enter your login credentials</h3>
        <form action="validateStudent.php" method="POST">
            <label for="first">
                  Username:
              </label>
            <input type="email" 
                   id="first"
                   name="first" 
                   placeholder="Enter your Username" required>

            <label for="password">
                  Password:
              </label>
            <input type="password"
                   id="password" 
                   name="password" 
                   placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit"
                        name="submit">
                    Submit
                </button>
            </div>
        </form>
        <p>Forgot Password? 
              <a href="#" 
               style="text-decoration: none;">
                Click Here
            </a>
        </p>
    </div>
</body>

</html>