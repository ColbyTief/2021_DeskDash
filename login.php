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
	?>
  <div id="content">
    <h3>Please login for deliciousness!</h3>
          
      <form action="" method="post">
        <label for="userName">Username:</label>
        <input type="text" placeholder="Username" name="userName" id="userName">
        <br><br>
              
        <label for="passWord">Password:</label>
        <input type="password" placeholder="Password" name="passWord" id="passWord">
        <br><br>
              
        <input type="submit" name="clickIt" value="Log In">
      </form>
  </div>
	<?php
	require('footer.php');
	?>
</body>

</html>