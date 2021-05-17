<html>

<head>
	<title>Desk Dash</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body class="pageBody">
	<?php
	require('header.php');
	?>
	<div id="content">

		<main>

			<article class='pizza'>
				<img src="images/pizza.jpeg" id="indexPizza">

				<h2>What is Desk Dash?</h2><br>

				<p>
					Desk Dash is a quick and easy way for you to find and connect with the food you love in a speedy fashion. We partner with local restaurants in order to provide you with menu options you know and enjoy. Order to pick up or have it delivered right to you!
					<br><br>
					Still want to know more? ~ Check out our About page! 
				</p>
			</article>

			<article>
				<img src="images/busyStudents.jpeg" id="students">

				<h2>Why Desk Dash you ask?</h2><br>

				<p>
					We know how busy you are with classes and the seemingly unending barrage of papers to be typed and read, so why should your next food choice be another point of stress? We are here to make food simple and easy for you, so your energy can go where you need it. 
					<br><br>
					Don't stress, call a Dasher!
					<br><br> 
					They are the best at what they do ~ For more info, check out our Dasherz page!
				</p>
			</article>

			<article>
				<img src="images/multiDevices.jpeg" id="multiDevices">

				<h2>How does the magic happen?</h2><br>

				<p>
					It's as easy as 1..2..3:
					<br>
					<br>1) Click on the order tab 
					<br>2) Select your food choice(s)
					<br>3) Let us know if you would like pick up or delivery  
				</p>
			</article>
		
			<section id="bottomContent">
				<h2 id="favText">Student Favorites</h2>

				<div class="favCollection">

					<div id="favOne" class="row">
						<a href="https://www.ramonesicecream.com/"><img src="images/ramones.png" id="localStore_0"></a>
					</div>

					<div id="favTwo" class="row">
						<a href="http://akamesushiwi.com/default.aspx.htm"><img src="images/akame.png" id="localStore_1"></a>
					</div>

					<div id="favThree" class="row">
						<a href="https://www.mcdonalds.com/us/en-us.html"><img src="images/maccas.png" id="localStore_2"></a>
					</div>
				</div>


				<h2 id="utilizeText">Utilize Desk Dash</h2>

				<div class="utilityCollection"> 

					<div class="row2">
						<img src="images/appImage_.png" id="appImage">
						<h1>Desk Dash App!</h1>
					</div>

					<div class="row2">
					<a  href="dasherzContact.php"><img src="images/dasherz.png" id="dasherzImage"></a>
						<h1>Join the Dasherz!</h1>
					</div>

					<div class="row2">
						<img src="images/parter.png" id="expandImage">
						<h1>Collab with us!</h1>
					</div>

				</section>

		</main>

	</div>
	<?php
	require('footer.php');
	?>
</body>

</html>