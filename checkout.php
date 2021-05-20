<html>
<head>
	
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/checkout.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<?php
		if(!session_id()){
			session_start();
		}
		require('dbConnect.php');
		require('functions.php');
	$message = "";
	$pay = sanitizeString(INPUT_POST, 'pay');
	$displayForm = 1;
	if (isset($pay)) {
		$displayForm = 0;
		$address = sanitizeString(INPUT_POST, 'address');
		$roomNum = sanitizeString(INPUT_POST, 'roomNum');
		$phone = sanitizeString(INPUT_POST, 'phone');
		$carNum = sanitizeString(INPUT_POST, 'cardNum');
		$cardExp = sanitizeString(INPUT_POST, 'cardExp');
		$cardCvv = sanitizeString(INPUT_POST, 'cardCvv');

		if ($cardCvv == "" || !isset($cardCvv)){
			$displayForm = 1;
			$message = "<h4>Please enter the three numbers on the back of the card</h4>";
		}

		if ($cardExp == "" || !isset($cardExp)){
			$displayForm = 1;
			$message = "<h4>Please enter your card's expiration date</h4>";
		}

		if ($carNum == "" || !isset($carNum)){
			$displayForm = 1;
			$message = "<h4>Please enter your card number</h4>";
		}

		if ($phone == "" || !isset($phone)){
			$displayForm = 1;
			$message = "<h4>Please enter a phone number</h4>";
		}

		if ($address == "" || !isset($address)){
			$displayForm = 1;
			$message = "<h4>Please enter an address</h4>";
		}




	}

	if (!$displayForm) {
			unset($_SESSION['cart']);
			header("Location: http://localhost:3000/confirmation.php");
			exit();
			
	}
	?>
	
</head>
<body>
	<?php
	require('header.php');

	if (isset($_SESSION['cart'])) {
		if ($_SESSION['cart'] != null && $_SESSION['cart'] != array()) {
		$cart = $_SESSION['cart'];
		}
	}
	$itemListStr = "";
	?>
	
	<div id="content">
		<?php 
		if (isset($cart)) {
		?>
		<h1 id="shoutTitle">Cart Summary</h1>
		<table id="itemList">
		<tr class="item"><th>Item Name</th><th>Cost</th><th class="qty">Quantity</th></tr>
			<?php

			
			foreach($cart as $id=>$qty) {
				$itemListStr .= $id . ",";
			}

			$itemListStr = trim($itemListStr, ",");
			

			$query = "SELECT itemid, fooditem, cost
					FROM fooditems
					WHERE itemid in ($itemListStr)
					ORDER BY foodtype
					";

			$listResult = callQuery($pdo, $query, 'Error fetching items from list');
			$totalQty = 0;
			$totalCost = 0.00;
			while($item = $listResult->fetch()){
				$itemName = $item['fooditem'];
				$itemId = $item['itemid'];
				$qty = $cart[$itemId];
				$totalQty += $qty;
				if ($item['cost'] != null) {
				$cost = $item['cost'];
				
				
				} else {$cost = 5.00;}

				$totalCost += $cost * $qty;
				$cost = sprintf('$%.02f', $cost);
			?>
		<tr class="item"><td><?= $itemName ?></td><td><?= $cost ?></td><td class="qty"><?= $qty ?></td></tr>
		<?php
			}

			$totalCost = sprintf('$%.02f', $totalCost);
		?>
		<tr class="item"><td>Total</td><td><?= $totalCost ?></td><td class="qty"><?= $totalQty ?></td></tr>
		</table>
			<?php

			if ($displayForm) {

				echo $message;
			?>
			<div id="formGroup">

					<div id="conForm" class="myform">

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

						<button name="pay" value="Send" style="margin-top:15px;">Checkout</button>
						
						<div class="spacer"></div>

					</form>

					</div>
				</div>
			<?php 
			}
	
		} else {
			?>
		<h3>Please add items to your cart before attempting to checkout</h3>
			<?php
		}
		?>
	</div>
	<?php
	require('footer.php');
	?>

	<!--Hello-->
</body>
</html>