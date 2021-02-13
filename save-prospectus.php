

<?php
$conn=new PDO('mysql:host=localhost; dbname=upload_database', 'root', '') or die(mysql_error());
$status='';
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  prospectus where name = '$name' ")->rowCount();
  
  
 
}
?>
<html>
<head>
<title>An Educational Consutant Site </title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
</style>
<body>
	    <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		
			
		<br />
		<br />
			<h1><p style="text-align:center; background-color:#ebdbbe; padding:5px;" >"Admission Prospectus"</p></h1>
		<br />
		<br />
		<table  style="background-color:#031aab; color:white;" cellpadding="0" cellspacing="0" border="" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center" style="color:white;" >Files</th>
					<th align="center" style="color:white;">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from prospectus order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success" ><a  style="padding:8px;"   href="download-prospectus.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
	</div>
	</div>
	</div>
</body>
</html>
		
