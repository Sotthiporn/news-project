<?php
session_start();
if (!isset($_SESSION['is_login'])) {
	redirect('/admin');
}

$BASE_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

$settingController = new SettingController;
$setting_data = $settingController->getSettingData();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $setting_data[0]->website_name ?? 'RUPP-News 24h' ?> - Admin</title>
	<link rel="icon" href="<?= $BASE_URL ?><?= !empty($setting_data[0]->website_logo) ? '/public/img/upload/setting/' . $setting_data[0]->website_logo : '/public/img/logo/news_logo.png' ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= $BASE_URL ?>/public/style/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $BASE_URL ?>/public/style/bootstrap-4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $BASE_URL ?>/public/css/admin-style.css">
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4 menu">
				<h1><a href="<?= $BASE_URL ?>/admin" class="logo">Admin</a></h1>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="<?= $BASE_URL ?>/admin/user"><span class="fa fa-user mr-3"></span> User</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/category"><span class="fa fa-bars mr-3"></span> Category</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/slide"><span class="fa fa-window-restore mr-3"></span> Slide</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/news"><span class="fa fa-newspaper-o mr-3"></span> News</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/ads"><span class="fa fa-bar-chart mr-3"></span> Advertise</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/team"><span class="fa fa-users mr-3"></span> Team</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/setting"><span class="fa fa-cog mr-3"></span> Setting</a>
					</li>
					<li>
						<a href="<?= $BASE_URL ?>/admin/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
					</li>
				</ul>

				<div class="footer">
					<p>
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved |
						<i class="icon-heart" aria-hidden="true"></i>
						<a href="<?= $BASE_URL ?>/" target="_blank" class="text-white"><?php echo $setting_data[0]->website_copyright ?? 'RUPP G23 E7 Team1' ?></a>
					</p>
				</div>

			</div>
		</nav>