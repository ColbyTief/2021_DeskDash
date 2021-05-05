<html>
  <head class="pageHeader">
    <title>Contact Us!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/deskDash.css">
    <link rel="stylesheet" href="css/index.css">
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.transform2d.js"></script>
    <script src="js/shopping_cart.js"></script>
  </head>

  <body class="pageBody">

  <?php
	require('header.php');
	?>

    <div id="content">

      <h1 id="contactUs">Contact Us! </h1>

      <article>
        <img src="images/contactImage_2.png" id="contactImg1">

        <h2 id="textTitle">Answering Your Questions</h2><br>

        <p>
          Here at Desk Dash we are dedicated to answering all your inquiries in a timely manner.
          Fill out the contact form below or give us a call!
        </p>

        <br>

        <h3 id="pNum">1-800-DeskDash</h3>
      </article>

      <h1 id="shoutTitle">Give Us a Shout</h1>
      <div id="formGroup">
        <div id="left_img"> </div>

        <div id="conForm" class="myform">

          <form id="form1" id="form1" action="mail.php" method="POST">

            <label>Name
              <span class="small">Add your name</span>
            </label>
            <input type="text" name="name">
            <label>Email
              <span class="small">Enter a Valid Email</span>
            </label>
            <input type="text" name="email">
            <label>Phone
              <span class="small">Add a Phone Number</span>
            </label>
            <input type="text" name="phone">

            <br>
            <br>

            <label>Website
              <span class="small">Your Website</span>
            </label>
            <input type="text" name="website">

            <label>Priority
              <span class="small">Priority Level  </span>
            </label>

            <select name="priority" size="1" >
              <option value="Standard">Standard</option>
              <option value="High">High</option>
              <option value="Very Important">Very Important</option>
            </select>
            <br>
            <br>
            <br>
            <label>Type
              <span class="small">Type of Contact</span>
            </label>
            <select name="type" size="1">
              <option value="restaurant">Restaurant Inquiry</option>
              <option value="account">Account Information</option>
              <option value="general">General Inquiry</option>
              <option value="app">App Service</option>
            </select>
            <br />
            <br />
            <br />


            <label>Message
              <span class="small">Type Your Message</span>
            </label>
            <textarea name="message" rows="6" cols="25"></textarea><br />

            <button type="submit" value="Send" style="margin-top:15px;">Submit</button>
            <div class="spacer"></div>

          </form>

        </div> <!-- end of form class -->
      </div>

    </div> <!-- end of content div -->

	<?php
	require('footer.php');
	?>

  </body>
</html>