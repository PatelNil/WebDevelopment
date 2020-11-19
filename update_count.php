<?php
$con=mysqli_connect('localhost','root','','thinkwriteshare');
$type=$_POST['type'];
$id=$_POST['id'];
if($type=='like'){
	$sql="UPDATE post SET likes=likes+1 WHERE post_id=$id";
}else{
	$sql="UPDATE post SET likes=likes-1 WHERE post_id=$id";
}
if (mysqli_query($con,$sql)){
    echo 'sucess';
}else{
    echo 'not sucess';
    echo mysqli_error($con);
}
?>