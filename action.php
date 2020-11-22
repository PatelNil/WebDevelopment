<?php
require 'config.php';

$msg = "";
$u_id ="";
$u_name ="";
$u_comment = "";
$update = false;
if(isset($_POST['submit'])){

    $post = $_POST['post_id'];
    $user = $_POST['user_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments(user_id,post_id,text) VALUES('$user','$post','$comment')";
    if($conn->query($sql)){
        $msg = "POSTEDD Successfully";

    }
    else{
        $msg = "falied to posst";
    }
}

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql = "DELETE FROM comments WHERE comment_id='$id' ";
    if($conn->query($sql)){
        header('location:index.php');
    }
}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM comment WHERE id='$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $u_id=$row['id'];
    $u_name = $row['name'];
    $u_comment = $row['comment'];

    $update = true;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date("Y-m-d");

    $sql = "UPDATE comments SET name='$name' , comment='$comment' WHERE id='$id'";
    if($conn->query($sql))
    {
        $msg = "EDited Successfully";
    }
}
?>