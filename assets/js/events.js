window.addEventListener('load', function(){ 
    var preferences = document.getElementsByClassName('preference');
        
    for (var i = 0, l = preferences.length; i<l; i++){
        if(!preferences[i].classList.contains('unselected')){
            preferences[i].children[1].checked = true;
        }
        preferences[i].onclick = function(){
            togglePrefenceChecked(this);
        };
    }
}, false);
window.addEventListener('load', function(){ 
    var notificationPopUp = document.getElementsByClassName('pop-up-notification');
    for (var i = 0, l = notificationPopUp.length; i<l; i++){
        disappearAfter(notificationPopUp[i], 3000);
    }
}, false);