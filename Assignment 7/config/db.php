<?php
$conn = new mysqli("localhost","root","","emp_db");

if($conn->connect_error){
 die("DB Error");
}
?>