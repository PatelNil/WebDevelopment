<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Open Sans", sans-serif
    }
</style>

<body class="w3-theme-l5">
    <?php
    include 'navbar.php';
    require 'action.php';
    ?>
    <?php
    if (!isset($_SESSION['id'])) {
        header("Location:login.php");
    }
    ?>
    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
    </div>

    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container">
                        <?php
                        if (isset($_SESSION['id'])) {
                            echo '<h4 class="w3-center">' . $_SESSION["first_name"] . '</h4>';
                            echo '<p class="w3-center"><img src="images/' . $_SESSION["id"] . '.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>';
                        } else {
                            echo '<h4 class="w3-center">My Profile</h4>';
                            echo '<p class="w3-center"><img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>';
                        }



                        echo '<hr>';
                        echo '<p><i class="glyphicon glyphicon-envelope w3-margin-right w3-text-theme"></i>' . $_SESSION['email'] . '</p>';
                        echo '<p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>' . $_SESSION['bdate'] . '</p>';
                        ?>
                    </div>
                </div>
                <br>


                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <div class="w3-col m9">

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = 'thinkwriteshare';
                $uid = $_GET['uid'];
                $conn = mysqli_connect($servername, $username, $password, $dbname); //$conn = new mysqli($servername, $username, $password, $dbname);
                if (!$conn) //if ($conn->connect_error)
                {
                    die("Connection failed: " . mysqli_connect_error()); //die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM post WHERE user_id=$uid ORDER BY time DESC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                            <div style="margin-bottom:10px ">
                                <span><?php echo $row['text'] ?></span>
                                <form method="get" action="delete_post.php">
                                    <input type="hidden" name="post_id" value="<?php echo $row['post_id'] ?>" />
                                    <input type="hidden" name='uid' value="<?php echo $row['user_id'] ?>" />
                                    <button style="float:right;margin-bottom:10px">
                                        <span class="material-icons ">delete
                                        </span>
                                    </button>
                            </div>
                        </div>
                <?php }
                } ?>
                <!-- End Middle Column -->
            </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
    </div>
    <br>
    <!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-16">
        <h5>Footer</h5>
    </footer>

    <footer class="w3-container w3-theme-d5">
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>


</body>

</html>