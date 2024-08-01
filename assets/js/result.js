let img = document.getElementById('img1');
let pose = document.getElementById('pose');


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
    switch (pose_label){
        case "jump_pack":
            pose.innerText = "jump_pack";
            img1.src = "../assets/img/jump_pack.jpeg";
        case "deep_squat":
            pose.innerText = "deep_squat";
            img1.src = "../assets/img/squat.webp";
        case "left_knee":
            pose.innerText = "left_knee";
            img1.src = "../assets/img/left_ankle_left_knee.jpeg";
        case "right_knee":
            pose.innerText = "right_knee";
            img1.src = "../assets/img/left_ankle_right_knee.jpeg";
        case "sidebend":
            pose.innerText = "sidebend";
            img1.src = "../assets/img/jump_pack.jpeg";
    }
});