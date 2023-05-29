<?php
session_start(); 


$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$linkedin = isset($_SESSION['linkedin']) ? $_SESSION['linkedin'] : '';
$github = isset($_SESSION['github']) ? $_SESSION['github'] : '';
$resume = isset($_SESSION['resume']) ? $_SESSION['resume'] : '';
$gmail = isset($_SESSION['gmail']) ? $_SESSION['gmail'] : '';


unset($_SESSION['name']);
unset($_SESSION['linkedin']);
unset($_SESSION['github']);
unset($_SESSION['resume']);
unset($_SESSION['gmail']);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bank Card Information</title>
</head>
<body>
  <h1>Bank Card Information</h1>
  <form id="bank-card-form" action="./process-student.php" method="post">
    <label for="card-number">Card Number:</label>
    <input type="text" id="card-number" name="card-number" required>
    <br>
    <label for="expiration-date">Expiration Date:</label>
    <input type="text" id="expiration-date" name="expiration-date" required>
    <br>
    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required>
    <br>
    <!-- Hidden input fields to pass the company form data -->
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="linkedin" value="<?php echo $linkedin; ?>">
    <input type="hidden" name="github" value="<?php echo $github; ?>">
    <input type="hidden" name="resume" value="<?php echo $resume; ?>">
    <input type="hidden" name="gmail" value="<?php echo $gmail; ?>">
    <button type="submit">Submit</button>
  </form>
</body>
</html>
