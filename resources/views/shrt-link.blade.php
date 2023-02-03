<meta http-equiv="refresh" content="3;url={{$link}}" />

<p id="countdown"></p>

<script>
var countDownTime = 3;

var x = setInterval(function() {
  countDownTime--;

  document.getElementById("countdown").innerHTML = countDownTime + " seconds";

  if (countDownTime <= 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "Loading";
  }
}, 1000);
</script>
