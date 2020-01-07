<?php include 'php/head.html'; ?>
<body>
<?php
// include database connection file
require_once'dbconfig.php';
?>
<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT byline,type from topics where id=:uid";
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

                            <p>
<?php
// This is the second loop in the code
// Get the userid
$userid=intval($_GET['id']);
$sql1 = "SELECT field2,id from articles where topic=:uid";
//Prepare the query:
$query = $dbh->prepare($sql1);
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
							<a href="/article-view.php?id=<?php echo htmlentities($result->id);?>" class="button big wide smooth-scroll-middle"><?php echo htmlentities($result->field2);?></a>
<?php }} ?>
                            </p>
<?php }} ?>
	</body>
</html>
