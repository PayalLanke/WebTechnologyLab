<?php
include('../config/db.php');
include('layout.php');

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM employees WHERE id=$id");
$row = $res->fetch_assoc();

if(isset($_POST['update'])){
 $name = $_POST['name'];
 $position = $_POST['position'];
 $salary = $_POST['salary'];

 $conn->query("UPDATE employees 
 SET name='$name', position='$position', salary='$salary'
 WHERE id=$id");

 echo "<script>alert('Updated');window.location='employees.php';</script>";
}
?>

<div class="main">

<h2>Edit Employee</h2>

<div class="form-box">

<form method="POST">

<input type="text" value="<?= $row['id'] ?>" disabled>

<input type="text" name="name" value="<?= $row['name'] ?>" required>

<input type="text" name="position" value="<?= $row['position'] ?>" required>

<input type="number" name="salary" value="<?= $row['salary'] ?>" required>

<button name="update" class="btn add">Update</button>

</form>

</div>

</div>

<?php include('footer.php'); ?>