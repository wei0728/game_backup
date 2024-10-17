let img = document.getElementById('img1');
let pose = document.getElementById('pose');
let score = document.getElementById('score');
let grade1 = document.getElementById('grade1');
let grade2 = document.getElementById('grade2');
let grade3 = document.getElementById('grade3');
let grade4 = document.getElementById('grade4');
let grade5 = document.getElementById('grade5');
let age = document.getElementById('age');

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const pose_label = urlParams.get('pose');
    console.log(pose_label);
    const mode_label = urlParams.get('mode');
    //score.innerText = "Your score is : "+ score_label;
    switch (pose_label){
        case "jump_pack":
            pose.innerText = "開合跳";
            img.src = "../assets/img/jump_pack.jpeg";
            break;
        case "deep_squat":
            pose.innerText = "深蹲";
            img.src = "../assets/img/squat.webp";
            break;
        case "left_ankle_left_knee":
            pose.innerText = "左肘碰左膝";
            img.src = "../assets/img/left_ankle_left_knee.jpeg";
            break;
        case "sidebend":
            pose.innerText = "站姿側曲";
            img.src = "../assets/img/sidebend.jpeg";
            break;
        case "frontbend":
            pose.innerText = "站姿前曲";
            img.src = "../assets/img/frontbend.jpg";
            break;
        default:
    }
    send_score("marathon_result.php");

});


function clear_highlight(){

}

function startConfetti() {
    run();
    const canvas = document.getElementById('confettiCanvas');
    const ctx = canvas.getContext('2d');
    canvas.style.display = 'block'; // 显示画布
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  
    const confetti = [];
    const confettiCount = 300; // 您可以根据需要调整粒子数量
    const gravity = 0.5;
    const terminalVelocity = 5;
    const drag = 0.075;
    const colors = [
      { front: 'red', back: 'darkpurple' },
      { front: 'blue', back: 'darkgreen' },
      { front: 'yellow', back: 'darkorange' },
      { front: 'pink', back: 'darkblue' },
      { front: 'purple', back: 'turquoise' },
      // 根据需要添加更多颜色
    ];
  
    // 调整画布大小
    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
  
    // 生成指定范围内的随机数
    function randomRange(min, max) {
      return Math.random() * (max - min) + min;
    }
  
    // 初始化彩带粒子
    function initConfetti() {
        for (let i = 0; i < confettiCount; i++) {
            confetti.push({
            color: colors[Math.floor(randomRange(0, colors.length))],
            dimensions: { x: randomRange(10, 20), y: randomRange(10, 30) },
            position: { x: randomRange(0, canvas.width), y: canvas.height - 1 },
            rotation: randomRange(0, 2 * Math.PI),
            scale: { x: 1, y: 1 },
            velocity: { x: randomRange(-25, 25), y: randomRange(0, -50) }
            });
        }
        }
  
    // 渲染动画
    function render() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        confetti.forEach((confetto, index) => {
            confetto.position.x += confetto.velocity.x;
            confetto.position.y += confetto.velocity.y;
            confetto.velocity.y += gravity;
            confetto.velocity.x += confetto.velocity.x * drag;
    
            // 旋转
            confetto.rotation += confetto.velocity.x * 0.01;
    
            // 绘制彩带
            ctx.save();
            ctx.translate(confetto.position.x, confetto.position.y);
            ctx.rotate(confetto.rotation);
            ctx.fillStyle = confetto.color.front;
            ctx.fillRect(-confetto.dimensions.x / 2, -confetto.dimensions.y / 2, confetto.dimensions.x, confetto.dimensions.y);
            ctx.restore();
    
            // 如果彩带超出屏幕底部，则移除
            if (confetto.position.y >= canvas.height) {
            confetti.splice(index, 1);
            }
    
            // 如果所有彩带都已落下，则隐藏画布
            if (confetti.length === 0) {
            canvas.style.display = 'none'; // 隐藏画布
            }
        });
    
        if (confetti.length > 0) {
            requestAnimationFrame(render);
        }
    }
  
    // 初始化和开始渲染
    initConfetti();
    render();
  
    // 监听窗口调整大小事件
    window.addEventListener('resize', resizeCanvas);
}

function sleep(time){
    return new Promise((resolve) => setTimeout(resolve, time));
}
    
async function run(){
    await sleep(1000);
}


function send_score(url){
    var xhr = new XMLHttpRequest();
        const urlParams = new URLSearchParams(window.location.search);
        var va_pose = urlParams.get('pose');
        var va_mode = urlParams.get('mode');
        // Prepare the data to send
        var data = {
          mode: va_mode,
          pose: va_pose
        };
        
        // Convert the data to a JSON string
        var jsonData = JSON.stringify(data);
        
        // Set up the AJAX request
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        
        // Define what happens on successful data submission
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              // Request was successful
                //console.log(xhr.responseText); // Log the response from the server
            }
        };
        
        // Send the request
        xhr.send(jsonData);
  }
  