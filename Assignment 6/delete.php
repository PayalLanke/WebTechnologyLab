<?php
include 'config/db.php';

$conn->query("DELETE FROM employees WHERE id=".$_GET['id']);

header("Location: admin/employees.php");