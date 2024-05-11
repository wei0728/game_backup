<html>
 <head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 </head>

 </body>
 <div id = "random"></div>

 <script type = "text/javascript">

$(document).ready(function() {

var number1 = Math.round(Math.random() * 6) + 1;
var number2 = Math.round(Math.random() * 6) + 1;
var randomAnswer = number1 + number2;

$.ajax({
  url: "test.php",
  method: "POST",
  dataType: "json",
  data: {randomAnswer: randomAnswer},
  success: function (result) {     
    console.log( "hello world");
      alert("result: " + result);
      $("#random").html(result);
   }
 });
});

</script>

</body>
</html>
