<?php 
session_start() ;
      $email = $_POST['email'];
      $new = $_POST['new'];
      //echo $email .   " " . $new;
      $conn = mysqli_connect("Localhost","root","","thinkwriteshare");
      $sql = "UPDATE user SET password='".$new."' WHERE email='".$email."'";
      //$result = mysqli_query($conn,$sql);
      if (mysqli_query($conn,$sql) ) 
      {
      //        header("Location:login.php?Upadate=True");
      echo "true";

      } else {
      //  header("Location:login.php?Upadate=False");
        echo 'false';
      }
      
      ?>