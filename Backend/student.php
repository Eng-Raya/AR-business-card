<?php
  session_start(); 
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $name = $_POST['name'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $resume = $_POST['resume-url'];
    $gmail = $_POST['gmail'];
  
  
    $_SESSION['name'] = $name;
    $_SESSION['linkedin'] = $linkedin;
    $_SESSION['github'] = $github;
    $_SESSION['resume'] = $resume;
    $_SESSION['gmail'] = $gmail;
  
   
    header('Location: ./bank-card-student.php');
    exit(); 
  }
  ?>





 