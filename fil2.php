<?php
session_start();
$user = 'root';
$password = 'root';
$db = 'placement';
$host = 'localhost';


$connection = mysqli_connect($host,$user,$password,$db);
if($connection)
{
  
}
else
{
  die("connection failed becaues ".mysqli_connect_error() );
}
?>
<?php 

$departid = $_GET['depart']; 
// department id

$sql = 'SELECT name2 FROM sub_courses WHERE name1="'.$departid.'"';

$result = mysqli_query($connection,$sql);
$output='<h1>TEST WILL BE BASED ON FOLLOWING CONTENTS</h1>';
$output.='<br>';

$output='';
while( $row = mysqli_fetch_array($result) ){
    $output.= '<span>'.nl2br($row['name2']).'</span><button type="submit" name="take_practice" form="form_practice" value="'.$departid.'\\'.$row['name2'].'">VIEW</button><br>';
    
}

// encoding array to json format

echo $output;
 
 ?>