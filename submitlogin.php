<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div >
<?php
  include 'navbar.php';
?>
</div>
<div style="margin:100px">
<?php
echo 'Username:'.$_POST['username'];
echo '<br>';
echo 'Password:'.$_POST['password'];
?>
</div>
</body>
</html>