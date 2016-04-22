/**
 * Created by Xiao on 5/04/2016.
 * function: Create event map and its sidebar
 */
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function isRealValue(obj){
    return obj && obj !== "null" && obj!== "undefined";
}

function firstLoad(){

    var clt = getParameterByName('clt');
    if(!isRealValue(clt)){
        load('test');
    }
    else{
        load(clt);
    }
}



function load(culture) {


    if ($('body').hasClass('loaded')){
        $('body').removeClass()
    }


    var markerBounds = new google.maps.LatLngBounds();
    var markerArray = [];
    var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: new google.maps.LatLng(-37.814396, 144.963616),
        zoom: 13,
        mapTypeId: 'roadmap',
        minZoom: 9
        // maxZoom: 14
    });
    //map.setMyLocationEnabled(true);
    //test(map,'test');
    map.set('styles', [
        {
            featureType: 'all',
            elementType: 'all',
            stylers: [
                { hue: '' },
                { lightness: -5 },
                { saturation: 10 },
                { gamma: 0.8}
            ]
        }
    ]);

    google.maps.event.addListenerOnce(map, 'idle', function(){
        $('body').addClass('loaded');
        //alert("load map completed");
    });

    var sidebar = document.getElementById("sidebar");
    sidebar.innerHTML="";
    //   function test(map, culture) {


    var infoWindow = new google.maps.InfoWindow({minWidth: 300, maxWidth: 350});


    // Change this depending on the name of your PHP file
    downloadUrl("../php/genmapxml.php", function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        var b = culture;
        for (var i = 0; i < markers.length; i++) {
            var event = markers[i].getAttribute("event");
            var descr = markers[i].getAttribute("descp");
            var cap = markers[i].getAttribute("capacity");
            var venue = markers[i].getAttribute("venue");
            var start = markers[i].getAttribute("start");
            var end = markers[i].getAttribute("end");
            var logo = markers[i].getAttribute("logo");
            var type = markers[i].getAttribute("type");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lon")));
            //document.write(type);



            var html = '<div id="iw-container">' +
                '<div class="iw-title"><a style="color: white" href="eventDetail.php?event='+event+'">'+event+'</a></div>' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle">Where?</div>' +
                '<a href="eventDetail.php?event=' + event +'"><img src=' + logo + ' width="140"></a>' +
                '<div>' + venue + '</div><br>' +
                '<div class="iw-subTitle">When?</div>' +
                '<div>' + start.substr(8, 2) +'/'+ start.substr(5,2) +'/'+ start.substr(0,4) +'<br>' + start.substr(11, 5) + '</div><br>' +
                '<div><a href="eventDetail.php?event=' + event +'">Get More Information</a></div></div>' +
                '<div class="iw-bottom-gradient"></div>' +
                '</div>';

            var html_sidebar ='<div id="side-container">' +
                '<div class="side-title">' + event + '</div>' +
                '<div class="side-img">' +'<img src=' + logo + ' height="100">' +
                '<p><a href="eventDetail.php?event=' + event +'">Get More Information</a></p>' +
                '</div>' +
                '<div class="iw-bottom-gradient"></div>';


            //var a = document.getElementById("Culture");

            //var b = a.value;


            //document.write(culture);
            //document.write(b);

            if ((type == b && b == 'Greek OR Greece') || type == b && b == 'Chinese OR China' || type == b && b == 'Turkish OR Turkey' || type == b && b == 'Indian OR India' || type == b && b == 'Italian OR Italy' || b == 'test') {

                if (type == 'Greek OR Greece') {
                    var icon1 = '../images/Greece48.png';
                }
                else if (type == 'Chinese OR China') {
                    var icon1 = '../images/China48.png';
                }
                else if (type == 'Turkish OR Turkey') {
                    var icon1 = '../images/Turkey48.png';
                }
                else if (type == 'Indian OR India') {
                    var icon1 = '../images/India48.png';
                }
                else if (type == 'Italian OR Italy') {
                    var icon1 = '../images/Italy48.png';
                }

                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon1
                });
                var options={
                    sidebarItem: html_sidebar,
                    sidebarItemWidth: "326px"
                }
                marker.setOptions(options);

                bindInfoWindow(marker, map, infoWindow, html);
                var idleIcon = marker.getIcon();

                if(options.sidebarItem){
                    marker.sidebarButton = new SidebarItem(marker, options);
                    marker.sidebarButton.addIn("sidebar");
                }
                markerBounds.extend(point);
                markerArray.push(marker);

            }

        }


    });

    function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
            if(this.sidebarButton)this.sidebarButton.button.focus();
        });


        google.maps.event.addListener(map, 'click', function () {
            infoWindow.close();
        });


    }

}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {
}

function SidebarItem(marker, opts){
    var tag = opts.sidebarItemType || "button";
    var row = document.createElement(tag);
    row.innerHTML = opts.sidebarItem;
    row.className = opts.sidebarItemClassName || "sidebar_item";
    row.style.display = "block";
    row.style.width = opts.sidebarItemWidth || "120px";
    row.onclick = function(){
        google.maps.event.trigger(marker, 'click');
    }
    row.onmouseover = function(){
        google.maps.event.trigger(marker, 'mouseover');
    }
    row.onmouseout = function(){
        google.maps.event.trigger(marker, 'mouseout');
    }
    this.button = row;
}
// adds a sidebar item to a

SidebarItem.prototype.addIn = function(block){

    this.div= document.getElementById("sidebar");
    this.div.appendChild(this.button);
}
// deletes a sidebar item
SidebarItem.prototype.remove = function(){
    if(!this.div) return false;
    this.div.removeChild(this.button);
    return true;
}


