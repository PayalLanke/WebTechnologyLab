<?php
include('../config/db.php');
include('layout.php');

if(isset($_GET['delete'])){
 $conn->query("DELETE FROM employees WHERE id=".$_GET['delete']);
}

$result = $conn->query("SELECT * FROM employees");
?>

<div class="main">

<h2>Employees</h2>

<a href="add_employee.php" class="btn add">+ Add Employee</a>

<input type="text" id="search" placeholder="Search...">

<div class="table-container">

<table>
<tr>
<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Position</th>
<th>Salary</th>
<th>Action</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><img src="../assets/<?= $row['photo'] ?>" class="profile-img"></td>
<td><?= $row['name'] ?></td>
<td><?= $row['position'] ?></td>
<td><?= $row['salary'] ?></td>

<td>
<a href="edit_employee.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
<a href="?delete=<?= $row['id'] ?>" class="btn delete">Delete</a>
</td>

</tr>
<?php } ?>

</table>

</div>

</div>

<script>
document.getElementById("search").addEventListener("keyup", function(){
 let value=this.value.toLowerCase();
 document.querySelectorAll("table tr").forEach((row,i)=>{
  if(i===0) return;
  row.style.display=row.innerText.toLowerCase().includes(value)?"":"none";
 });
});
</script>

<?php include('footer.php'); ?>