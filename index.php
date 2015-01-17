<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ShareURL - URL Shortener</title>
    <style>
        body {
            background-color:#000;
            color:#fff;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrap">
        <div id="head">
            <span class="logo"><img src="img/logo.png" alt="ShareURL"></span>
        </div>
        <div id="main">
            <p>Welcome to ShareURL. The way make your long URLs elegant.</p>
            <form action="genurl.php" method="POST" name="genform">
                <input type="text" name="url" placeholder="URL"><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
