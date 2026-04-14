<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['user'])){
 header("Location: ../auth/login.php");
}

$user = $_SESSION['user'];
?>

<link rel="stylesheet" href="/employee-management/assets/style.css">

<div class="main">

<h2>My Profile</h2>

<div class="table-container">

<img src="../uploads/<?= $user['photo'] ?: 'default.png' ?>" class="profile-img" style="width:120px;height:120px;">

<p><b>Name:</b> <?= $user['name'] ?></p>
<p><b>Email:</b> <?= $user['email'] ?></p>
<p><b>Role:</b> <?= $user['role'] ?></p>

</div>

</div>