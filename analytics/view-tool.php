<?php
// include database connection file
require_once'dbconfig-carpentry.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$rand=$_POST['brand'];
$odel=$_POST['model'];
$escription=$_POST['description'];
$erial=$_POST['serial'];
$isn=$_POST['isbn'];
$agged=$_POST['tagged'];

// Query for Query for Updation
$sql="update books set Brand=:br,Model=:mo,Description=:ds,Serial=:se,Isbn=:in,Tagged=:tg where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':br',$rand,PDO::PARAM_STR);
$query->bindParam(':mo',$odel,PDO::PARAM_STR);
$query->bindParam(':ds',$escription,PDO::PARAM_STR);
$query->bindParam(':se',$erial,PDO::PARAM_STR);
$query->bindParam(':in',$isn,PDO::PARAM_STR);
$query->bindParam(':tg',$agged,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
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
<p>View Tool | PHP CRUDVS Operations using PDO Extension</p>
<hr />
</div>
</div>

<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT Brand,Model,Description,Serial,Isbn,Tagged,PostingDate,id from tools where id=:uid";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{               
?>


<p>Brand: <?php echo htmlentities($result->Brand);?></p>
<p>Model: <?php echo htmlentities($result->Model);?></p>
<p>Description: <?php echo htmlentities($result->Description);?></p>
<p>Serial: <?php echo htmlentities($result->Serial);?></p>
<p>ISBN: <?php echo htmlentities($result->Isbn);?></p>
<p>Tagged: <?php echo htmlentities($result->Tagged);?></p>


<form name="insertrecord" method="post">
<?php }} ?>

<div class="row" style="margin-top:1%">
</div> 
     </form>

            
      
	</div>
</div>

</body>
</htm
