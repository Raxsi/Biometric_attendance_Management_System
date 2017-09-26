<?php
include('header.php'); 

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
 <!-- Custom styles for this template -->
  </head>

  <body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="location.href='home.php';" >Back</button>
    <div class="container" >
        
        <div class="form-group">
            
        <h2 class="form-heading" style="font-size: 40px;color: white">Search</h2>
        <form method="post" action="rp_single.php"> 
            <div class="col-sm-3 col-sm-offset-2">
        <a><label for="usn">USN</label> </a>
            <input type="textarea" class="form-control" id="usn" placeholder="usn" name="usn" required>
       <a><label for="frmdate">FromDate</label> </a>
            <input type="textarea" class="form-control" id="frmdate" placeholder="frmdate" name="frmdate" required>
       <a><label for="todate">ToDate</label> </a>
            <input type="textarea" class="form-control" id="todate" placeholder="todate" name="todate" required>
             <br />
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
            </form>
            </div>
            </div> <br />
            <?php include('footer.php'); ?>
            </body>
            </html>