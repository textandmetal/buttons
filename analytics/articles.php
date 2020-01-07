<?php
define("ROW_PER_PAGE",2);
require_once('dbconfig.php');
require_once('db-analytics.php');
?>
<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<style>
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php include("nav.php"); ?>
<a href="add-tool-to-inventory.php"><button class="btn btn-primary"> Add Article</button></a>

<hr />
<?php	
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM articles WHERE topic LIKE :keyword OR topicname LIKE :keyword OR field2 LIKE :keyword OR field3 LIKE :keyword OR field4 LIKE :keyword ORDER BY id DESC LIMIT 10';
	
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
<form name='frmSearch' action='' method='post'>
<div style='text-align:left;margin:5px 0px;'><input type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'></div>
<a href=""><button class="btn btn-primary"> Search</button></a>
<br>
<div class="table-responsive">                
<table id="mytable" class="table table-bordred table-striped" style="font-size:0.8em;">                 
<thead>
	<tr>
	  <th class='table-header' width='5%'>id</th>
	  <th class='table-header' width='5%'>Topic</th>
	  <th class='table-header' width='5%'>Title</th>
	  <th class='table-header' width='25%'>Byline</th>
	  <th class='table-header' width='10%'>Author</th>
	  <th class='table-header' width='5%'>Written</th>
	  <th class='table-header' width='3%'></th>
	  <th class='table-header' width='3%'></th>
	  <th class='table-header' width='3%'>Delete</th>
	</tr>
  </thead>
  <tbody id='table-body'>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class='table-row'>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['topicname']; ?></td>
		<td><?php echo $row['field2']; ?></td>
		<td><?php echo $row['field3']; ?></td>
		<td><?php echo $row['field4']; ?></td>
		<td><?php echo $row['field5']; ?></td>
		<td><a href="article.php?id=<?php echo $row['id'];?>">View</a></td>
    		<td><a href="update-article.php?id=<?php echo $row['id'];?>">Update</a></td>
    		<td><a href="index.php?del=<?php echo $row['id'];?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
<?php echo $per_page_html; ?>
</form>
</div>
</div>
</div>
</body>
</html>
