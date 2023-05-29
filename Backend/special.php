<?php
  session_start(); 
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $name = $_POST['name'];
    $location = $_POST['location'];
    $facebook = $_POST['facebook'];
    $website = $_POST['website-url'];
    $video = $_POST['video-url'];
    $gmail = $_POST['gmail'];
  
  
    $_SESSION['name'] = $name;
    $_SESSION['location'] = $location;
    $_SESSION['facebook'] = $facebook;
    $_SESSION['website'] = $website;
    $_SESSION['video'] = $video;
    $_SESSION['gmail'] = $gmail;
  
   
    header('Location: ./bank-card-special.php');
    exit(); 
  }
  ?>





