<!DOCTYPE html>
<html>
<style>
input[type=text], [type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin: auto;
  padding: auto;
}
</style>
<body>

<h2 style="text-align: center;">PatrioticIAS Admin Login</h2>

<div>
  <form action="adminValidate.php" method="POST">
    <label for="fname">User MailID</label>
    <input type="text" id="fname" name="usermailID" placeholder="Your MailID..">

    <label for="lname">Password</label>
    <input type="password" id="lname" name="userPassword" placeholder="Your Password..">

  
    <input type="submit" value="Submit" name="submit">
  </form>
</div>

</body>
</html>


