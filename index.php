<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'information';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno() ) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($stmt = $con->prepare('SELECT time_sent, subject, message, opened, recipient_delete, sender_delete FROM messages WHERE to_id = ? OR from_id = ?')) {
  $stmt->bind_param('ii', $_SESSION['id'], $_SESSION['id']);
  $stmt->execute();
  $stmt->store_result();
  
  if ($stmt->num_rows > 0) {
  
  
  $stmt->close();
}

?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <div class="container">
      <img src="<?=$_SESSION['avatar']?>">
      <p>
    </div>
    <div class="container-darker">
      <img src="<?=$_"
    </div>
  </body>
</html>
