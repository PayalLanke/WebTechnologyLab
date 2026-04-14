<?php
include 'config/db.php';

$id=$_GET['id'];
$res=$conn->query("SELECT * FROM employees WHERE id=$id");
$row=$res->fetch_assoc();

if(isset($_POST['update'])){
$conn->query("UPDATE employees SET
name='$_POST[name]',
position='$_POST[position]',
salary='$_POST[salary]'
WHERE id=$id");

header("Location: admin/employees.php");
}
?>

<form method="POST">
<input value="<?= $row['id'] ?>" disabled>
<input name="name" value="<?= $row['name'] ?>">
<input name="position" value="<?= $row['position'] ?>">
<input name="salary" value="<?= $row['salary'] ?>">
<button name="update">Update</button>
</form>