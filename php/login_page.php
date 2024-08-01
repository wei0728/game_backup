<html>
    <head>
        <title>login Page</title>
        <link rel="stylesheet" href="../assets/css/login_page.css">
    </head>
    <body>
        <center><h1>Login Form</h1></center>
        <form action="#" method="post">
            <center><div class="container">
                <div class="imgcontainer">
                    <img src="../assets/img/avatar_img1.jpg" alt="Avatar" class="avatar">
                </div>
                <label for ='account'><b>Player account :  </b></label>
                <input type="text" placeholder="Enter account" name="account" float="right"  required><br>  
                <label for='password'><b>Password : </b></label>
                <input type="password" placeholder="Enter Password" name="password" required><br>  
                <button type="submit"><b>Login</b></button><br>     
                <div class = "scale">                
                    Don't have accounct <a href="signup_page.php"> register </a><br>
                    forget your password? <a href= "forget_pw.php"> reset password</a>
                </div>
            </div></center>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $acc = $_POST['account'];
                $psw = $_POST['password'];
                session_start();
                $server_name = '127.0.0.1:3306';
                $username = 'root';
                $password = '12345678';
                $dbname = 'project';
                $conn = mysqli_connect($server_name, $username, $password, $dbname);
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "select * from account where player_acc = '$acc' and player_psw = md5('$psw')";
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0) {      
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "acc: " . $row["player_acc"]. "psw: " . $row["player_psw"]. "<br>";
                        $_SESSION['account'] = $acc;
                        $_SESSION['password'] = $psw;
                        $_SESSION['last_name'] = $row["player_last_name"];
                        $_SESSION['first_name'] = $row["player_first_name"];
                        $_SESSION['id'] = $row["player_id"];
                        header("Location: noob_training.php");
                        exit;
                    }
                } 
                else{
                    $message = "user account or password incorrect";
                    echo "<script>alert('$message');</script>";
                }
            }
        ?>
    </body>
</html>