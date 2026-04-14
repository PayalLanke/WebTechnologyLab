<?php
include('../config/db.php');
include('layout.php');

$res=$conn->query("SELECT position,COUNT(*) as total FROM employees GROUP BY position");

$labels=[]; $data=[];
while($r=$res->fetch_assoc()){
 $labels[]=$r['position'];
 $data[]=$r['total'];
}
?>

<div class="main">
<h2>Charts</h2>
<canvas id="chart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chart'),{
 type:'bar',
 data:{
  labels:<?= json_encode($labels) ?>,
  datasets:[{data:<?= json_encode($data) ?>}]
 }
});
</script>

<?php include('footer.php'); ?>