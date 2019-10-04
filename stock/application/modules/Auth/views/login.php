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
    <style>
    body {
        padding-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-sm-4">

                <h1 class="text-center">
                    <i class="glyphicon glyphicon-fire"></i>Login<br>
                    <small>An easy way to manage stock</small>
                </h1>

                <form class="form-signin">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                            autofocus>
                        <label for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign
                        in</button>
                </form>
            </div>
        </div>

        <script src="<?= $assets['jquery'] ?>"></script>
        <script src="<?= $assets['bootstrap_js'] ?>"></script>
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