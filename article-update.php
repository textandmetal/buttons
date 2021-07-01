<?php include("php/head.php") ;?>
<body>
<p>This is a test.</p>
<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$topic=$_POST['topic'];
$field1=$_POST['field1'];
$field2=$_POST['field2'];
$field3=$_POST['field3'];
$field4=$_POST['field4'];
$tags=$_POST['tags'];

// Query for Query for Updation
$sql="update articles set topic=:tp,field1=:f1,field2=:f2,field4=:f4,field3=:f3,tags=:tg where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':tp',$topic,PDO::PARAM_STR);
$query->bindParam(':f1',$field1,PDO::PARAM_STR);
$query->bindParam(':f2',$field2,PDO::PARAM_STR);
$query->bindParam(':f3',$field3,PDO::PARAM_STR);
$query->bindParam(':f4',$field4,PDO::PARAM_STR);
$query->bindParam(':tg',$tags,PDO::PARAM_STR);
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
$sql = "SELECT topic,field1,field2,field4,field3,tags,id from articles where id=:uid";
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
<div class="col-md-4"><b>Topic</b>
<select id="topic" name="topic">
    <option value="<?php echo htmlentities($result->topic);?>"><?php echo htmlentities($result->topic);?></option>
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
    <option value="17">Raspberry</option>
  </select>
</div>
<div class="col-md-4"><b>Author</b>
<input type="text" name="field1" value="<?php echo htmlentities($result->field1);?>" class="form-control" >
</div>
<div class="col-md-4"><b>Title:</b>
<input type="text" name="field2" value="<?php echo htmlentities($result->field2);?>" class="form-control" >
</div>
</div>

<div class="row">
<div class="col-md-8"><b>Byline:</b>
<input type="text" name="field3" value="<?php echo htmlentities($result->field3);?>" class="form-control" maxlength="100" >
</div>
<div class="col-md-4"><b>Content</b><br>
<textarea type="textarea" name="field4" value="<?php echo htmlentities($result->field4);?>" class="form-control"  maxlength="200000" style="width:80%;height:200px;"><?php echo htmlentities($result->field4);?></textarea>
</div>
</div>  


<div class="row">
<div class="col-md-8"><b>Tags:</b>
<input type="text" name="tags" value="<?php echo htmlentities($result->tags);?>" class="form-control" maxlength="100" >
</div>
</div>



<?php }} ?>

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div> 
     </form>
      
<?php include("php/footer.php"); ?>
<?php include("php/scripts.php"); ?>


</body>
</html>
