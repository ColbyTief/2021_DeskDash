<?php

function sanitizeString($type, $field) {
  return filter_input($type, $field, FILTER_SANITIZE_STRING);
}

function callQuery($pdo, $query, $error) {

  try {
    return $pdo->query($query);
  } catch (PDOException $ex) {

    $error .= $ex->getMessage();
    echo $error;
    throw $ex;
    //exit();

  }

}