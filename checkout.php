<html>
<head>
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/checkout.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body>
	<?php

	require('header.php');
	require('dbConnect.php');
	require('functions.php');
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	} else {
		$cart = $_SESSION['cart'];
	}

	$itemListStr = ""
	?>
	
	<div id="content">

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
				$totalCost += $cost;
				
				} else {$cost = 5.00;}
				$cost = sprintf('$%.02f', $cost);
			?>
		<tr class="item"><td><?= $itemName ?></td><td><?= $cost ?></td><td class="qty"><?= $qty ?></td></tr>
		<?php
			}

			$totalCost = sprintf('$%.02f', $totalCost);
		?>
		<tr class="item"><td>Total</td><td><?= $totalCost ?></td><td class="qty"><?= $totalQty ?></td></tr>
		</table>
		
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