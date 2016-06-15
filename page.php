<?php 
$con = mysqli_connect('localhost','root','root','test');

if(isset($_POST["submit"]))
{
$file = $_FILES['file']['tmp_name'];
$handle = fopen($file, "r");
$i = 0;
while(($file_data = fgetcsv($handle, 1000, ",")) !== false)
{	
$name = $file_data[0];
$course = $file_data[1];
$fee = $file_data[2];

$sql = mysqli_query($con,"INSERT IGNORE INTO students (name, course,fee) VALUES ('".$name."','".$course."','".$fee."')");
$i = $i + 1;
	
}
//echo $sql;
if($sql)
{
echo "You database has imported successfully. You have inserted ". $c ." records";
}
else
{
echo "Sorry!";
}

}
 
?>
<html>
<head>
<title>Convert EXCEL File to MYSQL Table</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
Upload Excel File : <input type="file" name="file" /><br />
<input type="submit" name="submit" value="Upload" />
</form>	
</body>
</html>