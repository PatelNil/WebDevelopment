<?php
$con=mysqli_connect('localhost','root','','thinkwriteshare');
$uid = $_GET['uid'];
$sql ="DELETE FROM `user` WHERE `user`.`user_id`=".$uid;
if (mysqli_query($con,$sql)){
    echo 'sucess';
    echo $uid;
    header('Location: index_admin.php?');
}else{
    echo 'not sucess';
    echo mysqli_error($con);
}
?>