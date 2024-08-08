<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../assets/css/account_center.css">
        <title>account center</title>    
    </head>   
    <body>
        <header>    
            <?php session_start()?>
            <h1>Account Center</h1>
            <div class="link">
                <a href="account_center.php"><?php echo $_SESSION['last_name'].' '.$_SESSION['first_name'];?></a>
                <a href="login_page.php">logout</a>
            </div>
        </header> 
        <div class="flex">
            <div class="info-block">
                <h2>user name: </h2>
                <?php echo $_SESSION['last_name'].' '.$_SESSION['first_name'];?>
            </div>
            <div class = "info-block">
                <h2>user id:</h2>
                <?php echo $_SESSION['id'];?>
            </div>
        </div>   
        <div class="flex">
            <div class="info-block">
                <h2 id = 'rank_name'>rank:</h2>
                <div class="button-container">
                    <button onclick="jump_pack()">開合跳</button>
                    <button onclick="deep_squat_rank()">深蹲</button>
                    <button onclick="left_ankle_left_knee_rank()">左肘碰左膝</button>
                    <button onclick="side_bend_rank()">側身伸展</button>
                </div>
                <div id = "result1" ></div><br>
                <div id = "result2" ></div><br>
                <div id = "result3" ></div><br>
                <div id = "result4" ></div><br>
                <div id = "result5" ></div>
                <script src="../assets/js/account_center.js"></script>
            </div>
        </div>
        <div class="flex">
            <div class="edit-block">
                <a href="edit.php">edit</a>
                <a href="home_page.php">home</a>
            </div>
        </div>
        <?php
        /*include "Connect.php";
        $servername = "127.0.0.1";
        $username = "root";
        $password = "12345678";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the function to query based on the button clicked
        if ($_POST['functionToQuery']) {
            $functionToQuery = $_POST['functionToQuery'];
            echo "hello";
            // Your query logic here
        } else {
            echo json_encode(array('error' => 'No function specified'));
            exit;
        }

        // Prepare and execute the SQL query
        if ($functionToQuery == 'jump_pack') {
            $sql = "SELECT jump_pack FROM aerobics ORDER BY jump_pack DESC LIMIT 5";
            $result = $conn->query($sql);
            header('Content-Type: application/json');
            $data = array();
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            // Send back the result
            echo json_encode($data);
            exit();
        }
        $conn->close();*/

        include "Connect.php";
        ob_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the JSON data sent from the client
            $json_data = file_get_contents("php://input");
            $data = json_decode($json_data, true);
            $value = $data['value'];
            $id = $_SESSION['id'];
            $Connect = new Connect();
            $Connect->sql_setup();
            if (!$Connect->connect_success()){
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "select player_id, $value from aerobics order by $value desc limit 5";                    
            $result = $Connect->sql_command($sql);
            if ($result->num_rows > 0) {
                $output = [];
                while ($row = $result->fetch_assoc()) {
                    $output[] = $row["player_id"]. ": "  . $row[$value];
                }
                echo json_encode($output);
            } else {
                echo json_encode(['message' => 'No results found']);
            }
            ob_end_flush();

        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Only POST requests are allowed']);
            ob_end_flush(); // 輸出並關閉緩衝
            exit;
        }

/*$Connect = new Connect();
if (!$Connect->connect_success()) {
    die("連接失敗: " . $conn->connect_error);
}
$sql = "select jump_pack from aerobics order by jump_pack desc limit 5";
$result = $Connect->sql_command($sql);
if ($result->num_rows > 0) {
    $output = array();
    while($row = $result->fetch_assoc()) {
        array_push($output, "id: " . $row["jump_pack"]);
    }
    echo json_encode($output);
} else {
    echo json_encode(["0 結果"]);
}*/
        ?>


    </body>
</html>

