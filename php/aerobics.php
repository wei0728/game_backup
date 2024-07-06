<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel=stylesheet href="/assets/css/aerobics.css">
        <script src="//cdn.jsdelivr.net/npm/phaser@3.70.0/dist/phaser.min.js"></script>
        <script src="https://unpkg.com/ml5@0.12.2/dist/ml5.min.js" type="text/javascript"></script> 
        <script src="https://cdn.jsdelivr.net/npm/p5@1.7.0/lib/p5.js"></script>        
    </head>
    <body>        
        <script src="/assets/js/aerobics.js"></script>
        <canvas id = "cam" width="320" height="240"></canvas>        
        <div class="iframe-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/7ycbPf6m-7c?si=vmZYDr-XAMgUKmyU&amp;start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p id="label1" class="label" >Pose Label</p>
            <p id  = "score1" class = "label" >score</p>
        </div>
        
    </body>
</html>
<!--<html>
  <head>
    <meta charset="UTF-8" />
    <title>ml5.js bodyPose Skeleton Example</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.2/p5.min.js"></script>
    <script src="https://unpkg.com/ml5@0.20.0-alpha.4/dist/ml5.min.js"></script>
  </head>

  <body>
    <div id = "righteye">123</div>
    <script src="/assets/js/aerobics.js"></script>
    <canvas id = "cam" width="320" height="240"></canvas>
    <div class="iframe-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/7ycbPf6m-7c?si=vmZYDr-XAMgUKmyU&amp;start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p id="label1" class="label" >Pose Label</p>
            <p id  = "score1" class = "label" >score</p>
    </div>
  </body>
</html>-->
