<html>
    <head>
        <title>Signup Page</title>
        
        <link rel="stylesheet" href="../assets/css/signup_page.css">
    </head>
    <body>
        <center><h1>Register From</h1></center>
        <form action="#" method="post">
            <center><div class="container">
                <div class="imgcontainer">
                    <img src="../assets/img/avatar_img2.png" alt="Avatar" class="avatar">
                </div>
                <label for='first_name'><b>First Name : </b></label>
		        <input type='text' placeholder="Enter your first name" name='first_name' required><br>
		        <label for='last_name'><b>Last Name :</b></label>
		        <input type='text' placeholder='Enter your last name' name='last_name' required><br>
            	<label for ='account'><b>account :  </b></label>
            	<input type="text" placeholder="Enter account" name="account" float="right"  required><br>  
            	<label for='password'><b>Password : </b></label>
            	<input type="password" placeholder="Enter Password" name="password" required><br>  
            	<button type="submit"><b>Signup</b></button><br>
                Already an accounct <a href="login_page.php"> Login </a>
            </div></center>
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $server_name = '127.0.0.1:3306';
                $username = 'root';
                $password = '12345678';
                $dbname = 'project';
                $conn = mysqli_connect($server_name, $username, $password, $dbname);
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                }
                $acc = $_POST['account'];
                $psw = $_POST['password'];
                $sql = "select * from account where player_acc = '$acc' and player_psw = md5('$psw')";
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0) {     
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $message = "user account have already been created";
                        echo "<script>alert('$message');</script>";
                    }
                }
                else {
                    $f_name = $_POST['first_name'];
                    $l_name = $_POST['last_name'];
                    $sql = "insert into account (player_last_name, player_first_name, player_acc, player_psw) Values ('$l_name', '$f_name', '$acc',md5('$psw'))";
                    $result = mysqli_query($conn, $sql);
                    $message = 'user account created successfully';
                    echo "<script>alert('$message');</script>";
                    header('Location: login_page.php');
                    exit;
                }
            }
        ?>
    </body>                      