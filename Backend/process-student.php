<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  print_r($_POST);
  $cardNumber = $_POST['card-number'];
  $expirationDate = $_POST['expiration-date'];
  $cvv = $_POST['cvv'];
  $name = $_POST['name'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $resume = $_POST['resume'];
    $gmail = $_POST['gmail'];
  // Perform bank card validation logic here

  // If the card information is correct, proceed with database insertion

    // Retrieve the previously submitted form data
    

    // Create a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "CustomerDB";  
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";


    // Insert the data into the database
    $sql = "INSERT INTO student (name,linkedin_profile,github,resume,gmail)
    VALUES ('$name','$linkedin','$github','$resume','$gmail')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Redirect the user to a success page
    
    header('Location: ./success.php');
    exit(); // Make sure to exit after redirecting
  } else {
    // Card information is incorrect, redirect the user to an error page
    header('Location: ./error.php');
    exit(); // Make sure to exit after redirecting
  }

?>
