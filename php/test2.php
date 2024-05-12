<?php

    $data = array();
    if(isset($_POST['randomAnswer']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    $server_name = '127.0.0.1:3306';
    $username = 'root';
    $password = '12345678';
    $dbname = 'project';
    $conn = mysqli_connect($server_name, $username, $password, $dbname);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "select * from account where player_acc = 'wei' and player_psw = md5('12345678')";
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) > 0) {      
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          $data = 'acc =  ' . $row["player_acc"];       
          echo json_encode($data);  
          exit;
      }
  } 
    else{
        $message = "user account or password incorrect";
        echo "<script>alert('$message');</script>";
    }
    die();      
    }
    
 ?>