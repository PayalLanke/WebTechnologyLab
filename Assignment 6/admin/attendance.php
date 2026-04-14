<?php
include('../config/db.php');
include('layout.php');

/* MARK */
if(isset($_POST['mark'])){
 $name = $_POST['name'];
 $status = $_POST['status'];

 $conn->query("INSERT INTO attendance(emp_name,date,status)
 VALUES('$name', CURDATE(), '$status')");
}

/* FETCH */
$res = $conn->query("SELECT * FROM attendance ORDER BY id DESC");
?>

<div class="main">

<h2>Attendance</h2>

<div class="form-box">

<form method="POST">

<input type="text" name="name" placeholder="Employee Name" required>

<select name="status">
<option value="Present">Present</option>
<option value="Absent">Absent</option>
</select>

<button name="mark" class="btn add">Mark Attendance</button>

</form>

</div>

<div class="table-container">

<table>
<tr>
<th>Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php while($row = $res->fetch_assoc()){ ?>
<tr>
<td><?= $row['emp_name'] ?></td>
<td><?= $row['date'] ?></td>
<td><?= $row['status'] ?></td>
</tr>
<?php } ?>

</table>

</div>

</div>

<?php include('footer.php'); ?>