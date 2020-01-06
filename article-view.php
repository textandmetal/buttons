<?php
// include database connection file
require_once'dbconfig.php';
?>



<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT type from topics where id=:uid";
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
<h1><a href="/"><?php echo htmlentities($result->type);?></a></h1>

<?php
// This is the second loop in the code
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT type from articles where topic=:<?php echo htmlentities($result->type);?>";
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
<h1><a href="/"><?php echo htmlentities($result->field2);?></a></h1>
<?php }} ?>


<?php }} ?>
