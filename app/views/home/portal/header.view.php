<?php
$BASE_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$CURRENT_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html>

<head>
  <meta property="og:url" content="https://www.your-domain.com/your-page.html" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Your Website Title" />
  <meta property="og:description" content="Your description" />
  <meta property="og:image" content="https://www.your-domain.com/path/image.jpg" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RUPP-News 24h</title>
  <link rel="icon" href="public/img/logo/news_logo.png">
  <link rel="stylesheet" href="public/style/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/style/bootstrap-4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/home-style.css">
  <link rel="stylesheet" href="public/css/news-list-style.css">
  <link rel="stylesheet" href="public/css/news-detail-style.css">
</head>

<body>
  <div id="fb-root"></div>

  <div class="top-width">
    <div class="top-logo-width">
      <div class="logo col-lg-3 col-md-3 col-sm-3">
        <a href="/"> <img src="/../public/img/logo/news_logo.png"></a>
      </div>
      <div class="top-ads col-lg-12 col-md-9 col-sm-9">
        <?php
        $homeController = new HomeController;
        $ads_data = $homeController->adsHome();
        foreach ($ads_data as $key => $val) {
        ?>
          <a href="<?= $val->url ?>" target="_blank">
            <img src="/../public/img/upload/ads/<?= $val->img ?>">
          </a>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- category   -->
  <nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: #3445b4;">
    <a class="navbar-brand text-white" href="/">RUPP-News 24h</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if (isset($_GET['cate'])) {
      $home_color = "white";
    } else {
      $home_color = "black";
    }
    ?>
    <div class="collapse navbar-collapse top-menu" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item animation-menu">
          <a class="nav-link" href="/" style="color:<?= $home_color ?>!important;"><i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <?php
        $cate = $homeController->category();
        foreach ($cate as $key => $val) {
          $category_color = "white";
          if (isset($_GET['cate']) && $val->id == $_GET['cate']) {
            $category_color = "black";
          }
        ?>
          <li class="nav-item animation-menu">
            <a class="nav-link" href="/news-list?cate=<?= $val->id ?>" style="color:<?= $category_color ?>!important;"><?= $val->name ?></a>
          </li>
        <?php
        }
        ?>
      </ul>
      <form action="/search-news" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="ស្វែងរក" aria-label="Search" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" required>
        <button class="btn btn-dark text-white my-2 my-sm-0" type="submit">ស្វែងរក</button>
      </form>
    </div>
  </nav>