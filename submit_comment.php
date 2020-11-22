<?php 
require 'action.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment system</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-5 bg-light rounded mt-2">
    <h4 class="text-center p-2">Write your comment</h4>
    <form action="index.php" method="POST" class="p-2">
    <input type="hidden" name="post_id" value=<?php echo $_POST['like']; ?>>
    <input type="hidden" name="user_id" value=<?php echo $_SESSION['id']; ?>>
    <div class="form-group">
    <textarea name="comment" class="form-control rounded-0" placeholder="Write your Comment" required></textarea>
    </div>
    <div class="form-group">
    <?php if($update == true){ ?>
    <input type="submit" name="update" class="btn btn-success rounded-0" value="Update Comment">
    <?php } else{?>
    <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Post Comment">
    <?php } ?>
    
    <h5 class="float-right lead text-success p-2"><?= $msg; ?></h5>
    </div>
    
    </form>
    </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-lg-5 rounded bg-light p-3">
    <?php 
    $sql = "SELECT * FROM comments WHERE post_id=".$_POST['like'];
    $result = $conn->query($sql);
    if ($result->num_rows >0){
    while($row = $result->fetch_assoc()){
    ?>
    <?php $s1 = "SELECT * FROM user WHERE user_id=".$row['user_id'];
          $r1 = $conn->query($s1);
          $r2 = $r1->fetch_assoc();?>
    <div class="card mb-2 border-secondary">
    <div class="card-header bg-secondary py-1 text-light">
    <span class="font-italic">Posted by : <?php echo $r2['first_name'] ?> </span>
    <span class="float-right font-italic">On : <?php echo $row['date'] ?></span>
    </div>
    <div class="card-body py-2">
    <p class="card-text"><?php echo $row['text'] ?></p>
    </div>
    <div class="card-footer py-2">
    <div class="float-right">
    <a href="action.php?del=<?php echo $row['comment_id'] ?>" class="text-danger mr-2" onclick="return conform('DO You Want to delete this comment');" title="delete">Delete</a>
    
    </div>
    </div>
    </div>
    <?php }} ?>
    </div>
    </div>

    </div>
</body>
</html>