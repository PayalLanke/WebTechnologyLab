<?php
session_start();
include('../config/db.php');

if(isset($_POST['login'])){
 $email=$_POST['email'];
 $password=$_POST['password'];
 $role=$_POST['role'];

 $res=$conn->query("SELECT * FROM users WHERE email='$email' AND role='$role'");

 if($res->num_rows>0){
  $user=$res->fetch_assoc();

  if(password_verify($password,$user['password'])){
   $_SESSION['user']=$user;

   if($role=='admin'){
    header("Location: ../admin/dashboard.php");
   } else {
    header("Location: ../employee/dashboard.php");
   }
  } else {
   echo "<script>alert('Wrong Password')</script>";
  }
 } else {
  echo "<script>alert('User Not Found')</script>";
 }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/employee-management/assets/style.css">
</head>

<body>

<div class="login-page">

<div class="login-box">
<h2>Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<select name="role" required>
<option value="">Select Role</option>
<option value="admin">Admin</option>
<option value="employee">Employee</option>
</select>

<button name="login" class="btn add">Login</button>

</form>

</div>

</div>

</body>
</html>