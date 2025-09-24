<?php
session_start();
include('db.php');

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";



 
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = trim($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and spaces allowed in Name";
    }
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
  
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }





  if (empty($nameErr) && empty($emailErr) && empty($genderErr) ) {

    
    $stmt =$conn->prepare("INSERT INTO users (name, email, gender) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $gender);

    if ($stmt->execute()) {
      $_SESSION['message'] = "Form submitted successfully!";
    } else {
      $_SESSION['error'] = "Error saving to database.";
    }

    $stmt->close();
    header("Location: form.php"); 

  } else {
   
    $_SESSION['nameErr'] = $nameErr;
    $_SESSION['emailErr'] = $emailErr;
    $_SESSION['genderErr'] = $genderErr;
    header("Location: form.php");
  }

  $conn->close();

?>
