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

function toggleMenu(){
    document.getElementById('menu-overlay').classList.toggle('hide');
    document.getElementById('navigation-panel').classList.toggle('hide');
    document.getElementById('menu-button').classList.toggle('shift-menu-button');
    document.getElementById('menu-button').classList.toggle('unselected');
}

function changeValue(id, value){
    document.getElementById(id).value = value;
}

function hideElement(id){
    document.getElementById(id).classList.toggle('hide');
}

function changeImgSrc(id, obj){
    document.getElementById(id).src = obj.value;
}
var oldDp = '';
function showImage(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            oldDp = document.getElementById(target).src;
            document.getElementById(target).src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function restoreDp(target){
    document.getElementById(target).src = oldDp;
    oldDp = '';
}

function toggleThis(id){
    document.getElementById(id).classList.toggle('hide');
}

function viewPost(id, title, description, url, start, end){
    var div = document.getElementById('pop-up-details-panel');
    var output = '';
    output += "<input type='hidden' name='post-id' value='"+id+"'/>";
    output += "<div class='subheading bold center-txt'>"+title+"</div>";
    if(url != "-"){
        output += "<div class=' vertical-margin-15 uninterupted-max-width medium-small-height hide-overflow alt-bg'><img class='uninterupted-max-width' src='"+url+"'/></div>";
    }else{
        output += "<div class=' vertical-margin-15 uninterupted-max-width medium-small-height medium-small-line-height hide-overflow alt-bg white-txt heading center-txt bold'>No Image</div>";
    }
    output += "<div class='normal vertical-padding-10'>"+description+"</div>";
    if(!(!start || start == "-")){
        output += "<div class='footnote'>Posted on <b>"+start+"</b></div>";
    }
    if(end){
        output += "<div class='footnote'><b> until "+end+"</b></div>";
    }
    div.innerHTML = output;
    
}