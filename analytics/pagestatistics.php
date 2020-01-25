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
<?php include("pageviews.php"); ?><br>
<?php include("individualviews.php"); ?><br>
<?php include("aboutviews.php"); ?><br>
<?php include("articleviews.php"); ?><br>

<hr />
</div>
</div>
</div>
</body>
</html>
