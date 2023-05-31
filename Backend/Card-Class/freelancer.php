<?php
  session_start(); 
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $name = $_POST['name'];
    $linkedin = $_POST['linkedin-profile'];
    $github = $_POST['github'];
    $resume = $_POST['resume-url'];
    $website = $_POST['website-url'];
    $gmail = $_POST['gmail'];
  
  
    $_SESSION['name'] = $name;
    $_SESSION['linkedin'] = $linkedin;
    $_SESSION['github'] = $github;
    $_SESSION['resume'] = $resume;
    $_SESSION['website'] = $website;
    $_SESSION['gmail'] = $gmail;
  
   
    header('Location: ../Bank-Card/bank-card-freelancer.php');
    exit(); 
  }
  ?>
