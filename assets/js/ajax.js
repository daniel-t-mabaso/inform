function search(str, id) {
    var output;
    var value = '';
    if(str == 'suburbs'){

        value =  document.getElementById(id);
        value =  value.value;
        output = document.getElementById('community-datalist');

    }
    if (value.length==0) { 
        output.innerHTML="";
        return;
      }


    if (window.XMLHttpRequest)
    {// Code For IE7+, Firefox, Chrome, Opera, Safari
    Xmlhttp= new XMLHttpRequest();
    }
    else
    {// Code For IE6, IE5
    Xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    
    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    console.log(dir);
    
     var Par = "term="  + value + "&type=" + str;
        Xmlhttp.open("POST",'assets/php/ajax.php/',true);
        //xmlhttp.open("GET", "./assets/php/requests.php?q=" + str + "&id=" + value, true);
        Xmlhttp.setRequestHeader("Content-Type","Application/X-Www-Form-Urlencoded");
        Xmlhttp.send(Par);
          
    Xmlhttp.onreadystatechange = function()
    {
        console.log('ready state changed');
        console.log(Xmlhttp.readyState);
    if (Xmlhttp.readyState == 4 ){
        if(Xmlhttp.status == 200)
            {
                console.log('Got an Ajax result');
                output.innerHTML =  Xmlhttp.responseText;
            }
    }
    }
}