<?php
include('../config/db.php');
include('layout.php');

/* ACTION */
if(isset($_GET['approve'])){
 $conn->query("UPDATE leaves SET status='Approved' WHERE id=".$_GET['approve']);
}
if(isset($_GET['reject'])){
 $conn->query("UPDATE leaves SET status='Rejected' WHERE id=".$_GET['reject']);
}

/* FETCH */
$res = $conn->query("SELECT * FROM leaves ORDER BY id DESC");
?>

<div class="main">

<h2>Leave Requests</h2>

<div class="table-container">

<table>
<tr>
<th>Name</th>
<th>Reason</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = $res->fetch_assoc()){ ?>
<tr>
<td><?= $row['emp_name'] ?></td>
<td><?= $row['reason'] ?></td>
<td>
<span class="badge 
<?= strtolower($row['status']) ?>">
<?= $row['status'] ?>
</span>
</td>

<td>
<a href="?approve=<?= $row['id'] ?>" class="btn edit">Approve</a>
<a href="?reject=<?= $row['id'] ?>" class="btn delete">Reject</a>
</td>
</tr>
<?php } ?>

</table>

</div>

</div>

<?php include('footer.php'); ?>