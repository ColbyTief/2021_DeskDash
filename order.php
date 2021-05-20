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
	}
	require('header.php');
	require('functions.php');
	require('dbConnect.php');
	?>
	<div id="content">

	<?php
	// temporary value for an admin user id
	if (isset($_SESSION['id'])){
		$id = $_SESSION['id'];
	} else {
		$id = 0;
	}
	// if a restaurant has been chosen
	if(isset($_GET['type'])) {
		$type = sanitizeString(INPUT_GET, 'type');


		// set cart to an array if not already
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
			
		} else {
			// test print
			print_r($_SESSION['cart']);
		}


		// if the add button was pressed
		$addCart = sanitizeString(INPUT_POST, 'addToCart');
		if (isset($addCart) && $addCart == "add") {
			
			// get post data and store in variable, holding item id
			$uniqueItemId = sanitizeString(INPUT_POST, 'itemId');
			// if item not in cart
			if(!isset($_SESSION['cart'][$uniqueItemId])){
				// initialize item value to 1
			$_SESSION['cart'][$uniqueItemId] = 1;
			} else {
				// add one to the quantity
				$_SESSION['cart'][$uniqueItemId] += 1;
			}
			
			$_POST['addToCart'] = "";
		}


		// if the user is an admin
		if ($id < 0) {

			// if add new item clicked
			$formClicked2 = sanitizeString(INPUT_POST, 'create2');
			// item name
			$itemName = sanitizeString(INPUT_POST, 'itemName');
			// if new item added and item name not empty
			if (isset($formClicked2) && $formClicked2 != "" && $itemName != "") {
				$cost = intval(sanitizeString(INPUT_POST, 'itemCost'));
				$imagePath = sanitizeString(INPUT_POST, 'imgPath');
				$query = "INSERT INTO `fooditems` (`fooditem`, `foodtype`, `imgpath`, `cost`)
				VALUES ('$itemName', $type, '$imagePath', $cost );";

				$error = "Error inserting new item to database";
				callQuery($pdo, $query, $error);
				// unset button click when finished
				unset($_POST['create2']);
			}


		} // end if admin (add food item)
		// echo '<h2> HELLO! </h2>';
		// SQL select by Restaurant
		$query = "SELECT itemid, fooditem, imgpath, cost FROM fooditems
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
			$itemId = $item['itemid'];
			// format cost variable if set
			if (isset($cost)) { 
				$costStr = "$" . number_format($cost, 2);
			}else{ 
				// otherwise set to a default value
				$costStr = "Cost Here";
			}

			?>
		<!-- Items that will be genereated through a loop from info in the database  -->
		<form action="" method="post" class="itemForm">
		<li><div class="addCart"><input type="submit" value="add" name="addToCart"></div>
		<img src="/images/food/<?php if (!$imgPath == "" ) { echo "$imgPath";}else{ echo "default.png";} ?>">
		<p class="foodItem"><?= $foodItem ?></p> 
		<p class="cost"><?= $costStr ?></p>
		<!-- input element thats value is determined by the selected -->
		<input type="hidden" name="itemId" value="<?= $itemId ?>"></li>
		</form>
		<?php

		}
		
		?> 
		</ul>
		
	<?php 
	if ($id < 0) {
		// if Admin user, display form to add new type
		?>
		<div class="divWrapper">
			<form class="add" action="" method="post">
			<p>New Food item here:</p>
			<label for="itemName">Item: </label>
			<input type="text" name="itemName">
			<label for="itemCost">Cost: </label>
			<input type="text" name="itemCost">
			<label for="imgPath">Image: </label>
			<input type="file" name="imgPath">
			<input type="submit" name="create2" value="create">
			</form>
		</div>
		<?php
	}

	} // end if get is set 
	else {
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
				// if the type is new insert
				$query = "INSERT INTO `foodtypes` (`typeName`)
				VALUES ('$newType');";

				$error = "Error inserting new Restaurant to database";

				callQuery($pdo, $query, $error);
				unset($formClicked);
			}
			


		}

		$query = "SELECT typeid, typeName FROM foodtypes";
		$error = "Error fetching food info";

		$typeResult = callQuery($pdo, $query, $error);

	?>

		<h3>Choose a Restaurant</h3>
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
<div class="addWrapper">
<form class="add" action="" method="post">
<p>New Restaurant here:</p>
<input type="text" name="typeName">
<input type="submit" name="create" value="create">
</form>
</div>


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