<?php
session_start();
include('../config/db.php');

if(isset($_POST['apply'])){
 $name = $_SESSION['user']['name'];
 $reason = $_POST['reason'];

 $conn->query("INSERT INTO leaves(emp_name,reason) VALUES('$name','$reason')");
}
?>

<link rel="stylesheet" href="/employee-management/assets/style.css">

<div class="main">

<h2>Apply Leave</h2>

<div class="form-box">

<form method="POST">

<textarea name="reason" placeholder="Enter Reason" required></textarea>

<button name="apply" class="btn add">Apply Leave</button>

</form>

</div>

</div>