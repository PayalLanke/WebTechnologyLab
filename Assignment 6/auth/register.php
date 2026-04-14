<?php
include('../config/db.php');

if(isset($_POST['register'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 $role = $_POST['role'];

 $conn->query("INSERT INTO users(name,email,password,role)
 VALUES('$name','$email','$password','$role')");

 header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="../assets/style.css">
</head>

<body class="auth-body">

<div class="auth-container">

<h2>Register</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<select name="role" required>
<option value="">Select Role</option>
<option value="admin">Admin</option>
<option value="employee">Employee</option>
</select>

<button name="register" class="btn add">Register</button>

</form>

</div>

</body>
</html>