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
		session_start();
		$_SESSION['cart'] = array();
	}
	require('header.php');
	?>
	
	<div id="content">

		<h1 id="shoutTitle">Cart Summary</h1>

			<div id="formGroup">

				<div id="left_img"> </div>

					<div id="conForm" class="myform">

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

						<button name="submit" value="Send" style="margin-top:15px;">Checkout</button>
						
						<div class="spacer"></div>

					</form>

					</div>
				</div>
			</div>



	</div>
	<?php
	require('footer.php');
	?>

	<!--Hello-->
</body>
</html>