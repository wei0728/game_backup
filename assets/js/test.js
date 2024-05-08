var number1 = Math.round(Math.random() * 6) + 1;
var number2 = Math.round(Math.random() * 6) + 1;
var randomAnswer = number1 + number2;
$ (document).ready(function() {
    $.ajax({
       url: 'index.php',
       type: 'POST',
       dataType:'json', 
       data: ({randomAnswer: randomAnswer}),
       success: function(data) {
          console.log(data);
       }
    });
});