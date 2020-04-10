<html>
<head>
  <link rel="stylesheet" href="bootstrap.min.css" media="screen">
</head>
<body>
  <div class="container text-center">
    <h1 class="mt-3">2<sup>nd</sup> NUMBER</h1>
  <form method="get">
    <input class="form-control mt-5 rounded-pill" type="number" id="num2">
    <button class="form-control btn-lg mt-3 rounded-pill bg-primary text-secondary" type="button" id="submit1" onclick="b()">SUBMIT</button>
  </form>
</div>
<script type="text/javascript">

   function b(){
     var num2 = document.getElementById('num2').value;
     var giorni = 20;
     var d = new Date();
     d.setTime(d.getTime() + (giorni*24*3600*1000));
     var expires = "expires="+ d.toUTCString();

     var decodedCookie = decodeURIComponent(document.cookie);
     var cookie = decodedCookie.split(';');
     var cookieLen = cookie[0].length;
     var nameLen = "num1=".length;
     var nameValue = cookie[0];
     var val = nameValue.substring(nameLen,cookieLen);

     document.cookie = "num1="+val+"/"+num2+"; expires="+expires+"; path=/;";

      location.href="page3.php";
     //document.getElementById('p').innerHTML = "Name Len: "+nameLen+"<br>Length n&v: "+cookieLen+"<br> Name & value: "+nameValue+"<br>value: "+val;

   }
</script>
</body>
</html>
