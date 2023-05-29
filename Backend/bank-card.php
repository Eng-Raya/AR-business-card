<?php
session_start(); // Start the session


$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$location = isset($_SESSION['location']) ? $_SESSION['location'] : '';
$facebook = isset($_SESSION['facebook']) ? $_SESSION['facebook'] : '';
$website = isset($_SESSION['website']) ? $_SESSION['website'] : '';
$gmail = isset($_SESSION['gmail']) ? $_SESSION['gmail'] : '';


unset($_SESSION['name']);
unset($_SESSION['location']);
unset($_SESSION['facebook']);
unset($_SESSION['website']);
unset($_SESSION['gmail']);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bank Card Information</title>
</head>
<body>
  <h1>Bank Card Information</h1>
  <form id="bank-card-form" action="./process-card.php" method="post">
    <label for="card-number">Card Number:</label>
    <input type="text" id="card-number" name="card-number" required>
    <br>
    <label for="expiration-date">Expiration Date:</label>
    <input type="text" id="expiration-date" name="expiration-date" required>
    <br>
    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required>
    <br>

    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="location" value="<?php echo $location; ?>">
    <input type="hidden" name="facebook" value="<?php echo $facebook; ?>">
    <input type="hidden" name="website-url" value="<?php echo $website; ?>">
    <input type="hidden" name="gmail" value="<?php echo $gmail; ?>">
    <button type="submit">Submit</button>
  </form>
</body>
</html>
