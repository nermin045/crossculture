/**
 * Created by nerminyildiz on 21.04.2016.
 */
function story(showhide,html){
    if(showhide == "show"){
        document.getElementById('popupdiv').style.visibility="visible";
        document.getElementById('popupdiv').innerHTML = html;
    }else if(showhide == "hide"){
        document.getElementById('popupdiv').style.visibility="hidden";
    }
}
