let video;
let features;
let KNN;
let poseNet;
let pose;
let score = 0;                                            //分數
let cdtimer = 0;                                          //計數器(冷卻
let endtimer=0;
let lock=new Boolean(false);                              //作答鎖
let label_pose = document.getElementById("labelpose");
let label_score = document.getElementById("labelscore");
let label_time=document.getElementById("labeltime");
let img=document.getElementById("img1");
let ready=false;
let working=false;
let loadnum=0;
let labelp;
let key=false;

function setup() {
  createCanvas(640, 480, cam);                            //建立視訊鏡頭的畫布
  video = createCapture(VIDEO);                           //擷取視訊畫面
  video.size(640, 480);
  video.hide();
  poseNet = ml5.poseNet(video, modelLoaded);              //引用並實體化套件
  knn=ml5.KNNClassifier();
  poseNet.on('pose', gotPoses);
  features=ml5.featureExtractor("MobileNet",modelLoaded);
}

function draw() {
  try{
    if(ready){                                             //若模型皆引入完成則進入
      if(endtimer<1000){
        cdtimer++;                                           //每次進入則計數器+1 
        endtimer++;
        if(cdtimer>100){                                     //若冷卻達到100則解鎖
          lock=false; 
        }
        const logits=features.infer(video);
        if (pose) {
          translate(video.width, 0);                         //水平翻轉鏡頭畫面
          scale(-1, 1);
          image(video, 0, 0);
          if (lock==true) {                //若上鎖則顯示答對
            label_time.innerText="答對";
          }
          else{                            //若沒上鎖則進入
            label_time.innerText="...";
            if (isJumpingJack(pose)) {
              key=true;
              score++;
              label_score.innerText=score;
              cdtimer = 0;
              lock=true;
  
            }
          }
          if(ready&& !working){            //已就緒且未執行，則呼叫一次goClassify()，並由其遞迴自己呼叫
            goClassify();
            working=true;
            img.src="../assets/img/jump_pack.jpeg";
            label_pose.innerText = "開合跳";
          }
        }
      }else{
        document.cookie = "pose = ";
        document.cookie = "pose = jump_pack";
        document.cookie = "score = ";
        document.cookie = "score = "+score;
        send_score("jump_pack.php");
        //setCookie('sport', 'jump_pack', 7);
        //window.sessionStorage.setItem('sport', sport);
    
      }
    }
  }catch(e){
    console.log(e);
  }
}

function gotPoses(poses) {
  if (poses.length > 0) {
    pose = poses[0].pose;
  }
}
function modelLoaded() {
  loadnum+=1;
  if(loadnum==2){
    ready=true;
    console.log("modelLoaded!");
  }
}

function isJumpingJack(pose) {
  if(
    Math.sqrt(Math.abs(pose.leftElbow.x-pose.leftEar.x) **2+
    Math.abs(pose.leftElbow.y-pose.leftEar.y) **2)<60/*&&
    pose.keypoints[7].score>0.60&&
    pose.keypoints[3].score>0.60*/
    ){
    return true;
  } else return false;
}


function goClassify(){
  try{
  const logits=features.infer(video);
  knn.classify(logits,function(error,result){
    if(error){
      console.log(error);
    }else{
      goClassify();
    }
  });}catch(e){
    console.log(e);
  }
}

function send_score(url){
  var xhr = new XMLHttpRequest();
      
      // Prepare the data to send
      var data = {
          value: score // Change 'Your value here' to the value you want to send
      };
      
      // Convert the data to a JSON string
      var jsonData = JSON.stringify(data);
      
      // Set up the AJAX request
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");
      
      // Define what happens on successful data submission
      xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            location.href = "result.php";   
            // Request was successful
              //console.log(xhr.responseText); // Log the response from the server
          }
      };
      
      // Send the request
      xhr.send(jsonData);
}

