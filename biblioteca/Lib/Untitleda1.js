let a =  <tr><td><input class='form-control rounded-pill' value='"+arr[i][5]+"' disabled></td><td><input class='form-control rounded-pill' id='titolo"+i+"' value='"+arr[i][0]+"' disabled></td><td><input class='form-control rounded-pill' id='autore"+i+"' value='"+arr[i][1]+"' disabled></td><td><input class='form-control rounded-pill' id='id"+i+"' value='"+arr[i][2]+"' disabled></td><td><button id='modifica"+arr[i][2]+"' class='btn rounded-pill btn-outline-primary mr-1' onclick=\"edit('"+arr[i][2]+","+i+"')\">Modifica</button><button id='fatto"+arr[i][2]+"'  class='btn rounded-pill btn-outline-primary' onclick=\"fatto('"+arr[i][0]+"','"+arr[i][1]+"','"+arr[i][2]+"','"+i+"')\" disabled>Fatto</button></td></tr>";