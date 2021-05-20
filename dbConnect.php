<?php
/*
1. Connect to the DB Server
2. Select our database
3. Provide account information
4. Check for exceptions
*/
try {

  // Create an instance of the PDO class

  $pdo = new PDO('mysql:host=localhost:3306;dbname=deskdash', 'colby', 'mysql');

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');

} catch (PDOException $ex) {

  $error = 'Unable to connect to the database server<br><br>' . $ex->getMessage();

  if ($closeSelect) {
    echo "</select>";
    $closeSelect = false;
  }

  include 'error.html.php';
  throw $ex;
  //exit();

}