<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  print_r($_POST);
  $cardNumber = $_POST['card-number'];
  $expirationDate = $_POST['expiration-date'];
  $cvv = $_POST['cvv'];
$name = $_POST['name'];
    $location = $_POST['location'];
    $facebook = $_POST['facebook'];
    $website = $_POST['website-url'];
    $gmail = $_POST['gmail'];


    // Create a connection to the database
    //Company Process of the Database conaction 
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
    $sql = "INSERT INTO company (name, location, facebook, website, gmail)
            VALUES ('$name', '$location', '$facebook', '$website', '$gmail')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

  
  
    header('Location: ./success.php');
    exit();
  } else {
  
    header('Location: ./error.php');
    exit(); 
  }

?>
