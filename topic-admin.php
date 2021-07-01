<?php include("php/head.html"); ?>
<body>
				<!-- Additional Elements -->
					<section class="wrapper style1 align-center">
						<div class="inner">
							<div class="index align-left">
								<!-- Text -->
									<section>
										<div class="content">
<?php include("navbar-admin.php");?>
<a href="/buttons"><h1 class="title">Admin</h1></a>
<p><a href="article-admin.php">Articles</a> - <a href="topic-admin.php">Topics</a> - <a href="edit-settings.php">Settings</a> - <a href="logout.php">Logout</a></p>
<p><a href="article-create.php">Create Article</a></p>
<form style="margin:auto" name='frmSearch' action='' method='post'>
<div style='text-align:auto;margin:5px 0px;'><input type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'><a href=""><button class=""> Search</button></a>
</div>
</form>

<?php
define("ROW_PER_PAGE",2);
// include database connection file
include("dbconfig.php");
?>
<?php
	$database_username = 'root';
	$database_password = 'Greenjeans33@';
	$pdo_conn = new PDO( 'mysql:host=localhost;dbname=buttons', $database_username, $database_password );
?>
<?php 
// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from topics WHERE  id=:id";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record Deleted successfully');</script>";
// Code for redirection
echo "<script>window.location.href='article-admin.php'</script>"; 
}
?>

<?php	
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM topics WHERE id LIKE :keyword OR type LIKE :keyword OR byline LIKE :keyword ORDER BY id DESC LIMIT 100';
	
	
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<br>


	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
<table style="width:100%">
  <tr>
    <td><a href="article.php?id=<?php echo $row['id'];?>"><b><?php echo $row['type']; ?></b> - <?php echo $row['byline']; ?></a></td>
    <td style="text-align: right;"><a href="topic-update.php?id=<?php echo $row['id'];?>">Edit</a>   <a href="topic-admin.php?del=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');">Delete</a></td>
  </tr>

</table>
    <?php
		}
	}
	?>
<?php echo $per_page_html; ?>


                <!-- Pager -->
            </div>
        </div>
    </div>

<?php include("footer.php");?>

</body>

</html>

