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

function viewEditablePost(id, title, description, url, start, end){
    var div = document.getElementById('pop-up-details-panel');
    var output = '<div class="heading bold center-txt vertical-padding-15">Edit Post</div><form name="edit-post" method="POST" action="assets/php/requests.php" enctype="multipart/form-data">';
    output += "<input type='hidden' name='post-id' value='"+id+"'/>";
    output += "<div>Title</div><input class='inputField' name='post-title' value='"+title+"' required/><div>Image</div>";
    output += "<div class='footnote italic vertical-padding-10'><b>Current Image:</b> "+url+"</div>";
    output += "<input type='hidden' name='post-url-original' value='"+url+"'/>";
    output += '<input type="file" name="postUrl" id="postUrl" accept="image/*" >';
    output += "<div class='vertical-margin-10'>Description</div><textarea  class='detailField' name='post-description'>"+description+"</textarea>";
    if(!(!start || start == "-")){
        output += "<div>Start Date</div><input class='inputField' type='datetime-local' name='post-start' required value='"+start+"'/>";
    }
    else{
        output += "<input class='inputField' type='hidden' name='post-start'/>";
    }
    
    if(end){
        output += "<div>End Date</div>";
        output += "<input class='inputField' type='datetime-local' name='post-end' value='"+end+"'/>";
    }
    else{
        output += "<input class='inputField' type='hidden' name='post-end'/>";
    }
    output += "<div class=' center-txt'><input type='submit' name='edit-post' class='button' value='Save'></div><div class=' center-txt'><input type='submit' name='delete-post' class='button danger-bg' value='Delete'></div></form>"
    div.innerHTML = output;
    
}

function enableThisDisableThat(id1, id2){
    var enable = document.getElementById(id1);
    var disable = document.getElementById(id2);

    if(!enable.classList.contains('primary-bg')){
        enable.classList.add('primary-bg');
    }
    if(enable.classList.contains('neutral-bg')){
        enable.classList.remove('neutral-bg');
    }

    if(!disable.classList.contains('neutral-bg')){
        disable.classList.add('neutral-bg');
    }
    if(disable.classList.contains('primary-bg')){
        disable.classList.remove('primary-bg' );
    }
}

function hideAll(id){
    var preferences = document.getElementsByClassName(id);
        
    for (var i = 0, l = preferences.length; i<l; i++){
        if(!preferences[i].classList.contains('hide')){
            preferences[i].classList.add('hide');
        }
    }
}

function selectThisOverOther(obj, id){
    var preferences = document.getElementsByClassName(id);
        
    for (var i = 0, l = preferences.length; i<l; i++){
        if(preferences[i].classList.contains('primary-bg')){
            preferences[i].classList.remove('primary-bg');
        }
    }
    obj.classList.add('primary-bg');
}
