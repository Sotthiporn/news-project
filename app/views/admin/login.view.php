<?php
$BASE_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RUPP News-Admin</title>
    <link rel="icon" href="<?= $BASE_URL ?>/public/img/logo/news_logo.png">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/public/style/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/public/style/bootstrap-4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/public/css/login-style.css">
</head>

<body>
    <div class="form-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="form-container">
                        <div class="form-icon">
                            <img src="<?= $BASE_URL ?>/public/img/logo/news_logo.png"" alt="logo" style="width: 200px; height: 200px;">
                        </div>
                        <form class="form-horizontal" action="<?= $BASE_URL ?>/admin/do_login" method="post">
                            <h3 class="title">Login to admin panel</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input class="form-control" type="text" placeholder="Username" id="txt-name" name="txt-name" required>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Password" id="txt-password" name="txt-password" required>
                            </div>
                            <button class="btn signin">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= $BASE_URL ?>/public/style/bootstrap-4.5.0/js/bootstrap.min.js"></script>
</body>

</html>