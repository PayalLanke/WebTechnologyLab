<?php
include('../config/db.php');

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=employees.xls");

$result = $conn->query("SELECT * FROM employees");

echo "ID\tName\tEmail\tDepartment\tSalary\n";

while($row = $result->fetch_assoc()){
 echo "{$row['id']}\t{$row['name']}\t{$row['email']}\t{$row['department']}\t{$row['salary']}\n";
}
?>