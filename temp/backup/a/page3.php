<html>
<head>
  <link rel="stylesheet" href="bootstrap.min.css" media="screen">
</head>
<body>
  <div class="container text-center">
    <h1 class="mt-3">OPERATION</h1>
  <form method="get">
    <select class="form-control mt-5 rounded-pill" type="text" id="ope">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <button class="form-control btn-lg mt-3 rounded-pill bg-primary text-secondary" type="button" id="submit1" onclick="b()">SUBMIT</button>
  </form>

  <p id="p"></p>
</div>
<script type="text/javascript">

   function b(){
     var ope = document.getElementById('ope').value;
     var numeri=["0"];
     var i,ris;
     var j=0;
     var decodedCookie = decodeURIComponent(document.cookie);
     var cookie = decodedCookie.split(';');
     var cookieLen = cookie[0].length;
     var nameLen = "num1=".length;
     var nameValue = cookie[0];
     var val = nameValue.substring(nameLen,cookieLen);

     for(i=0; i<val.length; i++){
       if(val[i]=='/'){
         j++;
         numeri[j]="0";
       }
       else{
         numeri[j]+=val[i];
       }
     }
     console.log(numeri);

     if(ope=="+"){ris = parseInt(numeri[0])+parseInt(numeri[1]);}
     if(ope=="-"){ris = parseInt(numeri[0])-parseInt(numeri[1]);}
     if(ope=="*"){ris = parseInt(numeri[0])*parseInt(numeri[1]);}
     if(ope=="/"){ris = parseInt(numeri[0])/parseInt(numeri[1]);}

     document.getElementById('p').innerHTML = "Name Len: "+nameLen+"<br>Length n&v: "+cookieLen+"<br> Name & value: "+nameValue+"<br>value: "+ris;

   }
</script>
</body>
</html>
