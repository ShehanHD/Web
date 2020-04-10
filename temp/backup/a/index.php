<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" media="screen">
  <script type="text/javascript">
function a(){
   console.log("ciao");
   var num1 = document.getElementById('num1').value;
   var giorni = 20;
   var d = new Date();
   d.setTime(d.getTime() + (giorni*24*3600*1000));
   var expires = "expires="+ d.toUTCString();
   document.cookie = "num1="+num1+"; expires="+expires+"; path=/;";

   location.href="page2.php";
}
  </script>
</head>
<body>
  <div class="container text-center">
    <h1 class="mt-3">1<sup>st</sup> NUMBER</h1>
    <form method="get">
      <input class="form-control mt-5 rounded-pill" type="number" id="num1">
      <button class="form-control btn-lg mt-3 rounded-pill bg-primary text-secondary" type="button" onclick="a()">SUBMIT</button>
    </form>
    </div>
</body>
</html>
