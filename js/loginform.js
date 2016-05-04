/**
 * Created by Xiao on 17/04/2016.
 */
//// Toggle Function
//$('.toggle').click(function(){
//    // Switches the Icon
//    $(this).children('i').toggleClass('fa-pencil');
//    // Switches the forms
//    $('.form').animate({
//        height: "toggle",
//        'padding-top': 'toggle',
//        'padding-bottom': 'toggle',
//        opacity: "toggle"
//    }, "slow");
//});

function login(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox').style.visibility="hidden";
    }
}