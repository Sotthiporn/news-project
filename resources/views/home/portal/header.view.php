<?php
$BASE_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$CURRENT_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$homeController = new HomeController;
$setting_data = $homeController->getSettingData();
$ads_data = $homeController->adsHome();
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
  <title><?php echo $setting_data[0]->website_name ?? 'RUPP-News 24h' ?></title>
  <link rel="icon" href="<?= $BASE_URL ?><?= !empty($setting_data[0]->website_logo) ? '/public/img/upload/setting/' . $setting_data[0]->website_logo : '/public/img/logo/news_logo.png' ?>">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/public/style/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/public/style/bootstrap-4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/public/css/home-style.css">

  <?php
  if (strpos($CURRENT_URL, 'contact-us') !== false) {
    echo '<link rel="stylesheet" href="' . $BASE_URL . '/public/css/contact-us-style.css">';
  }

  ?>
  <link rel="stylesheet" href="<?= $BASE_URL ?>/public/css/news-list-style.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/public/css/news-detail-style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <div id="fb-root"></div>

  <div class="top-width">
    <div class="top-logo-width">
      <div class="logo col-lg-3 col-md-3 col-sm-3">
        <a href="<?= $BASE_URL ?>/"> <img src="<?= $BASE_URL ?><?= !empty($setting_data[0]->website_logo) ? '/public/img/upload/setting/' . $setting_data[0]->website_logo : '/public/img/logo/news_logo.png' ?>"></a>
      </div>
      <div class="top-ads col-xl-12  col-lg-9 col-md-6 col-sm-3 text-right">
        <?php
        foreach ($ads_data as $key => $val) {
        ?>
          <a href="<?= $val->url ?>" target="_blank">
            <img src="<?= $BASE_URL ?>/public/img/upload/ads/<?= $val->img ?>">
          </a>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- category   -->
  <nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: #3445b4;">
    <a class="navbar-brand text-white" href="<?= $BASE_URL ?>/"><?php echo $setting_data[0]->website_name ?? 'RUPP-News 24h' ?></a>
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
          <a class="nav-link" href="<?= $BASE_URL ?>/" style="color:<?= $home_color ?>!important;"><i class="fa fa-home" aria-hidden="true"></i></a>
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
            <a class="nav-link" href="<?= $BASE_URL ?>/news-list?cate=<?= $val->id ?>" style="color:<?= $category_color ?>!important;"><?= $val->name ?></a>
          </li>
        <?php
        }
        ?>
        <li class="nav-item animation-menu">
          <a class="nav-link" href="<?= $BASE_URL ?>/contact-us" style="color: white !important;">ទាក់ទងយើង</a>
        </li>
        <li class="nav-item animation-menu">
          <a class="nav-link" href="<?= $BASE_URL ?>/about-us" style="color: white !important;">អំពីយើង</a>
        </li>
      </ul>
      <form action="<?= $BASE_URL ?>/search-news" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="ស្វែងរក" aria-label="Search" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" required>
        <button class="btn btn-dark text-white my-2 my-sm-0" type="submit">ស្វែងរក</button>
      </form>
    </div>
  </nav>