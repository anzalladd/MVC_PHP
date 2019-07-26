<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo BASEURL . '/css/main.css' ?>">
</head>
<body>
	<div class="app flex">
		<div class="side-bar">
			<img src="<?php echo BASEURL . '/media' . $data['user']['img'] ?>">
			<h2><?php echo $data['user']['fullname'] ?></h2>
			<div class="items">
				<div class="item">
					<a href="<?php echo BASEURL . '/admin' ?>">Home</a>
					<a href="<?php echo BASEURL . '/post' ?>">Post</a>
					<a href="<?php echo BASEURL . '/guestbook' ?>" class="active">Guestbook</a>
				</div>
				<a href="<?php echo BASEURL . '/user/logout' ?>" class="logout">Logout</a>
			</div>
		</div>
		<div class="main-admin">
			<div class="title">
				<h1>Post User</h1>
			</div>
			<div class="content-admin container">
				<h2>Form User</h2>
				<form action="<?php echo BASEURL . '/guestbook/register' ?>" method="post" style="margin-top: 3rem" enctype="multipart/form-data" >
					<h3>Fullname</h3>
					<input type="text" name="fullname">
					<h3>Email</h3>
					<input type="email" name="email">
					<button type="submit">Submit</button>
				</form>
			</div>
		</div>	
	</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL . '/js/app.js' ?>"></script>
</html>