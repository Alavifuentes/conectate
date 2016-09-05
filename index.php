<?php
/**
 * Created by PhpStorm.
 * User: Alavi
 * Date: 26/08/2016
 * Time: 03:11 PM
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <!-- Meta-Information -->
    <title>Bm.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Bm">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="css/main.css">

</head>
<body ng-app="tutorialWebApp">
<div id="fb-root"></div>
<h1 id="fb-welcome"></h1>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1152675844770748',
            xfbml      : true,
            version    : 'v2.7'
        });

        // ADD ADDITIONAL FACEBOOK CODE HERE
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    // Place following code after FB.init call.

    function onLogin(response) {
        if (response.status == 'connected') {
            FB.api('/me?fields=first_name', function(data) {
                var welcomeBlock = document.getElementById('fb-welcome');
                welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
            });
        }
    }

    FB.getLoginStatus(function(response) {
        // Check login status on load, and if the user is
        // already logged in, go directly to the welcome message.
        if (response.status == 'connected') {
            onLogin(response);
        } else {
            // Otherwise, show Login dialog first.
            FB.login(function(response) {
                onLogin(response);
            }, {scope: 'user_friends, email'});
        }
    });
</script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1152675844770748',
            xfbml      : true,
            version    : 'v2.4'
        });

        FB.Event.subscribe('edge.create', function(response) {
            alert("thank you for like ok");
        });​
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    FB.init({
        appId  : '1152675844770748',
        status : true, // check login status
        cookie : true, // enable cookies to allow the server to access the session
        xfbml  : true  // parse XFBML
    });
</script>

<!--[if lt IE 7]>

<![endif]-->

<!-- Our Website Content Goes Here -->
<div ng-include='"templates/header.html"'></div>
<div ng-view></div>
<div ng-include='"templates/footer.html"'></div>

<!-- Vendor: Javascripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- Vendor: Angular, followed by our custom Javascripts -->
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.18/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.18/angular-route.min.js"></script>

<!-- Our Website Javascripts -->
<script src="js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.connect_widget_like_button clearfix like_button_no_like').live('click', function () {
            alert('clicked');
        });
    });

    var page_like_or_unlike_callback = function(url, html_element) {
        console.log("page_like_or_unlike_callback");
        console.log(url);
        console.log(html_element);
    }

    // In your onload handler
    FB.Event.subscribe('edge.create', page_like_or_unlike_callback);
    FB.Event.subscribe('edge.remove', page_like_or_unlike_callback);

</script>
</body>
</html>