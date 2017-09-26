<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>KApi</title>
   
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <link rel="stylesheet" href="css/drpdown.css">
    


</head>

<body style="background-image: url('images/ccc.jpg');">
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container-fluid"> 
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">  <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="home.php"><img src="images/logo2.png" width="36" height="32"></a>
         <a class="navbar-brand" href="home.php">KApi</a>  
        </div>    
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav" style="font-size: 17px;"> 
                <li><a href="home.php">Home</a></li>
                <li><a href="report.php">Report</a></li>
                
               <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
           <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance</a>
                            <ul class="dropdown-menu">
            <li><a href="add_att.php">Add</a> </li>
           <li> <a href="att_upload.php">Upload</a></li>
            <li><a href="report_all.php">SEM wise</a> </li>
          <li>  <a href="report_single.php">USN wise</a></li>
            </ul>
            </li>
            <li role="separator" class="divider"></li>
             <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student</a>
                            <ul class="dropdown-menu">
            <li><a href="liststu.php">List</a></li>
            <li><a href="addstu.php">Add</a></li>
            <li><a href="uploadstu.php">Upload</a></li>
            <li><a href="delstu.php">Delete</a></li>
            </ul>
            </li>
            <li role="separator" class="divider"></li>
             <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teacher</a>
                            <ul class="dropdown-menu">
           <li><a href="listteach.php">List</a></li>
            <li><a href="addteach.php">Add</a></li>
            <li><a href="delteach.php">Delete</a></li>
            </ul>
            </li>
             <li role="separator" class="divider"></li>
            <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sublect</a>
                            <ul class="dropdown-menu">
           <li><a href="listsub.php">List</a></li>
            <li><a href="addsub.php">Add</a></li>
            <li><a href="delsub.php">Delete</a></li>
            </ul></li>
            </ul></li>
  			<li><a href="about.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
               <div class="dropdown"> 
 				<li><button class="dropbtn">Administrator </button> </li>
 				 <div class="dropdown-content" style="font-size: 13px">
 				 <li><a href="changepass.php">Change password</a> </li>
  					<li><a href="logout.php">Logout</a> </li>
  					
 				 </div>
				</div>
                 </ul> 
        </div>
    </div>
</nav>
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	</body>
</html>