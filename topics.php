<?php
// include database connection file
include("dbconfig.php");
?>
<?php
	$database_username = 'root';
	$database_password = 'GreenJeans33Winter1@';
	$pdo_conn = new PDO( 'mysql:host=localhost;dbname=buttons', $database_username, $database_password );
?>
<?php 
// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from articles WHERE  id=:id";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record Deleted successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
}
?>
<?php	
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM articles WHERE topic LIKE :keyword  ORDER BY id DESC ';
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
<a href="article-view.php?id=<?php echo $row['id'];?>"><?php echo $row['field2']; ?></a>

    <?php
		}
	}
	?>
<br>
<a href="/">Home</a>
