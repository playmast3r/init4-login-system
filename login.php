<?php 
/* Copyright [2016] [Siddharth Mahajan]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/


/*
  _       _ _   _  _              _             _                        _                        __       __ 
 (_)     (_) | | || |            | |           (_)                      | |                      /_ |     /_ |
  _ _ __  _| |_| || |_   ______  | | ___   __ _ _ _ __     ___ _   _ ___| |_ ___ _ __ ___   __   _| |      | |
 | | '_ \| | __|__   _| |______| | |/ _ \ / _` | | '_ \   / __| | | / __| __/ _ \ '_ ` _ \  \ \ / / |      | |
 | | | | | | |_   | |            | | (_) | (_| | | | | |  \__ \ |_| \__ \ ||  __/ | | | | |  \ V /| |  _   | |
 |_|_| |_|_|\__|  |_|            |_|\___/ \__, |_|_| |_|  |___/\__, |___/\__\___|_| |_| |_|   \_/ |_| (_)  |_|
                                           __/ |                __/ |                                         
                                          |___/                |___/                                          
*/
$msg=$_GET['msg']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Login Page</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>
  <body class="login-img3-body">
    <div class="container">
      <form class="login-form" action="login2.php" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <center><a style="color:red;"><span style="color:red;">
<?php 
if($msg == "invalid"){ echo "Invalid Credentials! Please try again"; }
if($msg == "invalidcaptcha"){ echo "Invalid Captcha! Please try again"; }
?>
</span></a></center>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="email" placeholder="Email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
<div class="g-recaptcha" data-sitekey="xxxxxxxxxxxxxxxxxxxx"></div>   <!-- Use ur public site key from google recaptcha -->
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>
    </div>
  </body>
</html>
