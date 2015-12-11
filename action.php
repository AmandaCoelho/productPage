<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
      
    <?php 
      include "connectdb.php" 
    ?>
    
    <?php
       // extra information from the fields in the form
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $uname = $_POST['userName'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    
    $Result = mysql_query("INSERT INTO aosuser  (firstName, lastName, userName, email, pwd) VALUES('$fname', '$lname', '$uname', '$email', '$pwd') ") or die ('Insert Error: '.mysql_error());
    
    mysql_close($link);
    echo "record Inserted";
         
    ?>
    
  </body>
</html>
