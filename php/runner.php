<!DOCTYPE html>
<html lang="en">
    <head>        
        <script scr = "https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <title>dino runner</title>
        <link rel="stylesheet" href="/assets/css/dino.css">
        <script src="/assets/js/dino.js"></script>
    </head>
    <body>  
        <script src="/assets/model.json" id="model"></script> 
        <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/p5@1.7.0/lib/p5.js"></script>
        <h1>dino runner advanture</h1>
        <div class="canvas_container">       
            <canvas id="board"></canvas>
            <div id = "score"></div>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the JSON data sent from the client
                $json_data = file_get_contents("php://input");
                
                $data = json_decode($json_data, true);
                
                $value = $data['value'];
                session_start();
                $server_name = '127.0.0.1:3306';
                $username = 'root';
                $password = '12345678';
                $dbname = 'project';
                $conn = mysqli_connect($server_name, $username, $password, $dbname);
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                }
                $id = $_SESSION['id'];
                $sql = "insert into game (player_id, dino) Values ('$id', $value)";
                $result = mysqli_query($conn, $sql);
                
            } else {
                http_response_code(405); // Method Not Allowed
                echo "<script>console.log('Only POST requests are allowed')</script>";
                //echo "Only POST requests are allowed";
            }
        ?>
    </body>
</html>