/**
 * Created by nerminyildiz on 16.04.2016.
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
    if(clt == null){
        load('test');

    }else{
        //alert(clt);
        load(clt);
    }
}
function load(culture) {

    //alert(culture);
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
    //test(map);

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

    var sidebar = document.getElementById("sidebar");
    sidebar.innerHTML="";

    // var infoWindow = new google.maps.InfoWindow({minWidth: 300, maxWidth: 350});


    // Change this depending on the name of your PHP file
    downloadUrl("../php/genstorymap.php", function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        var b = culture;
        for (var i = 0; i < markers.length; i++) {
            var title = markers[i].getAttribute("tit");
            var text = markers[i].getAttribute("descp");
            var pic = markers[i].getAttribute("img");
            var postdate = markers[i].getAttribute("pdate");
            var cultur = markers[i].getAttribute("cul");
            var uname = markers[i].getAttribute("user");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lon")));
            //document.write(type);


            var popupdiv = '<div id="popupdiv" style="text-align: center; margin-top: 7px;">'+
                '<h2>'+title+'</h2></div>'+
                '<div style="text-align: center"><b>'+cultur+' Story</b></div>'+
                '<div style="text-align: center"><b>Posted by: '+uname+'</b></div>'+
                '<div style="text-align: center; margin-top: 7px;" ><img src="../photos/'+pic+'" height="200px"></div>'+
                '<div style="text-align: center; margin-left: 30px; margin-right: 30px; margin-top: 7px;"><b>'+text+'</b></div>'+
                '<div style="text-align: center; margin-top: 7px; margin-bottom: 7px;"><b>Posted on: '+postdate.substr(8,2)+'/'+
                postdate.substr(5,2)+'/'+postdate.substr(0,4) +'</b></div>';

            //
            // var html = '<div id="iw-container">' +
            //     '<div class="iw-title">' + title + '</div>' +
            //     '<img src="../photos/'+pic+'" width="300px;"></div>'+
            //     '<div align="center" class="iw-content">' +
            //     '<p>'+  text +'</p>'+
            //     '<div class="iw-bottom-gradient">' +
            //     '</div>';


            var html1 = '<div id="container" style="text-align: center">' +
                '<h3 style="color: black">' + title + '</h3>' +
                '<div class="row">'+ cultur+ ' Story</div>' +
                '<div class="row">Posted by:'+ uname+ ' Story</div>' +
                '<div class="row">' +'<img src="../photos/' + pic + '" height="150" class="img-rounded" style="max-width: 90%" onerror="imgError(this);">' + '</div>' +
                '</div>';;

            if ((cultur == b && b == 'Greek') || cultur == b && b == 'Chinese' || cultur == b && b == 'Turkish' || cultur == b && b == 'Indian' || cultur == b && b == 'Italian' || b=='test') {

                if (cultur == 'Greek') {
                    var icon1 = '../images/Greece48.png';
                }
                else if (cultur == 'Chinese') {
                    var icon1 = '../images/China48.png';
                }
                else if (cultur == 'Turkish') {
                    var icon1 = '../images/Turkey48.png';
                }
                else if (cultur == 'Indian') {
                    var icon1 = '../images/India48.png';
                }
                else if (cultur == 'Italian') {
                    var icon1 = '../images/Italy48.png';
                }

                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon1
                });
                var options={
                    sidebarItem: html1,
                    sidebarItemWidth: "100%"
                }
                marker.setOptions(options);


                bindPopup(marker,map,popupdiv);
                // bindInfoWindow(marker, map, infoWindow, html);
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

    function bindPopup(marker,map,popupdiv) {
        google.maps.event.addListener(marker, 'click', function(){
            story('show',popupdiv);
            // window.document.write(popupdiv);
        })
        google.maps.event.addListener(map, 'click', function(){
            story('hide');
            // window.document.write(popupdiv);
        })


    }
    // function bindInfoWindow(marker, map, infoWindow, html) {
    //     google.maps.event.addListener(marker, 'click', function () {
    //         infoWindow.setContent(popupdiv);
    //         infoWindow.open(map, marker);
    //         if(this.sidebarButton)this.sidebarButton.button.focus();
    //     });
    //
    //
    //     google.maps.event.addListener(map, 'click', function () {
    //         infoWindow.close();
    //     });
    //
    //
    // }
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

