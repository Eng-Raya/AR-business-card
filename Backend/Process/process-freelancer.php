<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  print_r($_POST);
  $cardNumber = $_POST['card-number'];
  $expirationDate = $_POST['expiration-date'];
  $cvv = $_POST['cvv'];
  $name = $_POST['name'];
    $linkedin = $_POST['linkedin-profile'];
    $github = $_POST['github'];
    $resume = $_POST['resume-url'];
    $website = $_POST['website-url'];
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

    // Insert the data into the database
    $sql = "INSERT INTO freelancer (name,linkedin_profile,github,resume,website,gmail)
    VALUES ('$name','$linkedin','$github','$resume','$website','$gmail')";
    

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
