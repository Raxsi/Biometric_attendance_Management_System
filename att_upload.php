<?php include('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link href="css/signin.css" rel="stylesheet">
</head>
<body style="background-image: url('images/ccc.png');">

<div class="container" style=";margin-top: 130px;"> 
<div class="col-sm-3 col-sm-offset-8">
      <form class="form-signin" action="xls_upload.php" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading" style="color: white;">Upload xls file</h2>
        <input type="file" name = "file[]" multiple="multiple" id="file" class="form-control" placeholder="File" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
    </form>
</div>
</div>
<?php include('footer.php'); ?>
</body>
<script>
$(document).ready(function(){
    $(".btn").click(function(){
        $(this).button('loading');
    });   
});
</script>
</html>