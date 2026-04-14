<?php
include('../config/db.php');
include('layout.php');

/* ADD */
if(isset($_POST['add'])){
 $name = $_POST['name'];
 $conn->query("INSERT INTO departments(name) VALUES('$name')");
}

/* FETCH */
$res = $conn->query("SELECT * FROM departments");
?>

<div class="main">

<h2>Departments</h2>

<div class="form-box">
<form method="POST">
<input type="text" name="name" placeholder="Department Name" required>
<button name="add" class="btn add">Add Department</button>
</form>
</div>

<div class="table-container">

<table>
<tr>
<th>ID</th>
<th>Name</th>
</tr>

<?php while($row = $res->fetch_assoc()){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
</tr>
<?php } ?>

</table>

</div>

</div>

<?php include('footer.php'); ?>