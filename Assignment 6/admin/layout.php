<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>HRMS</title>

<!-- CSS -->
<link rel="stylesheet" href="/employee-management/assets/style.css">

<!-- ICONS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
<h2>HRMS</h2>

<a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
<a href="employees.php"><i class="fa fa-users"></i> Employees</a>
<a href="departments.php"><i class="fa fa-building"></i> Departments</a>
<a href="attendance.php"><i class="fa fa-calendar"></i> Attendance</a>
<a href="leaves.php"><i class="fa fa-file"></i> Leaves</a>
</div>

<!-- ===== TOPBAR ===== -->
<div class="topbar">

<!-- 🔔 NOTIFICATION -->
<div class="notification-box" onclick="toggleNotif()">
 <i class="fa fa-bell"></i>
 <span class="notify">3</span>

 <div id="notifDropdown" class="notif-dropdown">
   <p>🆕 New employee added</p>
   <p>📅 Attendance marked</p>
   <p>📝 Leave request pending</p>
 </div>
</div>

<!-- RIGHT SIDE -->
<div style="display:flex; gap:10px; align-items:center;">

<button onclick="toggleDark()" class="btn view">
<i class="fa fa-moon"></i>
</button>

<a href="../auth/logout.php" class="btn delete">
<i class="fa fa-sign-out"></i> Logout
</a>

</div>

</div>

<!-- ===== JS (FAST & CLEAN) ===== -->
<script>

/* DARK MODE (FAST) */
function toggleDark(){
 document.body.classList.toggle("dark");
 localStorage.setItem("theme",
  document.body.classList.contains("dark") ? "dark" : "light"
 );
}

/* LOAD SAVED THEME */
document.addEventListener("DOMContentLoaded", function(){
 if(localStorage.getItem("theme") === "dark"){
   document.body.classList.add("dark");
 }
});

/* NOTIFICATION DROPDOWN */
function toggleNotif(){
 let box = document.getElementById("notifDropdown");
 box.style.display = (box.style.display === "block") ? "none" : "block";
}

/* CLOSE DROPDOWN OUTSIDE CLICK */
document.addEventListener("click", function(e){
 let notif = document.querySelector(".notification-box");
 let dropdown = document.getElementById("notifDropdown");

 if(notif && !notif.contains(e.target)){
   dropdown.style.display = "none";
 }
});

</script>

</body>
</html>