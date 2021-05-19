<html>

<head>
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/order.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>
	<?php
	if(!session_id()){
		session_start();
		$_SESSION['cart'] = array();
	}
	require('header.php');
	require('functions.php');
	require('dbConnect.php');
	?>
	<div id="content">

	<?php

	$id = -1;
	if(isset($_GET['type'])) {
		$type = sanitizeString(INPUT_GET, 'type');
		if ($id < 0) {

			?>
	<form id="addType" action="" method="post">
	<p>New Food item here:</p>
	<label for="itemName">Item: </label>
	<input type="text" name="itemName">
	<label for="itemCost">Cost: </label>
	<input type="text" name="itemCost">
	<label for="imgPath">Image: </label>
	<input type="file" name="imgPath">
	<input type="submit" name="create2" value="create">
	</form>


			<?php
			// form to add items
			$formClicked2 = sanitizeString(INPUT_POST, 'create2');
			$itemName = sanitizeString(INPUT_POST, 'itemName');
			// if new item added
			if (isset($formClicked2) && $itemName != "") {
				$cost = intval(sanitizeString(INPUT_POST, 'itemCost'));
				$imagePath = sanitizeString(INPUT_POST, 'imgPath');
				$query = "INSERT INTO `fooditems` (`fooditem`, `foodtype`, `imgpath`, `cost`)
				VALUES ('$itemName', $type, '$imagePath', $cost );";

				$error = "Error inserting new item to database";

				callQuery($pdo, $query, $error);
				unset($formClicked2);
			}
		}
		// echo '<h2> HELLO! </h2>';
		// SQL select by food type here 
		
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

		<li><div id="addCart"><input type="submit" value="Add" name="addItem"></div><img src="/images/food/<?php if (!$imgPath == "" ) { echo "$imgPath";}else{ echo "default.png";} ?>"><p class="foodItem"><?= $foodItem ?></p> 
		<p class="cost"><?= $costStr ?></p><input type="hidden" name="cartItem" value="<?= $foodItem ?>"></li>

		<?php

		}
		
		?> 
		</ul>
	<?php 

	} else {
		// sanitize button
		$formClicked = sanitizeString(INPUT_POST, 'create');
		$newType = sanitizeString(INPUT_POST, 'typeName');
		// if form button is clicked create a new food type
		if (isset($formClicked) && $newType != "") {
			$query = "SELECT COUNT(typeName) AS result
					FROM foodtypes
					WHERE typeName = '$newType';";

			$error = "problem counting rows";
			$uniqueType = callQuery($pdo, $query, $error)->fetchcolumn();

			if (!$uniqueType) {

				$query = "INSERT INTO `foodtypes` (`typeName`)
				VALUES ('$newType');";

				$error = "Error inserting new type to database";

				callQuery($pdo, $query, $error);
				unset($formClicked);
			}
			


		}

		$query = "SELECT typeid, typeName FROM foodtypes";
		$error = "Error fetching food info";

		$typeResult = callQuery($pdo, $query, $error);

	?>

		<h3>Choose a type</h3>
		<ul class="typeList">
		<?php
		// loop through types
			while ($type = $typeResult->fetch()) {

				$typeName = $type['typeName'];
				$typeId = $type['typeid'];
		?>
		<a href="order.php?type=<?= $typeId ?>"><li><?= $typeName ?></li></a>

		<?php
			} // end type while
		?>
		</ul>

		<?php
		// check for admin user
		if ($id < 0) {

			?>
<form id="addType" action="" method="post">
<p>New Food Type here:</p>
<input type="text" name="typeName">
<input type="submit" name="create" value="create">
</form>


			<?php
		}
	}
		?>
	</div>
	<?php
	require('footer.php');
	?>
</body>

</html>