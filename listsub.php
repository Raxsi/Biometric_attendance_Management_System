<?php
include('header.php');
require('db connect.php');

?>

<html>
<link href="css/button.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="location.href='home.php';" >Back</button><br/>
<div class="container">
<div class="table-responsive">
<button type="button" class="button button2" onclick="location.href='addsub.php';" >Add</button>
<button type="button" class="button button2" onclick="location.href='delsub.php';" >Delete</button>
<button type="button" class="button button2" onclick="location.href='updatesub.php';" >Edit</button>
<table class="table table-bordered">
	<thead><h3>Subject list</h3>
      <tr>
        <th>SUBID</th>
        <th>SUB_NAME</th>
        <th>TEACHER_ID</th>
        <th>SEM</th>
      </tr>
    </thead>
    <tbody>
    	<?php
$sql =<<<EOF
      SELECT * from subject_table;
EOF;

$ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   	echo "<tr>";
   	echo "<td>".$row['subid']."</td>";
   	echo "<td>".$row['subject_name']."</td>";
   	echo "<td>".$row['teacher_id']."</td>";
   	echo "<td>".$row['semester']."</td>";
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