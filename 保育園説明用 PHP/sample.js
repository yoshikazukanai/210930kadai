function rand(n){
    var r = Math.floor(Math.random()*n+1);
 return r;
}

var t = rand(10);
$("#rand").html(t);



const r = Math.ceil( Math.random()*5);
alert (r);

var g = Math.floor(Math.random()*7+1);
alert(g)

//足し算関数を定義
function add(a1,a2,en){
    if(en=="+"){
var n = a1 + a2;
    }

return n;
}

var t = add(10,40);
alert(t);


function strfnc(){
    var str = "関数知らない"
    alert(str)

}

strfnc();
strfnc();
strfnc();

$(function() {
$(".c-button").click(function(){
window.open("https://kato-shoten.jp/","_blank","top=50,left=50,width=500,height=500,scrollbars=1,location=0,menubar=0,toolbar=0,status=1,directories=0,resizable=1");
    return false;
    });
});

function new_page(){
    window.open(“url”,””,”“);
   };

   window.open(“任意のurl”,”ウインドウ名”,”プロパティ”);
   width=800,height=600

   function back_page(){
    history.back();
   };

   function next_page(){
    history.forward();
   };

   $('#c-button').on('click', function () {
    const data = {
    title: $('#input').val(),
    text: $('#text_area').val(),
    };
   const jsonData = JSON.stringify(data);
   localStorage.setItem('memo', jsonData);
  });

  $("#c-button").on("click",function(){
      $("body").css("background","#000000");

  });

//カーソルつくる
  var
cursor = $(".cursor"),
cWidth = 20, //カーソルの大きさ
mouseX = 0, //マウスのX座標
mouseY = 0; //マウスのY座標

$(document).on('mousemove', function(e) {
  mouseX = e.pageX;
  mouseY = e.pageY;
  cursor.css({
    //カーソルの真ん中に座標軸が来るよう、
    //カーソルの大きさの半分を引きます
    left: mouseX - (cWidth / 2),
    top: mouseY - (cWidth / 2)
  })
});

//カーソルの遅延アニメーション
//ほんの少ーーーしだけ遅延させる 0.001秒
TweenMax.to({}, .001, {
    repeat: -1,
    onRepeat: function() {
      posX += (mouseX - posX) / delay;
      posY += (mouseY - posY) / delay;
      
      TweenMax.set(follower, {
          css: {    
            left: posX - (fWidth / 2),
            top: posY - (fWidth / 2)
          }
      });
      
      TweenMax.set(cursor, {
          css: {    
            left: mouseX - (cWidth / 2),
            top: mouseY - (cWidth / 2)
          }
      });
    }
  });
  
  //マウス座標を取得
  $(document).on("mousemove", function(e) {
      mouseX = e.pageX;
      mouseY = e.pageY;
  });
  
  $("a").on({
    "mouseenter": function() {
      cursor.addClass("is-active");
      follower.addClass("is-active");
    },
    "mouseleave": function() {
      cursor.removeClass("is-active");
      follower.removeClass("is-active");
    }
  });
  //API MAP
  
//---------現在位置が取得成功時に実行する関数--------
let map;
function mapsInit(position) {
  const lat = position.coords.latitude;
  const lon = position.coords.longitude;  
  map = new Microsoft.Maps.Map('#myMap', {
          center: new Microsoft.Maps.Location(lat, lon), 
          mapTypeId: Microsoft.Maps.MapTypeId.load, 
          zoom: 15 
      });
  pushpin(lat,lon,map);
}

//-----現在地にピンを描画--------------
function pushpin(la,lo,now){
  let location = new Microsoft.Maps.Location(la,lo)
  let pin = new Microsoft.Maps.Pushpin(location, {
  color: 'red',            
  draggable:false,          
  enableClickedStyle:true, 
  enableHoverStyle:true,   
  visible:true             
  });
  now.entities.push(pin);
};

//---------現在位置が取得失敗時に実行する関数--------
function mapsError(error) {
let e = "";
if (error.code == 1) { 
  e = "位置情報が許可されてません";
}
if (error.code == 2) { 
  e = "現在位置を特定できません";
}
if (error.code == 3) { 
  e = "位置情報を取得する前にタイムアウトになりました";
}
alert("エラー：" + e);
};

//-----------------現在地取得と地図描画-----------
function GetMap() {
navigator.geolocation.getCurrentPosition(mapsInit, mapsError);
}

function mapsInit(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;  
    map = new Microsoft.Maps.Map('#myMap', {
            center: new Microsoft.Maps.Location(lat, lon), 
            mapTypeId: Microsoft.Maps.MapTypeId.load, 
            zoom: 15 
        });
    pushpin(lat,lon,map);
  
  //----------------Direction Moduleの入手-----------------
  //------------------------------------------------------
    Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
          directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
    directionsManager.setRenderOptions({itineraryContainer:'#directionsItinerary'});
          directionsManager.showInputPanel('directionsPanel');
      });
  //------------------------------------------------------
  }
  //--------------------ルート記録スタート-------------------
let watchID;
let startWatch;
let key=0;
$("#start_btn").on('click',function(){
  localStorage.clear();
  let lat;
  let lon;
  watchID = navigator.geolocation.watchPosition(function(pos){
  lat = pos.coords.latitude;
  lon = pos.coords.longitude;
  },mapsError);
  startWatch=setInterval(function(){
    let value = lat+","+lon;
    localStorage.setItem(key,value);
    key++;
  },5000);
})

//--------------------ルート記録ストップ-------------------
$("#stop_btn").on('click',function(){
    clearInterval(startWatch);
    navigator.geolocation.clearWatch(watchID);
    let run_record="";
    for(i=0;i<(localStorage.length-1);i++){
        let data=localStorage.getItem(i);
        run_record += data+":"; 
    };
    run_record+=localStorage.getItem(key);
    key+=1;
    localStorage.setItem(key,run_record);
})

$("#write_btn").on('click',function(){
    //-----01:localStorageより座標データ束の取得--------------      
    let data1 = (localStorage.getItem(key)).split(":"); 
    data1.pop();
    let data2=[];
    //---------------02:座標データを25個に調整-------------
    if(data1.length>25){
      data2.push(data1[0]);
      if(data1.length%25 != 0){
        let num1=data1.length/25;
        let count=1;
        while(count<24){
          data2.push(data1[Math.round(count*num1)]);
          count++;
        }
        data2.push(data1.slice(-1)[0]);
      }else{
        let num2=data1.length/25;
        for(i=num2;i<25;i+num2){
          data2.push(data1[i]);
        }
      }        
    }else{
      data2=data1;
    }
    //--------------03:中継点の座標データを追加----------------
    for(i=0;i<data2.length;i++){
      let array = (data2[i]).split(",");
      let lati=array[0];
      let long=array[1];
      Waypoint = new Microsoft.Maps.Directions.Waypoint({ location:new Microsoft.Maps.Location(lati,long)});
      directionsManager.addWaypoint(Waypoint);
    } 

    //------------04:描画ルートを歩行ルートに指定--------------
    let mode= Microsoft.Maps.Directions.RouteMode.walking;
        directionsManager.setRequestOptions({
        routeMode: mode
    });

    //------------05:地図へルートを描画-----------------------
    directionsManager.calculateDirections();    
})
function mapsInit(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;  
    map = new Microsoft.Maps.Map('#myMap', {
            center: new Microsoft.Maps.Location(lat, lon), 
            mapTypeId: Microsoft.Maps.MapTypeId.load, 
            zoom: 15,
   //----------①地図上の機能ボタンを非表示-------------//
            showZoomButtons:false,    
            showMapTypeSelector:false,
            showScalebar:false,
            showTermsLink:false
        });
    pushpin(lat,lon,map);
  
    Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
          directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
    directionsManager.setRenderOptions({itineraryContainer:'#directionsItinerary'});
  //----------②input Panelの消去---------------//
  //----------③中継点の座標ピンの非表示-------------//
    directionsManager.setRenderOptions({
              firstWaypointPushpinOptions:{visible:true},
              lastWaypointPushpinOptions:{visible:true},
              waypointPushpinOptions:{visible:false}
          });  
      });
  }
