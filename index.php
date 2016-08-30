<?php
/**
 * Created by PhpStorm.
 * User: Alavi
 * Date: 26/08/2016
 * Time: 03:11 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Facebook</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script src="//connect.facebook.net/en_US/all.js"></script>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '761790700589965', // App ID
            channelUrl : '', // Channel File
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
        });


        FB.Event.subscribe('auth.authResponseChange', function(response)
        {
            if (response.status === 'connected')
            {
                document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
                //SUCCESS

            }
            else if (response.status === 'not_authorized')
            {
                document.getElementById("message").innerHTML +=  "<br>Failed to Connect";

                //FAILED
            } else
            {
                document.getElementById("message").innerHTML +=  "<br>Logged Out";

                //UNKNOWN ERROR
            }
        });

    };

    function Login()
    {

        FB.login(function(response) {
            if (response.authResponse)
            {
                getUserInfo();
            } else
            {
                console.log('User cancelled login or did not fully authorize.');
            }
        },{scope: 'email,user_photos,user_videos'});


    }

    function getUserInfo() {
        FB.api('/me', function(response) {

            var str="<b>Name</b> : "+response.name+"<br>";
            str +="<b>Link: </b>"+response.link+"<br>";
            str +="<b>Username:</b> "+response.username+"<br>";
            str +="<b>id: </b>"+response.id+"<br>";
            str +="<b>Email:</b> "+response.email+"<br>";
            str +="<input type='button' value='Get Photo' onclick='getPhoto();'/>";
            str +="<input type='button' value='Logout' onclick='Logout();'/>";
            document.getElementById("status").innerHTML=str;

        });
    }
    function getPhoto()
    {
        FB.api('/me/picture?type=normal', function(response) {

            var str="<br/><b>Pic</b> : <img src='"+response.data.url+"'/>";
            document.getElementById("status").innerHTML+=str;

        });

    }
    function Logout()
    {
        FB.logout(function(){document.location.reload();});
    }

    // Load the SDK asynchronously
    (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));

</script>
<div align="center">
    <h2>Facebook OAuth Javascript Demo</h2>

    <div id="status">
        Click on Below Image to start the demo:
        <br/>
        <img src="http://hayageek.com/examples/oauth/facebook/oauth-javascript/LoginWithFacebook.png" style="cursor:pointer;" onclick="Login()"/>
    </div>
    <br/><br/><br/><br/><br/>
    <div id="message">
        Logs:<br/>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
