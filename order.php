<html>

<head>
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/order.css">
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
	if(isset($_GET['type'])) {
		
		// echo '<h2> HELLO! </h2>';
		// SQL select by food type here 
		$type = sanitizeString(INPUT_GET, 'type');
		$query = "SELECT fooditem, imgpath, cost FROM fooditems
				  WHERE foodtype = $type;";
		$error = "Error fetching food info";

		$foodResult = callQuery($pdo, $query, $error);

?> 
	<h3>Add Item to checkout</h3>
	<ul class="foodList">
<?php 
		// output all returned food items from query
		while ($item = $foodResult->fetch()) {

			$imgPath = $item['imgpath'];
			$foodItem = $item['fooditem'];
			$cost = $item['cost'];
			if (isset($cost)) { 
				$costStr = "$" . number_format($cost, 2);
			}else{ 
				$costStr = "Cost Here";
			}

			?>

		<li><img src="/images/food/<?php if (!$imgPath == "" || isset($imgPath)) { echo "$imgPath";}else{ echo "default.png";} ?>"><p class="foodItem"><?= $foodItem ?></p> 
		<p class="cost"><?= $costStr ?></p></li>

		<?php

		}
		
		?> 
		</ul>
	<?php 

	} else {
	?>
		<h3>Choose a type</h3>
		<ul class="typeList">
		<a href="order.php?type=1"><li>American</li></a>
		<a href="order.php?type=2"><li>Chinese</li></a>
		<a href="order.php?type=3"><li>Mexican</li></a>
		<a href="order.php?type=4"><li>Japanese</li></a>
		</ul>

		<?php
	}
		?>
	</div>
	<?php
	require('footer.php');
	?>
</body>

</html>