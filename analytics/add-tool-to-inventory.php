<?php
// include database connection file
require_once'dbconfig-carpentry.php';
if(isset($_POST['insert']))
{

// Posted Values  
$rand=$_POST['brand'];
$odel=$_POST['model'];
$escription=$_POST['description'];
$erial=$_POST['serial'];
$isn=$_POST['isbn'];
$agged=$_POST['tagged'];

// Query for Insertion
$sql="INSERT INTO tools(Brand,Model,Description,Serial,Isbn,Tagged) VALUES(:br,:mo,:ds,:se,:in,:tg)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':br',$rand,PDO::PARAM_STR);
$query->bindParam(':mo',$odel,PDO::PARAM_STR);
$query->bindParam(':ds',$escription,PDO::PARAM_STR);
$query->bindParam(':se',$erial,PDO::PARAM_STR);
$query->bindParam(':in',$isn,PDO::PARAM_STR);
$query->bindParam(':tg',$agged,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='tools.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='tools.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using PDO Extension  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<h3><a href="tools.php">Tool Database</a></h3>
<p>Add Tool to Inventory | PHP CRUD Operations using PDO Extension</p>
<hr />
</div>
</div>


<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Brand</b>
<input type="text" name="brand" class="form-control">
</div>
<div class="col-md-4"><b>Model</b>
<input type="text" name="model" class="form-control">
</div>
</div>

<div class="row">
<div class="col-md-4"><b>Description</b>
<input type="text" name="description" class="form-control">
</div>
<div class="col-md-4"><b>Serial</b>
<input type="text" name="serial" class="form-control" maxlength="10">
</div>
</div>  



<div class="row">
<div class="col-md-8"><b>Notes</b>
<input type="text" name="isbn" class="form-control" maxlength="20">
</div>
<div class="col-md-8"><b>Tagged</b>
<input type="text" name="tagged" class="form-control" maxlength="20">
</div>
</div>  

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="insert" value="Submit">
</div>
</div> 
     
</form>
              
</div>
</div>
</body>
</html>
