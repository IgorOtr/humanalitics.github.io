<?php

$db_user = "root";
$db_password = "";
$db_host = "localhost";
$db_name = "humanalitics_db";

try {
    $conn = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }