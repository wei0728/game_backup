<!DOCTYPE html>

<head>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <link rel="stylesheet" href="../assets/css/home_page.css">
    <title>lobby</title>
</head>

<body>
    <?php session_start() ?>
    <header>
        <h1><?php echo "welcome " . $_SESSION['last_name'] . " " . $_SESSION['first_name'] . " to our game world"; ?></h1>
        <div class="link">
            <a href="account_center.php"><?php echo $_SESSION['last_name'] . " " . $_SESSION['first_name'] ?></a>
            <a href="login_page.php">logout</a>
        </div>
    </header>

    <!-- 下拉式選單-->
    <div class="list">
        <ul class="drop-down-menu">
            <li><a href="#">遊戲</a>
                <ul>
                    <li><a href="runner.php">小恐龍</a></li>
                    <li><a href="snake.php">貪食蛇</a></li>
                    <li><a href="classic_game.php">小星星</a></li>
                </ul>
            </li>
            <li><a href="page2.php">健身操</a>
                <ul>
                    <li><a href="jump_pack.php">j開合跳</a></li>
                    <li><a href="deep_squat.php">深蹲</a></li>
                    <li><a href="left_ankle_left_knee.php">左手肘碰左膝</a></li>
                    <li><a href="left_ankle_rigjt_knee.php">左手肘碰右膝</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!--中間-->
    <div class="all">
        <div class="show_game">
            <div class="card">
                <div class="pic">
                    <a href="jump_pack.php"><img src="../assets/img/jump_pack.jpeg" , alt="Avatar"></a>
                </div>
                <div class="text">
                    <h3>開合跳</h3>
                    <p><b>準備姿勢：</b>抬頭挺胸，眼睛直視前方，雙手垂在身體兩側。
                        <b>起跳：</b>上跳時，雙腳向外張開，雙手高舉過頭到接近頭頂正上方的位置。雙手雙腳打直，膝蓋不彎曲。</p>
                </div>
            </div>

            <div class="card">
                <div class="pic">
                    <a href="deep_squat.php"><img src="../assets/img/squat.webp" , alt="Avatar"></a>
                </div>
                <div class="text">
                    <h3>深蹲</h3>
                    <p>(1)雙腳分開略寬於臀部。<br>
                        (2)挺胸，收緊核心，將重心轉移到腳跟上。<br>
                        (3)慢慢將臀部往下推，直到大腿平行於地板。<br>
                        (4)過程中，頭部與頸椎呈一直線，不要低頭或者仰頭使力。</p>
                </div>
            </div>

            <div class="card">
                <div class="pic">
                    <a href="left_ankle_left_knee.php"><img src="../assets/img/left_ankle_left_knee.jpeg" , alt="Avatar"></a>
                </div>
                <div class="text">
                    <h3>左手肘碰左膝</h3>
                    <p>雙腳打開與肩同寬，身體站直，雙手彎曲手臂放在耳旁或頭部後側，向左外側抬起左邊膝蓋，同時身體傾向左側，盡量讓左膝與左手肘相碰</p>
                </div>
            </div>

            <div class="card">
                <div class="pic">
                    <a href="sidebend.php"><img src="../assets/img/sidebend.jpeg" , alt="Avatar"></a>
                </div>
                <div class="text">
                    <h3>左手肘碰右膝</h3>
                    <p>雙腳打開與肩同寬，身體站直，雙手彎曲手臂放在耳旁或頭部後側，向內側前側抬起右邊膝蓋，身體扭轉讓左側手肘與右側膝蓋相碰。
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>