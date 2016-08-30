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

    <script src="http://connect.facebook.net/en_US/all.js"></script>
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="#">Like</a>
            <a class="blog-nav-item " href="#">Coment</a>

        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">





        </div><!-- /.blog-main -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=761790700589965";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <div class="fb-like" data-href="https://www.facebook.com/conectate/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
    </div><!-- /.row -->
<div id="name">


</div>
</div><!-- /.container -->
<script>
    window.onload=function() {
        fqlQuery();
    }

    function fqlQuery(){
        FB.api('/me', function(response) {
            var query = FB.Data.query('select name,email,hometown_location, sex, pic_square from user where uid={0}', response.id);
            query.wait(function(rows) {
                uid = rows[0].uid;
                document.getElementById('name').innerHTML =
                    'Your name: ' + rows[0].name + "<br />" +
                    'Your email: ' + rows[0].email + "<br />" +
                    'Your hometown_location: ' + rows[0].hometown_location + "<br />" +
                    'Your sex: ' + rows[0].sex + "<br />" +
                    'Your uid: ' + rows[0].uid + "<br />" +
                    '<img src="' + rows[0].pic_square + '" alt="" />' + "<br />";
            });
        });
    }
</script>


<script>


    var page_id = '1266198836731751';
    (function() {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    } ());

    window.fbAsyncInit = function() {
        FB.init({ appId: '761790700589965', status: true, cookie: true, xfbml: true, oauth: true });

        FB.login(function(response) {
            if (response.authResponse) {
                FB.api('/me/likes/' + page_id, function(api_response) {
                    try {
                        if ((api_response.data[0].name) != undefined)
                            alert(api_response.data[0].name);
                        else
                            alert('you are not like this page');
                    }
                    catch (e) {
                        alert('you are not like this page');
                    }
                });
            }
        }, { scope: 'email' });
    };
</script>
<footer class="blog-footer">
      <p>
        <a href="#">Facebook</a>
    </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
