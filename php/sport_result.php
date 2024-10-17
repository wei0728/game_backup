<!DOCTYPE html>
<html>
    <head>
        <?php session_start();?>
        <meta charset="utf-8" />
        <link rel=stylesheet type="text/css" href="../assets/css/result.css">
        <title>result</title>
    </head>

    <body>
    <canvas id="confettiCanvas"></canvas>
    <div id="container">
        <div id="img-container">  
            <div id="pose-name">            
                <h1>運動：</h1>         
                <h1 id="pose">pose</h1>
            </div> 
            <img id="img1" src="" alt="描述圖片">
        </div>
        <div id="comments">
            <div id = flex>        
                <h1> 分數：</h1>
                <h1 id = "score"><?php echo $_SESSION["score"]; ?></h1>
            </div>
            <div id = flex>
                <h1>分數換算年齡：</h1>
                <h1 id = "age">age</h1>
            </div>
            <div class="comment1" id="grade1">word</div>
            <div class="comment2" id="grade2">word</div>
            <div class="comment3" id="grade3">word</div>
            <div class="comment4" id="grade4">word</div>
            <div class="comment5" id="grade5">word</div>        
        </div>
    </div>
    <script src="../assets/js/sport_result.js"></script>
</body>
</html>