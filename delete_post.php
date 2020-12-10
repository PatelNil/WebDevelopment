<?php
$con=mysqli_connect('localhost','root','','thinkwriteshare');
$id=$_GET['post_id'];
$uid = $_GET['uid'];
$sql ="DELETE FROM post WHERE post_id=".$id;
if (mysqli_query($con,$sql)){
    echo 'sucess';
    echo $uid;
    header('Location: post_admin.php?uid='.$uid);
}else{
    echo 'not sucess';
    echo mysqli_error($con);
}
?>