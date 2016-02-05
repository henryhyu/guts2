<html>
<head>
<title>Form</title>
</head>
<body>

<div id="main">
  <h1>Submit data using HTML into a database (using mysqli)</h1>
  <div id="login">
    <h2>New User</h2>
    <hr/>
    <form action="" method="post">
      <label>First Name :</label>
      <input type="text" name="first_name" id="firstname" required="required"/><br /><br />
      <label>Last Name :</label>
      <input type="text" name="last_name" id="lastname" required="required" /><br/><br />
      <label>Email :</label>
      <input type="text" name="email" id="email" required="required"/><br/><br />
      <input type="submit" value=" Submit " name="submit"/><br />
    </form>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'registration';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
}

    $sql = "INSERT INTO users(first_name, last_name, email)
VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['email']."')";
    if ($conn->query($sql) === true) {
        echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
    } else {
        echo "<script type= 'text/javascript'>alert('Error: ".$sql.'<br>'.$conn->error."');</script>";
    }
    $conn->close();
}
?>
  </body>
</html>
