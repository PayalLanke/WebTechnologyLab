<?php
include('../config/db.php');
include('layout.php');

/* ===== DATA ===== */
$total = $conn->query("SELECT COUNT(*) as c FROM employees")->fetch_assoc()['c'];
$maxSalary = $conn->query("SELECT MAX(salary) as m FROM employees")->fetch_assoc()['m'];
$avgSalary = $conn->query("SELECT AVG(salary) as a FROM employees")->fetch_assoc()['a'];

/* ===== RECENT EMPLOYEES ===== */
$recent = $conn->query("SELECT name, position FROM employees ORDER BY id DESC LIMIT 5");

/* ===== QUICK INSIGHTS ===== */
$top = $conn->query("SELECT name, salary FROM employees ORDER BY salary DESC LIMIT 3");

$latest = $conn->query("SELECT name, position FROM employees ORDER BY id DESC LIMIT 1")->fetch_assoc();

$deptCount = $conn->query("SELECT COUNT(*) as c FROM departments")->fetch_assoc()['c'];
?>

<div class="main">

<h2>Dashboard</h2>

<!-- ===== TOP CARDS ===== -->
<div class="cards">

<div class="card dashboard-card blue">
<i class="fa fa-users"></i>
<div>
<h3>Total Employees</h3>
<p><?= $total ?></p>
</div>
</div>

<div class="card dashboard-card green">
<i class="fa fa-indian-rupee-sign"></i>
<div>
<h3>Highest Salary</h3>
<p>₹<?= $maxSalary ?></p>
</div>
</div>

<div class="card dashboard-card purple">
<i class="fa fa-chart-line"></i>
<div>
<h3>Average Salary</h3>
<p>₹<?= round($avgSalary) ?></p>
</div>
</div>

</div>

<!-- ===== MAIN GRID ===== -->
<div class="dashboard-grid">

<!-- ===== QUICK INSIGHTS ===== -->
<div class="card">

<h3>Quick Insights</h3>

<div class="insight-box">

<h4>🏆 Top Salaries</h4>
<ul>
<?php while($t=$top->fetch_assoc()){ ?>
<li><?= $t['name'] ?> - ₹<?= $t['salary'] ?></li>
<?php } ?>
</ul>

<h4>🆕 Latest Employee</h4>
<p><?= $latest['name'] ?> (<?= $latest['position'] ?>)</p>

<h4>🏢 Departments</h4>
<p><?= $deptCount ?> Departments</p>

</div>

</div>

<!-- ===== RECENT ACTIVITY ===== -->
<div class="card">

<h3>Recent Activity</h3>

<ul class="activity-list">
<?php while($r=$recent->fetch_assoc()){ ?>
<li>
<strong><?= $r['name'] ?></strong> joined as 
<span><?= $r['position'] ?></span>
<br>
<small>Recently Added</small>
</li>
<?php } ?>
</ul>

</div>

</div>

</div>

<?php include('footer.php'); ?>