<html>
<?php include("head.php") ;?>
<body>
<?php include("navbar-main.php") ;?>

<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$catergory=$_POST['catergory'];
$type=$_POST['type'];
$byline=$_POST['byline'];

// Query for Query for Updation
$sql="update articles set catergory=:ct,type=:tp,byline=:by where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':ct',$catergory,PDO::PARAM_STR);
$query->bindParam(':tp',$type,PDO::PARAM_STR);
$query->bindParam(':by',$byline,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='article-admin.php'</script>"; 
}
?>
<?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT catergory,type,byline,id from articles where id=:uid";
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
<h1>Article Update</h1>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Topic</b><br>
<select id="catergory" name="catergory">
    <option value="<?php echo htmlentities($result->catergory);?>"><?php echo htmlentities($result->catergory);?></option>
    <option value="1">Vim</option>
    <option value="2">Linux</option>
    <option value="3">Recipes</option>
    <option value="4">Anthropology</option>
    <option value="5">Built Environment</option>
    <option value="6">Thinking</option>
    <option value="7">Stories</option>
    <option value="8">Projects</option>
    <option value="9">Birds</option>
    <option value="10">Plants</option>
    <option value="11">Pen Testing</option>
    <option value="12">Troubleshooting</option>
    <option value="13">Calculators</option>
    <option value="14">Applications</option>
  </select>
</div>
<div class="col-md-4"><b></b><br>
<input type="text" name="byline" value="<?php echo htmlentities($result->byline);?>" class="form-control" >
</div>
</div>

<div class="row">
<div class="col-md-8"><b>Type</b><br>
<input type="text" name="type" value="<?php echo htmlentities($result->type);?>" class="form-control" maxlength="100" >
</div>
</div>  





<?php }} ?>

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div> 
     </form>
      
<?php include("footer.php"); ?>
<?php include("scripts.php"); ?>


</body>
</html>
