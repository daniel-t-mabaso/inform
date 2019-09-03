function search(str, id) {
    var output;
    var value = '';
    if(str == 'suburbs'){

        value =  document.getElementById(id);
        value =  value.value;
        output = document.getElementById('community-datalist');

    }
    else{
        
        value = str.value;
        str = 'suburbs';
        output = document.getElementById(id);
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

function fetchPosts(type, target){
    var output = document.getElementById(target);
    var str = type;

    if (window.XMLHttpRequest)
    {// Code For IE7+, Firefox, Chrome, Opera, Safari
    Xmlhttp= new XMLHttpRequest();
    }
    else
    {// Code For IE6, IE5
    Xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    
     var Par =  "type=" + str;
        Xmlhttp.open("POST",'assets/php/ajax.php/',true);
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

function getStats(obj, type){
    var output = obj;
    var str = type;

    if (window.XMLHttpRequest)
    {// Code For IE7+, Firefox, Chrome, Opera, Safari
    Xmlhttp= new XMLHttpRequest();
    }
    else
    {// Code For IE6, IE5
    Xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    
     var Par =  "type=" + str;
        Xmlhttp.open("POST",'assets/php/ajax.php/',true);
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

function changeType(email, type){
    var str =type;
    var output = document.getElementById('message-panel');
    if (window.XMLHttpRequest)
    {// Code For IE7+, Firefox, Chrome, Opera, Safari
    Xmlhttp= new XMLHttpRequest();
    }
    else
    {// Code For IE6, IE5
    Xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
    
     var Par =  "type=" + str + "&email=" + email;
        Xmlhttp.open("POST",'assets/php/ajax.php/',true);
        Xmlhttp.setRequestHeader("Content-Type","Application/X-Www-Form-Urlencoded");
        Xmlhttp.send(Par);
          
    Xmlhttp.onreadystatechange = function()
    {
        console.log('ready state changed');
        console.log(Xmlhttp.readyState);
        if (Xmlhttp.readyState == 4 ){
            if(Xmlhttp.status == 200)
                {
                    
                    output.innerHTML =  Xmlhttp.responseText;
                    document.getElementById('view-users-button').click();
                    showMessage();
                }
        }
    }
}
function showMessage(){
    var panel = document.getElementById('message-panel');
    if (panel.classList.contains("success-bg")){
        panel.classList.remove("success-bg");
    }
    if (panel.classList.contains("danger-bg")){
        panel.classList.remove("danger-bg");
    }
    if (!panel.classList.contains("alt-bg")){
        panel.classList.add("alt-bg");
    }
    if (panel.classList.contains("hide")){
        panel.classList.remove("hide");
    }

    setTimeout(function(){panel.classList.add("hide");  }, 3000);
}


