<?php session_start(); ?>
<html>
<head>
  <title>Form</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" ></script>
</head>
<body>
  <h2>Register</h2>
  <form action="process.php" method="POST" onsubmit="return confirmSubmit();">
    <input  type="text" name="name" placeholder="Full Name" required>
    <input  type="email" name="email" placeholder="Email" required>
    <select  name="gender" required>
      <option value="">Select Gender</option>
      <option>Male</option>
      <option>Female</option>
    </select>
    <input type="submit" name="submit"/>
    <button type="button"  onclick="clearForm()">Clear</button>
  </form>
</body>
</html>
<?php
if (isset($_SESSION['nameErr'])) {
    echo $_SESSION['nameErr'];
    unset($_SESSION['nameErr']);
}
if (isset($_SESSION['emailErr'])) {
    echo $_SESSION['emailErr'];
    unset($_SESSION['emailErr']);
}
if (isset($_SESSION['genderErr'])) {
    echo $_SESSION['genderErr'];
    unset($_SESSION['genderErr']);
}
?>
