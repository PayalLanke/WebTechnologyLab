<?php
include('../config/db.php');
include('layout.php');

/* AUTO EMPLOYEE ID */
$eid = "EMP" . rand(1000,9999);

/* FETCH DEPARTMENTS */
$dept_res = $conn->query("SELECT * FROM departments");

if(isset($_POST['save'])){

 $emp_id = $_POST['emp_id'];
 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $department = $_POST['department'];
 $position = $_POST['position'];
 $salary = $_POST['salary'];
 $joining_date = $_POST['joining_date'];

 $photo="";
 if($_FILES['photo']['name']){
  $photo=time().$_FILES['photo']['name'];
  move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/".$photo);
 }

 $conn->query("INSERT INTO employees(emp_id,name,gender,department,position,salary,joining_date,photo)
 VALUES('$emp_id','$name','$gender','$department','$position','$salary','$joining_date','$photo')");

 echo "<script>alert('Employee Added');window.location='employees.php';</script>";
}
?>

<div class="main">

<h2>Add Employee</h2>

<div class="form-container">

<form method="POST" enctype="multipart/form-data" id="multiForm">

<!-- STEP 1 -->
<div class="form-step active">

<div class="floating-group">
<input type="text" name="emp_id" value="<?= $eid ?>" readonly>
<label>Employee ID</label>
</div>

<div class="floating-group">
<input type="text" name="name" required>
<label>Full Name</label>
</div>

<div class="floating-group">
<select name="gender" required>
<option value=""></option>
<option>Male</option>
<option>Female</option>
</select>
<label>Gender</label>
</div>

<div class="floating-group">
<select name="department" required>
<option value=""></option>
<?php while($d=$dept_res->fetch_assoc()){ ?>
<option><?= $d['name'] ?></option>
<?php } ?>
</select>
<label>Department</label>
</div>

<button type="button" class="btn add" onclick="nextStep()">Next</button>

</div>

<!-- STEP 2 -->
<div class="form-step">

<div class="floating-group">
<input type="text" name="position" required>
<label>Position</label>
</div>

<div class="floating-group">
<input type="number" name="salary" required>
<label>Salary</label>
</div>

<div class="floating-group">
<input type="date" name="joining_date" required>
<label>Joining Date</label>
</div>

<input type="file" name="photo" id="photo">

<img id="preview" class="preview-img">

<div style="display:flex; gap:10px;">
<button type="button" class="btn edit" onclick="prevStep()">Back</button>
<button name="save" class="btn add">Save Employee</button>
</div>

</div>

</form>

</div>

</div>

<!-- JS -->
<script>
let step = 0;
const steps = document.querySelectorAll(".form-step");

function showStep(){
 steps.forEach((s,i)=>s.style.display = i===step ? "block":"none");
}
showStep();

function nextStep(){
 step++;
 showStep();
}

function prevStep(){
 step--;
 showStep();
}

/* IMAGE PREVIEW */
document.getElementById("photo").onchange=function(e){
 let reader=new FileReader();
 reader.onload=function(){
  let img=document.getElementById("preview");
  img.src=reader.result;
  img.style.display="block";
 }
 reader.readAsDataURL(e.target.files[0]);
}
</script>

<?php include('footer.php'); ?>