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
            if (isrightknee(pose)) {
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
            img.src="/assets/img/left_ankle_right_knee.jpeg"
            label_pose.innerText = "左肘碰右膝";
          }
        }
      }else{
        alert(score);
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

function isrightknee(pose){
  if(                                                       //若左肘與右膝距離<50，且..
    Math.sqrt(Math.abs(pose.leftKnee.x-pose.rightElbow.x) **2+
    Math.abs(pose.leftKnee.y-pose.rightElbow.y) **2)<50&&
    pose.keypoints[13].score>0.60&&
    pose.keypoints[8].score>0.60
    ){
    return true;
  }else return false;
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