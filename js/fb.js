var bFbStatus = false;
var fbID = "";
var fbName = "";
var fbEmail = "";

window.fbAsyncInit = function() {
  FB.init({
    //appId      : '1496188763803694',//fortest
    appId      : '1376912239120229',// Online
    cookie     : true,
    xfbml      : true,
    version    : 'v2.8'
  });
  FB.AppEvents.logPageView();
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response)
{

  if(bFbStatus == false)
  {
    fbID = response.authResponse.userID;

      if (response.status == 'connected') {
      getCurrentUserInfo(response)
      } else {
      FB.login(function(response) {
        if (response.authResponse){
        getCurrentUserInfo(response)
        } else {
        console.log('Auth cancelled.')
        }
      }, { scope: 'email' });
      }
  }


  bFbStatus = true;
}

function getCurrentUserInfo() {
FB.api('/me?fields=name,email', function(userInfo) {

  fbName = userInfo.name;
  fbEmail = userInfo.email;

  checkface(fbID,fbName,fbEmail);
  //alert(fbName);
  //alert(fbEmail);

});
}

function checkLoginState() {
FB.getLoginStatus(function(response) {
  statusChangeCallback(response);
});
}

function checkface(fbID,fbName,fbEmail){
//alert(fbID);
$.ajax({
  url : "ajax_facebook.php",
  type : "post",
  async : false,
  data : {
    'fbID' : fbID,
    'fbName' : fbName,
    'fbEmail' : fbEmail,
  },
  success : function(s)
  {
    //redirect(s);
    if(s){
      window.location="index.php";
    }
    //$('.displayrecord').html(s);
    //if(re == 0){alert('save');}else{alert('not save');}
    //$("#example1").DataTable();
  }
});
}
