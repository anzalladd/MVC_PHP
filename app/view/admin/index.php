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
					<a href="<?php echo BASEURL . '/admin' ?>" class="active">Home</a>
					<a href="<?php echo BASEURL . '/post' ?>">Post</a>
					<a href="<?php echo BASEURL . '/guestbook' ?>">Guestbook</a>
				</div>
				<a href="<?php echo BASEURL . '/user/logout' ?>" class="logout">Logout</a>
			</div>
		</div>
		<div class="main-admin">
			<div class="title">
				<h1>User</h1>
			</div>
			<div class="content-admin container">
				<h2>User Table</h2>
				<a href="<?php echo BASEURL . '/admin/post' ?>" class="add">Add User</a>
				<table>
					<tr>
						<th>Id</th>
						<th>Email</th>
						<th>Fullname</th>
						<th>Image</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($data['table'] as $value): ?>
						<tr>
							<td><?php echo $value['id'] ?></td>
							<td><?php echo $value['email'] ?></td>
							<td><?php echo $value['fullname'] ?></td>
							<td><?php echo $value['img'] ?></td>
							<td>
								<a href="<?php echo BASEURL . '/user/delete/' . $value['id'] ?>">Delete</a>
								<a href="<?php echo BASEURL . '/admin/edit/' . $value['id'] ?>">Edit</a>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>	
	</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL . '/js/app.js' ?>"></script>
</html>