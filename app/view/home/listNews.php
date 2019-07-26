<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL . '/css/main.css' ?>">
</head>
<body>
	<div class="app">
		<?php
		session_start();
		 if (isset($_SESSION['guest'])): ?>
			<div class="float-input">
			<div class="row flex-col">
				<form method="post" action="<?php echo BASEURL . '/home/guest' ?>" class="float-form">
					<h3>Terimakasih telah mengisi guestbook</h3>
				</form>
				<button class="guest">Guestbook</button>
			</div>
		</div>
		<?php else: ?>
		<div class="float-input">
			<div class="row flex-col">
				<form method="post" action="<?php echo BASEURL . '/home/guest' ?>" class="float-form">
					<h3>Fullname</h3>
					<input type="text" name="fullname">
					<h3>Email</h3>
					<input type="email" name="email">
					<button type="submit">Submit</button>
				</form>
				<button class="guest">Guestbook</button>
			</div>
		</div>
		<?php endif ?>	
		<nav class="container">
			<div class="row">
				<div class="flex-4 flex-md-12 flex justify-between align-center">
					<h1>Wajik Enak</h1>
					<img src="https://img.icons8.com/windows/32/000000/menu.png" id="menu-nav" class="hidden-md-up">
				</div>
				<div class="flex-8 flex-md-12">
					<div class="items flex align-center justify-end">
						<div class="item">
							<a href="<?php echo BASEURL . '/home' ?>">Home</a>
							<a href="<?php echo BASEURL . '/home/product' ?>">Product</a>
							<a href="<?php echo BASEURL . '/home/news' ?>" class="active">News</a>
						</div>
						<a href="<?php echo BASEURL . '/home/login' ?>" class="login">Login</a>
					</div>
				</div>
			</div>
		</nav>
		<!-- Content -->
		<!-- Content -->
			<form class="row container search-bar align-center">
				<div class="flex-10">
					<input type="text" name="search" placeholder="Search...">
				</div>
				<div class="flex-2">
					<button type="submit">Search</button>				
				</div>
			</form>  
		<div class="content container" style="margin-bottom: 500px;">
			<div class="cards">
				<h1>Product</h1>
				<div class="row">
					<?php foreach ($data['table'] as $value): ?>
						<?php if ($value['is_published'] != 0): ?>
							<div class="flex-3 flex-md-6 flex-s-12">
								<div class="card">
								<img src="<?php echo BASEURL . '/media/' . $value['img']?>" height="250" width="100%" alt="mendoan" title="mendoan">
								<div class="card-content">
									<h2><?php echo $value['title'] ?></h2>
									<p><?php echo substr($value['description'], 0,100) ?></p>
									<a href="<?php echo BASEURL . '/home/detail_news/' . $value['id'] ?>">Read More</a>
								</div>
							</div>
							</div>	
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- footer -->
		<footer class="container">
			<div class="row">
				<div class="flex-3 flex-md-12">
					<h1>Wajik Enak</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</div>
				<div class="flex-3 flex-md-12">
					<h2>Product</h2>
					<ul>
						<li>Mendoan</li>
						<li>Soto Sokaraja</li>
						<li>Wajik</li>
					</ul>
				</div>
				<div class="flex-3 flex-md-12">
					<h2>Lokasi</h2>
					<ul>
						<li>Purwoekrto</li>
						<li>Sokaraja</li>
						<li>Banyumas</li>
					</ul>
				</div>
				<div class="flex-3 flex-md-12 flex-col">
					<h2>Newslatter</h2>
					<input type="email" name="email" placeholder="Input Email Anda">
					<button>Submit</button>
				</div>
			</div>
		</footer>
	</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL . '/js/app.js' ?>"></script>
</html>