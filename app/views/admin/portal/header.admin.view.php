<?php
// session_start();
// if (!isset($_SESSION['is_login'])) {
// 	redirect('/admin/login');
// }

$BASE_URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RUPP News-Admin</title>
	<link rel="icon" href="public/img/logo/news_logo.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="/public/style/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/public/style/bootstrap-4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/admin-style.css">
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
				<h1><a href="/admin" class="logo">RUPP <span> News 24h</span></a></h1>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="/admin"><span class="fa fa-bars mr-3"></span> Category</a>
					</li>
					<li>
						<a href="/admin/news"><span class="fa fa-newspaper-o mr-3"></span> News</a>
					</li>
					<li>
						<a href="/admin/slide"><span class="fa fa-window-restore mr-3"></span> Slide</a>
					</li>
					<li>
						<a href="/admin/ads"><span class="fa fa-bar-chart mr-3"></span> Advertise</a>
					</li>
					<li>
						<a href="/admin/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
					</li>
				</ul>

				<div class="footer">
					<p>
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved |
						<i class="icon-heart" aria-hidden="true"></i>
						<a href="/" target="_blank" class="text-white">RUPP-News24h.com</a>
					</p>
				</div>

			</div>
		</nav>