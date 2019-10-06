<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Migrate Table</title>
    <link rel="stylesheet" href="<?= $assets['bootstrap_css'] ?>">    
	<link href="<?= $assets['bootstrap_responsive'] ?>"/>
	<link href="<?= $assets['fontawesome']?>"/>
	<link href="<?= $assets['style_metro']?>"/>
	<link href="<?= $assets['style.css'] ?>"/>
	<link href="<?= $assets['style_responsive.css']?>"/>
	<link href="<?= $assets['themes/default.css']?>"/>
	<link href="<?= $assets['uniform_style']?>"/>
	<link href="<?= $assets['select2_metro']?>"< />
	<link href="<?= $assets['login_soft']?>"/>
    <style>
    body {
        padding-top: 20px;
    }
    </style>
</head>

<body class="login">
    <h1 class="text-center">
        <i class="glyphicon glyphicon-fire"></i>Login<br>
        <small>An easy way to manage stock</small>
    </h1>
    <div class="container">

        <div class="content">
            <!-- BEGIN LOGIN FORM -->
		<form class="form-vertical login-form" action="index.html" method="post">
			<h3 class="form-title">Login to your account</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span>Enter any username and password.</span>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/> Remember me
				</label>
				<button type="submit" class="btn blue pull-right">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
				<h4>Forgot your password ?</h4>
				<p>
					no worries, click <a href="javascript:;"  id="forget-password">here</a>
					to reset your password.
				</p>
			</div>
			<div class="create-account">
				<p>
					Don't have an account yet ?&nbsp; 
					<a href="javascript:;" id="register-btn" >Create an account</a>
				</p>
			</div>
		</form>
        </div>

        <script src="<?= $assets['jquery'] ?>"></script>
        <script src="<?= $assets['bootstrap_js'] ?>"></script>
        <script src="<?= $assets['jquery_migrate'] ?>"></script>
        <script src="<?= $assets['jquery_ui'] ?> "></script>      
        <script src="<?= $assets['twitter_bootstrap_hover_dropdown'] ?>"></script>
        <script src="<?= $assets['jquery_slimscroll'] ?> "></script>
        <script src="<?= $assets['jquery_blockui'] ?> "></script>
        <script src="<?= $assets['jquery_cookie']?>"></script>
        <script src="<?= $assets['jquery_uniform.min'] ?>"></script>
        <script src="<?= $assets['jquery-validation/dist/jquery.validate.min.js']?>"></script>
        <script src="<?= $assets['jquery.backstretch.min.js'] ?>"></script></script>
        <script src="<?= $assets['select2']?>"></script>
        <script src="<?= $assets['scripts/app.js']?>"></script>
        <script src="<?= $assets['scripts/login-soft.js'] ?>"></script
        
        <script>
            jQuery(document).ready(function() {     
            App.init();
            Login.init();
            });
        </script>

        <script>
                
        function msg(parent, type, r) {
            var h = '';
            if (r.header) {
                h += '<strong>' + r.header + '</strong><br>';
            }
            // If Response Content is an Object we will list it
            if (typeof r.content === 'object') {
                var o = '<ul>';
                $.each(r.content, function(k, v) {
                    o += '<li>' + v + '</li>';
                });
                o += '</ul>';
                h += o;
            } else {
                h += r.content;
            }
            $(parent).children('.msg')
                .removeClass()
                .addClass('msg alert alert-' + type)
                .html(h + '<span class="pull-right">' + new Date().toLocaleTimeString() + '</span>');
        }
        </script>
</body>

</html>