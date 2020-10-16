<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $X = $_POST['psw'];
  $Y = $_POST['pswr'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = 'thinkwriteshare';
  if($X == $Y){
    echo "Welcome";
  }
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo 'Connected';
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $pswr = $_POST['pswr'];
    $bdate =  $_POST['bdate'];
    $gen = $_POST['Gender'];

    $sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `bdate`, `gender`) VALUES ('$fname','$lname','$email','$psw','$bdate','$gen')";
    if (mysqli_query($conn, $sql)) {
      //header("Location:index.php");
      echo "New record created";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $img_name = mysqli_insert_id($conn);
    mysqli_close($conn);


    $target_dir = "images/";
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $fileExt = explode(".",$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');
    if (in_array($fileActualExt,$allowed)) {
        if ($fileError === 0){
            if ($fileSize < 1000000){
                $newName = $img_name.".".$fileActualExt;
                $target = 'images/'.$newName;
                move_uploaded_file($fileTempName,$target);
                header("Location:index.php?uploaded"); 
            }else{
                echo "File size is too big!!";
            }
        }else{
            echo "There was an error while uploading";
        }
    }else{
        echo "You cannot upload file this type";
    }
    
  }
?>