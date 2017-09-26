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
	<thead><h2 style="color: moccasin">Report</h2>
      <tr>
        <th>SID</th>
        <th>STATUS</th>
        <th>SUBID</th>
        <th>DATE</th>
      </tr>
    </thead>
    <tbody>
    	<?php
$sql =<<<EOF
      SELECT * from att;
EOF;

$ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   	echo "<tr>";
   	echo "<td>".$row['sid']."</td>";
   	echo "<td>".$row['status']."</td>";
   	echo "<td>".$row['subid']."</td>";
   	echo "<td>".$row['date']."</td>";
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