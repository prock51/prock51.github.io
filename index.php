<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'information';

$OTHER = [];
$content = '';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno() ) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($stmt = $con->prepare('SELECT to_id, from_id, time_sent, subject, message, opened, recipient_delete, sender_delete FROM messages WHERE to_id = ? OR from_id = ?')) {
  $stmt->bind_param('ii', $_SESSION['id'], $_SESSION['id']);
  $stmt->execute();
  
  $stmt->bind_result($to_id, $from_id, $time_sent, $subject, $message, $opened, $recipient_delete, $sender_delete);
  
  while ($stmt->fetch()) {
    if ($to_id == $_SESSION['id']) {
      $content += '<div class="container-darker"><img src="<?=$_OTHER['avatar']?>" alt="avatar">
      <div class="container-darker">
        <img src="<?=$_OTHER['avatar']?>" alt="avatar">
        <p>Hello, world, again!</p>
        <span class="time-left">12:01pm</span>
      </div>
    } else if ($from_id == $_SESSION['id']) {
      <div class="container">
        <img src="<?=$_SESSION['avatar']?>" alt="avatar">
        <p>Hello, world!</p>
        <span class="time-right">12:00pm</span>
      </div>
    }
  }
  
  $stmt->close();
}

?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <div class="container">
      <img src="<?=$_SESSION['avatar']?>" alt="avatar">
      <p>Hello, world!</p>
      <span class="time-right">12:00pm</span>
    </div>
    <div class="container-darker">
      <img src="<?=$_OTHER['avatar']?>" alt="avatar">
      <p>Hello, world, again!</p>
      <span class="time-left">12:01pm</span>
    </div>
  </body>
</html>
