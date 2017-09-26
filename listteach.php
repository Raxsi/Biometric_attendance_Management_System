<?php
include('header.php');
require('db connect.php');

?>

<html>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="location.href='home.php';" >Back</button><br/>
<div class="container">
<div class="table-responsive">

<table class="table table-bordered">
	<thead><h3>Teacher list</h3>
      <tr>
        <th>ID</th>
        <th>NAME</th>
      </tr>
    </thead>
    <tbody>
    	<?php
$sql =<<<EOF
      SELECT * from teacher_table;
EOF;

$ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   	echo "<tr>";
   	echo "<td>".$row['teacher_id']."</td>";
   	echo "<td>".$row['teacher_name']."</td>";
   
   	echo "</tr>";
}
?>
    </tbody>
</table>

</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>