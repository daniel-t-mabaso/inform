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