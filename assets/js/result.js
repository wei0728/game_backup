let img = document.getElementById('img1');
let pose = document.getElementById('pose');
let score = document.getElementById('score');


function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

document.addEventListener("DOMContentLoaded", function() {
    let pose_label = getCookie('pose'); // 從cookie中獲取sport的值
    let score_label = getCookie('score'); // 從cookie中獲取sport的值
    console.log(pose_label);
    console.log(score_label);
    score.innerText = "Your score is : "+ score_label;
    switch (pose_label){
        case "jump_pack":
            pose.innerText = "jump_pack";
            img.src = "../assets/img/jump_pack.jpeg";
            break;
        case "deep_squat":
            pose.innerText = "deep_squat";
            img.src = "../assets/img/squat.webp";
            break;
        case "left_ankle_left_knee":
            pose.innerText = "left_ankle_left_knee";
            img.src = "../assets/img/left_ankle_left_knee.jpeg";
            break;
        case "right_knee":
            pose.innerText = "right_knee";
            img.src = "../assets/img/left_ankle_right_knee.jpeg";
            break;
        case "sidebend":
            pose.innerText = "sidebend";
            img.src = "../assets/img/sidebend.jpeg";
            break;
    }
});

function updateComments() {
    let score_label = getCookie('score'); // 從cookie中獲取sport的值
    document.getElementById('comment1').classList.remove('highlight');
    document.getElementById('comment2').classList.remove('highlight');
    document.getElementById('comment3').classList.remove('highlight');

    if (score_label >= 0 && score_label <= 3) {
        document.getElementById('comment1').classList.add('highlight');
    } else if (score_label >= 4 && score_label <= 6) {
        document.getElementById('comment2').classList.add('highlight');
    } else if (score_label >= 7) {
        document.getElementById('comment3').classList.add('highlight');
    }
}