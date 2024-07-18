<!DOCTYPE html>

<head>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <link rel="stylesheet" href="/assets/css/home_page.css">
    <title>lobby</title>    
</head>
<body>
    <?php session_start()?>
    <header>    
        <h1><?php echo "welcome ".$_SESSION['last_name']." ".$_SESSION['first_name']." to our game world"; ?></h1>
        <div class="link">
            <a href="account_center.php"><?php echo $_SESSION['last_name']." ".$_SESSION['first_name']?></a>
            <a href="login_page.php">logout</a>
        </div>
    </header>

    <!-- <div class="all_sketch">
        <a href="sketch.php">sketch</a>
        -->
    <!-- 下拉式選單-->
    <div class="list">
        <ul class="drop-down-menu">
            <li><a href="home_page.php">遊戲</a>
                <ul>
                    <li><a href="#">小恐龍</a>
                        <ul>
                            <li><a href="#">遊戲玩法</a>
                            </li>
                            <li><a href="#">開始遊戲</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">貪食蛇</a>
                        <ul>
                            <li><a href="#">遊戲玩法</a>
                            </li>
                            <li><a href="#">開始遊戲</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">???</a>
                        <ul>
                            <li><a href="#">遊戲玩法</a>
                            </li>
                            <li><a href="#">開始遊戲</a>
                            </li>
                        </ul>
                    </li>
                </ul>     
            </li>
            <li><a href="page2.php">健身操</a>
            </li>
            <li><a href="#">選單3</a>
            </li>
        </ul>
    </div>

    <!--中間-->
    <div class="advertise"></div>

<div class="show_game">
    <div class="card">
        <div class="pic">
            <a href="deep_squat.php"><img src="/assets/img/squat.webp", alt = "Avatar"></a>
        </div>
        <div class="text">
            <h3>小恐龍</h3>
            <p>這是一款經典的跑酷遊戲，藉由操作小恐龍無盡的奔跑，躲避各種障礙，以盡可能的奔跑更長的距離。這款遊戲簡單易上手，較為不同的是，我們以雙手控制取代手指的操作，以此來增加遊戲體驗與更高的挑戰性。</p>
        </div>
    </div>

    <div class="card">
        <div class="pic">
            <a href="left_ankle_left_knee.php"><img src="/assets/img/left_ankle_left_knee.jpeg", alt = "Avatar"></a>
        </div>
        <div class="text">
            <h3>貪食蛇</h3>
            <p>這是一款經典的遊戲，玩家操作小蛇，透過吃掉在畫面中的食物增長身體，同時要避免碰到遊戲畫面的邊界。遊戲一開始，小蛇的身體只有一小部分，藉由吃的食物越來越多，小蛇的長度會不斷變長，速度會越來越快，遊戲也會逐漸變困難且極具挑戰性。</p>
        </div>
    </div>

    <div class="card">
        <div class="pic">
            <a href="left_ankle_right_knee.php"><img src="/assets/img/left_ankle_right_knee.jpeg", alt = "Avatar"></a>
        </div>
        <div class="text">
            <h3>???</h3>
            <p>遊戲介紹</p>
        </div>
    </div>
</div>

<div class="show_game">
    <div class="card">
        <div class="pic">
            <a href="pose.php"><img src="/assets/img/pose.jpg", alt = "Avatar"></a>
        </div>
        <div class="text">
            <h3>小恐龍</h3>
            <p>這是一款經典的跑酷遊戲，藉由操作小恐龍無盡的奔跑，躲避各種障礙，以盡可能的奔跑更長的距離。這款遊戲簡單易上手，較為不同的是，我們以雙手控制取代手指的操作，以此來增加遊戲體驗與更高的挑戰性。</p>
        </div>
    </div>

    <div class="card">
        <div class="pic">
            <a href="jump_pack.php"><img src="/assets/img/jump_pack.jpeg", alt = "Avatar"></a>
        </div>
        <div class="text">
            <h3>貪食蛇</h3>
            <p>這是一款經典的遊戲，玩家操作小蛇，透過吃掉在畫面中的食物增長身體，同時要避免碰到遊戲畫面的邊界。遊戲一開始，小蛇的身體只有一小部分，藉由吃的食物越來越多，小蛇的長度會不斷變長，速度會越來越快，遊戲也會逐漸變困難且極具挑戰性。</p>
        </div>
    </div>

    <div class="card">
        <div class="pic">
            <img src="/assets/img/dino.png", alt = "Avatar">
        </div>
        <div class="text">
            <h3>???</h3>
            <p>遊戲介紹</p>
        </div>
    </div>
</div>
</div>    
</body>