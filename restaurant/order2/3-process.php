<?php
// (A) PROCESS RESULT
$result = "";

// (B) CONNECT TO DATABASE
// CHANGE DATABASE SETTINGS TO YOUR OWN!
$dbhost = "localhost";
$dbname = "test";
$dbchar = "utf8";
$dbuser = "root";
$dbpass = "";
try {
  $pdo = new PDO(
    "mysql:host=$dbhost;dbname=$dbname;charset=$dbchar",
    $dbuser, $dbpass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { $result = $ex->getMessage(); }

// (C) SAVE ORDER TO DATABASE
if ($result=="") {
  try {
    $stmt = $pdo->prepare(
      "INSERT INTO `orders` (`name`, `email`, `tel`, `qty`, `Food_Name`, `notes`) VALUES (?,?,?,?,?,?)"
    );
    $stmt->execute([
      $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['qty'], $_POST['Food_Name'],$_POST['notes']
    ]);
  } catch (Exception $ex) { $result = $ex->getMessage(); }
}

// (D) SEND ORDER VIA EMAIL
if ($result=="") {
  $to = "sheikhabujubayer@gmail.com"; // CHANGE TO YOUR OWN!
  $subject = "ORDER RECEIVED";
  $message = "";
  foreach ($_POST as $k=>$v) { $message .= "$k - $v\r\n"; }
  // if (!@mail($to, $subject, $message)) { $result = "Error sending mail!"; }
}