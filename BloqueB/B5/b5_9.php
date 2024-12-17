<?php
$logged_in = false;

if ($logged_in == false) {
    header('Location: login.php');
    exit;
}
?>
<?php include 'recursos/includes/header.php'; ?>
  <h1>Members Area</h1>
  <p>Welcome to the members area</p>
<?php include 'recursos/includes/footer.php'; ?>