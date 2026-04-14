<?php
session_start();
include('../config/db.php');

$user = $_SESSION['user'];
?>

<link rel="stylesheet" href="/employee-management/assets/style.css">

<div class="sidebar">
<h2>HRMS</h2>
<a href="#">Dashboard</a>
<a href="profile.php">Profile</a>
<a href="leave.php">Leave</a>
<a href="../auth/logout.php">Logout</a>
<a href="leave.php">Apply Leave</a>
</div>

<div class="topbar">
Welcome, <?= $user['name'] ?>
</div>

<div class="main">

<h2>My Dashboard</h2>

<div class="cards">

<div class="card">
<h3>Name</h3>
<p><?= $user['name'] ?></p>
</div>

<div class="card">
<h3>Email</h3>
<p><?= $user['email'] ?></p>
</div>

<div class="card">
<h3>Role</h3>
<p><?= $user['role'] ?></p>
</div>

</div>

</div>