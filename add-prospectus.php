

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
  
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
    	$chk2 = $conn->query("SELECT * FROM  prospectus where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"prospectus/".$fname);
 if($move){
	 
	 
 	$query=$conn->query("insert into prospectus(name,fname)values('$name','$fname')");
	if($query){
		$status="successfully";
		
	
	}
	else{   
	       $status="failed";
            header("location:");
        } 
 }
}
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
 <style>

 body{
   background-color:#99aacc;
 }
 
 .up-a{
 background-color:white;
 height:400px;
 width:30%;
 margin-left:35%;
 margin-top:10%;
 }
 
 .up-aa{
 vertical-align:center;
 display:flex;
 justify-content:center;
 color:white;
 align-items:center;
 background-color:#2fb8c2;
 height:150px;
 width:100%;
 
 }
 
 .up-aaa{
 
 align-items:center;
 display:flex;
 justify-content:center;
 color:black;
 height:250px;
 width:100%;
 text-align:center;
 
 
 }
 
 .button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

 </style>

    
  </head>
  <body>
  
  <div class="up-a">
  
   <div class="up-aa">
   <h1>Upload Prospectus</h1> 
    
   
   </div>
  
  <div class="up-aaa">
  
  
  <form enctype="multipart/form-data" action="" name="form" method="post"  onSubmit="alert(' Data Inserted Sucessfully !!')" >
		

			<input type="file" name="file" style="background-color:#ebe8be; padding:10px;" id="file" onSubmit="this.file.reset()" required  />
			<br><br>
			
			<button type="submit" name="submit" id="submit" class="button"  >Upload</button>
			
			
			
		</form>
  
   
   </div>
  
  
  
  </div>

    
    
  </body>
</html>


