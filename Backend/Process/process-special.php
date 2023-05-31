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
  $video = $_POST['video-url'];
  $gmail = $_POST['gmail'];


  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db_name = "CustomerDB";  
  $conn = new mysqli($servername, $username, $password, $db_name, 3306);
  if($conn->connect_error){
      die("Connection failed".$conn->connect_error);
  }
  echo "";

    
    $sql = "INSERT INTO special (name,location,facebook,website,video,gmail)
    VALUES ('$name','$location','$facebook','$website','$video','$gmail')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    
    header('Location: ../success.php');
    exit();
  } else {
    
    header('Location: ../error.php');
    exit(); 
  }

?>
