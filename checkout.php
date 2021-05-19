<html>
<head>
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/checkout.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body>
	<?php
	if(!session_id()){
		
	}
	require('header.php');
	?>
	<div id="content">

		<div class="item"><p>item name</p><p>Item Cost</p> <p>Quantity</p> </div>

		<form action="" method="post">
		<label for="address">Address:</label>
		<input type="text" name="address" id="">
		<label for="roomNum">Room Number:</label>
		<input type="text" name="roomNum">
		<label for="phone">Phone Number:</label>
		<input type="text" name="phone" id="">
		<label for="cardNum">Card Number:</label>
		<input type="text" name="cardNum">
		<label for="cardExp">Expiration:</label>
		<input type="text" name="cardExp">
		<label for="cardCvv">CVV:</label>
		<input type="text" name="cardCvv">
		<input type="submit" value="Checkout">
		</form>
	</div>
	<?php
	require('footer.php');
	?>

	<!--Hello-->
</body>
</html>