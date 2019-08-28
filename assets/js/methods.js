function togglePrefenceChecked(obj){
    var checkbox = obj.children[1];
    obj.classList.toggle('unselected');
    var checked = checkbox.checked; 
    console.log(checked);
    if(obj.classList.contains('unselected')){
        checkbox.checked = false;
    }else{
        checkbox.checked = true;
    }
        
}

function disappearAfter(obj, time){
    setTimeout(function(){
        obj.classList.add('hide'); }, time);
}

function hideThisMeShowThat(id1, id2){
    if(!document.getElementById(id1).classList.contains('hide')){
        document.getElementById(id1).classList.add('hide');
    }
    if(document.getElementById(id2).classList.contains('hide')){
        document.getElementById(id2).classList.remove('hide');
    }
}