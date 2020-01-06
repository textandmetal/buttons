<?php
// include database connection file
require_once'dbconfig.php';
?>


<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT topic,field2,field3,field4,field5,field6,field7,field8,field9,field10,id from articles where id=:uid";
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
<h1><a href="article-search.php"><?php echo htmlentities($result->field2);?></a></h1>
<p>By <?php echo htmlentities($result->field3);?></p>
<p><?php echo htmlentities($result->field3);4></p>
<p><?php echo htmlentities($result->field4);5></p>
<form>

<p>id: <?php echo htmlentities($result->id);?></p>
<form name="insertrecord" method="post">
     </form>
	</div>
</div>
<?php }} ?>
