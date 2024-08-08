function jump_pack() {
    send_score('jump_pack');
}
function deep_squat_rank(){
    send_score('deep_squat');
}
function left_ankle_left_knee_rank(){
    send_score('left_ankle_left_knee');
}
function side_bend_rank(){
    send_score('sidebend');
}
function send_score(pose){
    var xhr = new XMLHttpRequest();
        
        // Prepare the data to send
        var data = {
            value: pose // Change 'Your value here' to the value you want to send
        };
        
        // Convert the data to a JSON string
        var jsonData = JSON.stringify(data);
        
        // Set up the AJAX request
        xhr.open("POST", 'http://127.0.0.1/php/account_center.php', true);
        xhr.setRequestHeader("Content-Type", "application/json");
        
        // Define what happens on successful data submission
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let pattern = /\[.*?\]/g;
            let matches = this.responseText.match(pattern);

            // 解析 JSON 字串為 JavaScript 陣列
            let rank = JSON.parse(matches[0]);

            // 使用 map 函數將每個元素轉換成一個包含該元素的陣列
            let rank2 = rank.map(item => [item]);
            // 查看結果
            document.getElementById('rank_name').innerText = pose + ' rank : ';
            document.getElementById('result1').innerText = '1st'+ ' '+rank2[0];
            document.getElementById('result2').innerText = '2nd'+ ' '+rank2[1];
            document.getElementById('result3').innerText = '3th'+ ' '+rank2[2];
            document.getElementById('result4').innerText = '4th'+ ' '+rank2[3];
            document.getElementById('result5').innerText = '5th'+ ' '+rank2[4];
            // 為數組中的每個項目創建<li>並加到<ul>中
              // Request was successful
                //console.log(xhr.responseText); // Log the response from the server
            }
            else {
                console.log("fail");
            }
        };
        
        // Send the request
        xhr.send(jsonData);
  }