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

  $submitPressed = sanitizeString(INPUT_POST, 'clickIt');

  if (isset($submitPressed)) {

    $user = sanitizeString(INPUT_POST, 'userName');
    $passWord = sanitizeString(INPUT_POST, 'passWord');

    if ($user != "" && $passWord != "") {
      $greeting = "Welcome to Desk Dash $user";
    } else {
      $greeting = "Please enter a username and password.";
    }
  } else {
    $greeting = "Please login for deliciousness!";
  }

	?>
  <div id="content">
    <?php
      echo "<h3> $greeting </h3>"
    ?>
          
      <form action="" method="post">
        <label for="userName">Username:</label>
        <input type="text" placeholder="Username" name="userName" id="userName">
        <br><br>
              
        <label for="passWord">Password:</label>
        <input type="password" placeholder="Password" name="passWord" id="passWord">
        <br><br>
              
        <input type="submit" name="clickIt" value="Log In" id="submit">
      </form>
  </div>
	<?php
	require('footer.php');
	?>
</body>

</html>