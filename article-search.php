<?php
define("ROW_PER_PAGE",2);
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
	
	/* Pagination Code starts 
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $pdo_conn->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}*/
	
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

<?php echo $per_page_html; ?>

