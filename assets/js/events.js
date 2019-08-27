window.addEventListener('load', function(){ 
    var preferences = document.getElementsByClassName('preference');
        
    for (var i = 0, l = preferences.length; i<l; i++){
        
        preferences[i].onclick = function(){
            togglePrefenceChecked(this);
        };
    }
}, false);