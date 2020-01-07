<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  

$field2=$_POST['field2'];
$field3=$_POST['field3'];
$field4=$_POST['field4'];
$field5=$_POST['field5'];
$field6=$_POST['field6'];
$field7=$_POST['field7'];
// Query for Query for Updation
$sql="update articles set field2=:f2,field3=:f3,field4=:f4,field5=:f5,field6=:f6,field7=:f7 where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':f2',$field2,PDO::PARAM_STR);
$query->bindParam(':f3',$field3,PDO::PARAM_STR);
$query->bindParam(':f4',$field4,PDO::PARAM_STR);
$query->bindParam(':f5',$field5,PDO::PARAM_STR);
$query->bindParam(':f6',$field6,PDO::PARAM_STR);
$query->bindParam(':f7',$field7,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
}
?>



		<?php include '../php/head.html'; ?>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- Banner -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT topic,field2,field3,field4,field5,field6,field7,id from articles where id=:uid";
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
<h1><a href="topic.php?id=<?php echo htmlentities($result->topic);?>"><?php echo htmlentities($result->field2);?></a></h1>
<p>By <?php echo htmlentities($result->field3);?></p>
<p><?php echo htmlentities($result->field4);?></p>
<p><?php echo htmlentities($result->field4);?></p>
<form>

<p>id: <?php echo htmlentities($result->id);?></p>
<?php }} ?>
						</div>
					</section>

	</body>
</html>
