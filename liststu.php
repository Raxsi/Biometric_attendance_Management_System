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
<button type="button" class="button button2" onclick="location.href='addstu.php';" >Add</button>
<button type="button" class="button button2" onclick="location.href='delstu.php';" >Delete</button>
<button type="button" class="button button2" onclick="location.href='updatestu.php';" >Edit</button><br/>
<table class="table table-bordered">

	<thead><h3>Student list</h3>
      <tr>
        <th>NAME</th>
        <th>USN</th>
        <th>DOB</th>
        <th>SEM</th>
        <th>PHONE</th>
        <th>EMAIL</th>
      </tr>
    </thead>
    <tbody>
    	<?php
$sql =<<<EOF
      SELECT * from student;
EOF;

$ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   	echo "<tr>";
   	echo "<td>".$row['student_name']."</td>";
   	echo "<td>".$row['usn']."</td>";
   	echo "<td>".$row['dob']."</td>";
   	echo "<td>".$row['Semester']."</td>";
   	echo "<td>".$row['phone']."</td>";
   	echo "<td>".$row['email']."</td>";
   	echo "</tr>";
}
?>
    </tbody>
</table>
</div>
<?php include('footer.php'); ?>
</body>
</html>