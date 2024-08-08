<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel=stylesheet type="text/css" href="../assets/css/noob_training.css">
        <script src="//cdn.jsdelivr.net/npm/phaser@3.70.0/dist/phaser.min.js"></script>
        <script src="https://unpkg.com/ml5@0.12.2/dist/ml5.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/p5@1.7.0/lib/p5.js"></script>
    </head>
    <body>
        <canvas id = "cam" width="320" height="240"></canvas>
        <div class="iframe-container">
            <p id="labeltime" class="label" ></p>
            <p id="labelscore" class="label" style="color:red"></p>
            <img id="img1" width="460" height="415" >
            <p id="labelpose" class="label" >loading...</p>
        </div>
        <script src="../assets/js/left_knee.js"></script>
        <?php
            include "Connect.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the JSON data sent from the client
                $json_data = file_get_contents("php://input");
                
                $data = json_decode($json_data, true);
                $value = $data['value'];
                session_start();               
                $id = $_SESSION['id'];  
                $Connect = new Connect();
                $Connect->sql_setup();
                if (!$Connect->connect_success()){
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "select * from aerobics where player_id = '$id'";                    
                $result = $Connect->sql_command($sql);
                if (mysqli_num_rows($result) > 0) {     
                    // output data of each row
                    $sql = "update aerobics set left_ankle_left_knee = $value where player_id = $id";
                    $Connect->sql_command($sql);
                }
                else {
                    $sql = "insert into aerobics (player_id, left_ankle_left_knee) Values ('$id', $value)";
                    $Connect->sql_command($sql);
                }
                
            } else {
                http_response_code(405); // Method Not Allowed
                echo "<script>console.log('Only POST requests are allowed')</>";
                //echo "Only POST requests are allowed";
            }
        ?>
    </body>
</html>