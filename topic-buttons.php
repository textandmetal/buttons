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
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM topics WHERE type LIKE :keyword  ORDER BY id ASC ';
	
	
	$query = $sql.$limit;
	$pdo_statement = $pdo_conn->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<p>
<div class="table-responsive">                
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>

							<a href="<?php echo $row['type'];?>.php" class="button big wide smooth-scroll-middle"><?php echo $row['type'];?></a>
    <?php
		}
	}
	?>
</p>
</div>
<?php echo $per_page_html; ?>
<br>

						
					<p><a href="articles/about.php" class="button big wide smooth-scroll-middle">About</a></p>
							