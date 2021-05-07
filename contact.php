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

require ('sanitize.php');

// Include the code to connect to our DB and login to it.
require ('dbConnect_2.php');

// Run the passed-in query returning a result set (PDOStatement
// object) on success or generate an error and/or exit.  This 
// function will also return a PDOStatement object (the result set).
function callQuery($pdo, $query, $error) {

try {

  return $pdo->query($query);

} catch (PDOException $ex) {

  $error .= $ex->getMessage();
  throw $ex;

}

}

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

      <form id="form1" id="form1" action="" method="POST">

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


<?php
$name = sanitizeString(INPUT_POST, 'name');
$newContactFormSubmit = sanitizeString(INPUT_POST, 'Send');

//Check if submitted name is valid
if (!empty(trim($name)) && $name != "Add your name") {

  //Check if submitted email is valid
  $email = sanitizeString(INPUT_POST, 'email');

  if (!empty(trim($email))) {

  $phone = sanitizeString(INPUT_POST, 'phone');
  $website = sanitizeString(INPUT_POST, 'website');

  $priority = sanitizeString(INPUT_POST, 'priority');
  $type = sanitizeString(INPUT_POST, 'type');
  
  $message = sanitizeString(INPUT_POST, 'message');

  //Replace any single quotes in our variables with an escaped single quote so our query does not fail. 
  $name = str_replace("'", "\\'", $name);
  $email = str_replace("'", "\\'", $email);
  $phone = str_replace("'", "\\'", $phone);
  $website = str_replace("'", "\\'", $website);
  $message = str_replace("'", "\\'", $message);

  //Check if new username already exists in our DB
  $query = "SELECT COUNT(username) 
            FROM inquiries
            WHERE username = '$name'";

    $errorMsg = "Error fetching username";

    $numusernames = callQuery($pdo, $query, $errorMsg)->fetchColumn();

      //Check if new email already exists in our DB
      $query = "SELECT COUNT(email) 
                FROM inquiries
                WHERE email = '$email'";

      $errorMsg_1 = "Error fetching email";

      $numemails = callQuery($pdo, $query, $errorMsg_1)->fetchColumn();

            //Check if new phone already exists in our DB
      $query = "SELECT COUNT(phone) 
                FROM inquiries
                WHERE phone = '$phone'";

      $errorMsg_2 = "Error fetching phone";

    $numphonenums = callQuery($pdo, $query, $errorMsg_2)->fetchColumn();

    //Did we find the new username, email or phone in our inquiries table?
    if(!$numusernames && !$numemails && !$numphonenums) { //new username, email and phone was NOT found, so add it.
      echo "<h3 style=\"color: #fff;\">New username $name, $phone, $email added</h3>\n";

      //Now that we know we want to add a new user, email and phone, 
      //check if the new message already exists in our DB.
      $query = "SELECT COUNT(*) 
      FROM inquiries
      WHERE contactmessage = '$message'";

      $errorMsg = "Error fetching contact message";

      $numMessageRows = callQuery($pdo, $query, $errorMsg)->fetchColumn();

      //Did we find the input message?
      if(!$numMessageRows) {
        //New message was not found, so add it and our other values.
        try {
          $pdo->beginTransaction();

        $s = $pdo->prepare("INSERT INTO inquiries (username, email, phone, website, priority, type, contactmessage) VALUES(?, ?, ?, ?, ?, ?, ?)");

          //Execute the query (prepared statement) and then commit the transaction.

          $s-> execute([$name, $email, $phone, $website, $priority, $type, $message]);

          $pdo->commit();

        } catch (PDOException $ex) {

          //In case of an error, roll back the commit.
          $pdo->rollBack();

          $error = 'Error performing insert of message: ';
          $ex->getMessage();
          include 'error.html.php';
          throw $ex;
        }

      } else { //New message IS a duplicate - DON'T add it. 
        echo "<h3 style=\"color: #fff;\">This message already exists - not added</h3>\n";
      }


    } else { //The new inquiry IS a duplicate - DON'T add it.
      echo "<h3 style=\"color: #fff;\">New inquiry already exists - not added</h3>\n";
    }

  } else if (isset($newContactFormSubmit)) {
    echo "<h3>No valid new email was entered</h3>\n";
  }

} else if (isset($newContactFormSubmit)) {
  echo "<h3>No valid new username was entered</h3>\n";
}
?>

      </form>

    </div> <!-- end of form class -->
  </div>

</div> <!-- end of content div -->

<?php
require('footer.php');
?>

</body>
</html>