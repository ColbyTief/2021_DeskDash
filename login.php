<html>

<head>
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/login.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>
	<?php
	require('header.php');
  require('functions.php');
  require('dbConnect.php');

  ?>
<div id="content">
  <?php
  $errorMsg = "Issue with database.";
  // if user is logged in
  if (!isset($logout)) {
  $logout = sanitizeString(INPUT_GET, 'logout');
  }

 
  if (!isset($_SESSION['id'])){
  $loggedIn = 0;
  $submitPressedLogIn = sanitizeString(INPUT_POST, 'logIn');
  $submitPressedSignUp = sanitizeString(INPUT_POST, 'signUp');
  $user = trim(sanitizeString(INPUT_POST, 'userName'));
  $passWord = trim(sanitizeString(INPUT_POST, 'passWord'));

  $greeting = "Please log in or sign up for deliciousness";

  if (isset($submitPressedLogIn)) {// Form was submitted.

    if ($user != "" && $passWord != "") {
      $query = "SELECT COUNT(username)
      FROM `login`
      WHERE `username` = '$user' AND `password` = '$passWord'";



      $numUsers = callQuery($pdo, $query, $errorMsg)->fetchcolumn();

      if ($numUsers) {
        $query = "SELECT userid FROM `login` 
                  WHERE `username` = '$user' AND `password` = '$passWord'";
        $_SESSION["id"] = callQuery($pdo, $query, 'Error fetching user id')->fetchcolumn();
        $loggedIn = 1;
        $greeting = "Welcome back to desk dash $user!";
      } else {
        $greeting = "This user could not be found, please check credentials or sign up.";
      }
      
    } else {
      $greeting = "Please enter a username and password.";
    }

  } 
  if (isset($submitPressedSignUp)) {

    if ($user != "" && $passWord != "") {
    
      $query = "SELECT COUNT(username)
      FROM `login`
      WHERE username = '$user'";

      $numUsers = callQuery($pdo, $query, $errorMsg)->fetchColumn();

        if (!$numUsers) {

          $query = "INSERT INTO `login` (`username`, `password`) VALUES ('$user', '$passWord')";

          callQuery($pdo, $query, $errorMsg);

          $greeting = "Welcome new user $user we hope you enjoy!";
          

        } else {
          $greeting = "This user already exists, try a different username.";
        }

    } else {
      $greeting = "Please enter a username and password.";
    }
    
  } 
    
  

	?>
  
    <?php
      echo "<h3> $greeting </h3>";
      if (!$loggedIn){
    ?>
          
      <form action="" method="post">
        <label for="userName">Username:</label>
        <input type="text" placeholder="Username" name="userName" id="userName">
        <br><br>
              
        <label for="passWord">Password:</label>
        <input type="password" placeholder="Password" name="passWord" id="passWord">
        <br><br>
              
        <input type="submit" name="logIn" value="Log In" id="submit">
        <input type="submit" name="signUp" value="Sign Up" id="submit">
      </form>
  
  
	<?php
      }
  } elseif ($logout == "yes") {
    unset($_SESSION['id']);
    echo "<h3> You have successfully been logged out<h3>";
  } else {
    ?>
    <h3> You are currently logged in to Desk Dash<h3>
    <?php
  }

  ?>
</div>
  <?php
	require('footer.php');
	?>
  
</body>

</html>