<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
if ( isset( $_POST['submit'] ) ) {  // if form successfully submitted  
    function validator($data) { // security function
        if ( isset($data)){ // confirm there is data
            $data = trim($data); // strip spaces
            $data = stripslashes($data); // strip slashes
            $data = htmlspecialchars($data); // convert any html special chars into standard text
            $data = filter_var($data, FILTER_SANITIZE_STRING); // filter the string
            return $data; // return the entered data
        } else {
            exit(); // end php
        } // end else
    } // end function
    $username  = validator($_POST['loginame']); // username
    $password  = validator($_POST['userPassword']); // password
    $error; // hold errors for later
    require_once('connect.php'); // allow database access
    $results = mysql_query( // check if user exists
            "
            SELECT * FROM users WHERE username = '$username'
            "
    ) or die (mysql_error()); // if failed present an error
    $userRecords =  mysql_fetch_row($results); // fetch row data for the user
    if ($username == $userRecords[3] && $password == $userRecords[4]) { // if entered data matches records
        $_SESSION['loggedIn'] = $username; // allow secure access
        $_SESSION['name'] = $username; // name session after username
        header("Location: product.php"); // login user
        mysql_close ($link); // close database for security
        exit(); // end php
    } else { // incorrectly entered username and/or passwird
        $error = "User and/or Password Incorrect"; // error
    } // end security check else
} // end on submit
?>







<html>
  <head>
    <meta charset="UTF-8">
    <title>AMANDA'S ORCHID LOGIN</title>
    <link rel="stylesheet" href="css/newstyle.css" >
  </head>
  <body>
   
   
    <header>
      <div id="shop">
        <div id="logo">
          <img src="images/logo_outline2.svg" alt="logo"/>
        </div>  <!-- end #logo -->
        <div id="companyName">
          <h1>Amanda's</h1>
          <h1>Orchid</h1>
          <h1>Shop</h1>
        </div>  <!-- end #companyName -->
      </div>  <!-- end #shop -->
    </header>
    
      <nav>
        <ul>
          <li><a href="index.php">Sign Up</a></li>
          <li><a href="login.php"  class="active">LOG IN</a></li>
        </ul>
      </nav>      
    
    <main>
      <form  id="registerForm" method="post" action="login.php">
       <h3>LOG IN</h3>
        <div class="formElements">
          <label>Email: </label>
          <input type="email" name="email" id="email"  placeholder="Your Email: " required>
          <label>Password: </label>
          <input type="password" name="password" id="password" required>
            <br>
           
              <br>
            
            <br>
            <input type="submit">
            <input type="reset">
         </div>   <!-- end .formElements -->

      </form>
    </main>

    <footer>
        <ul>
          <li><a href="index.php" >SIGN UP</a></li>
          <li><a href="login.php" class="active2">LOG IN</a></li>
        </ul>  
      <p>Music: http://www.purple-planet.com</p>
    </footer>
    <?php
    // put your code here
    ?>
    <script src="js/sound.js" type="text/javascript"></script>
  </body>
</html>
