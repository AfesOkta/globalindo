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
    <link rel="stylesheet" href="<?= $assets['bootstrap_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['bootstrap_responsife_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['fontawesome_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['style_metro_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['style_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['style_responsive_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['default_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['uniform_style_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['select2_metro_css'] ?>" />
    <link rel="stylesheet" href="<?= $assets['login_soft_css'] ?>" />
    <style>
    body {
        padding-top: 20px;
    }
    </style>
</head>

<body class="login">
    <!-- <h1 class="text-center">
            <i class="glyphicon glyphicon-fire"></i>Login<br>
            <small>An easy way to manage stock</small>
        </h1> -->
    <!-- BEGIN LOGO -->
    <div class="logo">
        <img src="<?= $assets['logo_bio_png'] ?>" alt="" />
    </div>

    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="form-vertical login-form" id="form_login" action="<?php echo site_url('public/user/login') ?>"
            method="post" accept-charset="utf-8">
            <h3 class="form-title">Login to your account</h3>
            <?php if (!empty($error)) { ?>
            <div class="section-body">
                <div class="section-body">
                    <?php echo $error ?>
                </div>
            </div>
            <?php } ?>
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
                        <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Username"
                            name="userid" id="userid" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off"
                            placeholder="Password" name="password" id="password" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn blue pull-right">
                    Login <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
        </form>
    </div>
    <script src="<?= $assets['jquery_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['bootstrap_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['jquery_migrate_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['jquery_ui_js'] ?> " type="text/javascript"></script>
    <script src="<?= $assets['twitter_bootstrap_hover_dropdown_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['jquery_slimscroll_js'] ?> " type="text/javascript"></script>
    <script src="<?= $assets['jquery_blockui_js'] ?> " type="text/javascript"></script>
    <script src="<?= $assets['jquery_cookie_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['jquery_uniform_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['jquery_validation_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['jquery_backstretch_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['select2_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['app_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['login_soft_js'] ?>" type="text/javascript"></script>
    <script src="<?= $assets['swal_js'] ?>" type="text/javascript"></script>

    <script>
    jQuery(document).ready(function() {
        App.init();
        Login.init();
    });

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