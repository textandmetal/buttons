<?php
// include database connection file
require_once'config/dbconfig.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  

$field1=$_POST['field1'];
$field2=$_POST['field2'];
$field3=$_POST['field3'];
$field4=$_POST['field4'];
$field5=$_POST['field5'];
$field6=$_POST['field6'];
$field7=$_POST['field7'];
$field8=$_POST['field8'];
$field9=$_POST['field9'];
$field10=$_POST['field10'];
// Query for Query for Updation
$sql="update example set field1=:f1,field2=:f2,field3=:f3,field4=:f4,field5=:f5,field6=:f6,field7=:f7,field8=:f8,field9=:f9,field10=:f10 where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':f1',$field1,PDO::PARAM_STR);
$query->bindParam(':f2',$field2,PDO::PARAM_STR);
$query->bindParam(':f3',$field3,PDO::PARAM_STR);
$query->bindParam(':f4',$field4,PDO::PARAM_STR);
$query->bindParam(':f5',$field5,PDO::PARAM_STR);
$query->bindParam(':f6',$field6,PDO::PARAM_STR);
$query->bindParam(':f7',$field7,PDO::PARAM_STR);
$query->bindParam(':f8',$field8,PDO::PARAM_STR);
$query->bindParam(':f9',$field9,PDO::PARAM_STR);
$query->bindParam(':f10',$field10,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
}
?>



<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT field1,field2,field3,field4,field5,field6,field7,field8,field9,field10,id from example where id=:uid";
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
<div class="container">

<div class="row">
<div class="col-md-12">
<?php include("settings/settings.php"); ?>
<h1><a href="article-search.php"><?php echo htmlentities($result->field1);?></a></h1>
<p>By <?php echo htmlentities($result->field2);?></p>
<p><?php echo htmlentities($result->field3);?></p>
<p><?php echo htmlentities($result->field4);?></p>
<form>

<p>id: <?php echo htmlentities($result->id);?></p>
<form name="insertrecord" method="post">
     </form>
	</div>
</div>
<?php }} ?>
