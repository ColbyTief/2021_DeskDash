<html>
<head class="pageHeader">
<title>Contact Us!</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/dasherzContact.css">
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

require ('functions.php');

// Include the code to connect to our DB and login to it.
require ('dbConnect.php');

?>

<div id="content">

  <h1 id="contactUs">Join the Dasherz </h1>

  <article>
        <a><img src="images/running.png" id="dash"></a>
        <h2 id="textTitle">Make use of your Skills by joining our Fantastic Team of Dasherz!</h2><br>

    <br>

    <p>
    Join the team! Becoming a dasher is safe, fun and easy! Apply by using the form below!
    </p>

    <br>

    <h3 id="team">Join the Team!</h3>
  </article>

  <h1 id="shoutTitle">Apply Today!</h1>
  <div id="formGroup">
    <div id="left_img"> </div>

    <div id="conForm" class="myform">

      <form id="form1" id="form1" action="" method="POST">

        <label>Name
          <span class="small">Add your name</span>
        </label>
        <input name="text" name="name">
        <label>Email
          <span class="small">Enter a Valid Email</span>
        </label>
        <input name="text" name="email">
        <label>Phone
          <span class="small">Add a Phone Number</span>
        </label>
        <input name="text" name="phone">

        <br>
        <br>

        <label>State
          <span class="small">State  </span>
        </label>

        <select name="State" size="1" id="state">
          <option value="Wisconsin">Wisconsin</option>
          <option value="Minnesota">Minnesota</option>
          <option value="Michigan">Michigan</option>
        </select>
        <br>
        <br>
        <br>

        <script src="js/dropdown.js"></script>

        <label>City
          <span class="small">Desired City</span>
        </label>

        <select name="City" size="1" id="city">
          <option value="Eau Claire">Eau Claire</option>
          <option value="Madison">Madison</option>
          <option value="Superior">Superior</option>
          <option value="Milwaukee">Milwaukee</option>
          <option value="Ashland">Ashland</option>
        </select>
        <br />
        <br />
        <br />


        <label>Comments
          <span class="small">Type Your Comments</span>
        </label>
        <textarea name="Comments" rows="6" cols="25"></textarea><br />

        <button name="submit" value="Send" style="margin-top:15px;">Submit</button>
        <div class="spacer"></div>


<?php


$name = sanitizeString(INPUT_POST, 'name');
$newContactFormSubmit = sanitizeString(INPUT_POST, 'Send');

//Check if submitted name is valid
if (!empty(trim($name)) && $name != "City") {

  //Check if submitted email is valid
  $email = sanitizeString(INPUT_POST, 'email');

  if (!empty(trim($email))) {

  $phone = sanitizeString(INPUT_POST, 'phone');

  $State = sanitizeString(INPUT_POST, 'State');
  $City = sanitizeString(INPUT_POST, 'City');
  
  $Comments = sanitizeString(INPUT_POST, 'Comments');

  //Replace any single quotes in our variables with an escaped single quote so our query does not fail. 
  $name = str_replace("'", "\\'", $name);
  $email = str_replace("'", "\\'", $email);
  $phone = str_replace("'", "\\'", $phone);
  $Comments = str_replace("'", "\\'", $Comments);

  //Check if new username already exists in our DB
  $query = "SELECT COUNT(username) 
            FROM dashapp
            WHERE username = '$name'";

    $errorMsg = "Error fetching username";

    $numusernames = callQuery($pdo, $query, $errorMsg)->fetchColumn();

      //Check if new email already exists in our DB
      $query = "SELECT COUNT(email) 
                FROM dashapp
                WHERE email = '$email'";

      $errorMsg_1 = "Error fetching email";

      $numemails = callQuery($pdo, $query, $errorMsg_1)->fetchColumn();

            //Check if new phone already exists in our DB
      $query = "SELECT COUNT(phone) 
                FROM dashapp
                WHERE phone = '$phone'";

      $errorMsg_2 = "Error fetching phone";

    $numphonenums = callQuery($pdo, $query, $errorMsg_2)->fetchColumn();

    //Did we find the new username, email or phone in our dashapp table?
    if(!$numusernames && !$numemails && !$numphonenums) { //new username, email and phone was NOT found, so add it.
      echo "<h3 style=\"color: #fff;\">New username $name, $phone, $email added</h3>\n";

      //Now that we know we want to add a new user, email and phone, 
      //check if the new Comments already exists in our DB.
      $query = "SELECT COUNT(*) 
      FROM dashapp
      WHERE comments = '$Comments'";

      $errorMsg = "Error fetching Comments";

      $numCommentsRows = callQuery($pdo, $query, $errorMsg)->fetchColumn();

      //Did we find the input Comments?
      if(!$numCommentsRows) {
        //New Comment was not found, so add it and our other values.
        try {
          $pdo->beginTransaction();

        $s = $pdo->prepare("INSERT INTO dashapp (username, email, phone, State, City, contactComments) VALUES(?, ?, ?, ?, ?, ?, ?)");

          //Execute the query (prepared statement) and then commit the transaction.

          $s-> execute([$name, $email, $phone, $State, $City, $Comments]);

          $pdo->commit();

        } catch (PDOException $ex) {

          //In case of an error, roll back the commit.
          $pdo->rollBack();

          $error = 'Error performing insert of Comments: ';
          $ex->getComments();
          include 'error.html.php';
          throw $ex;
        }

      } else { //New Comments IS a duplicate - DON'T add it. 
        echo "<h3 style=\"color: #fff;\">This Comments already exists - not added</h3>\n";
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