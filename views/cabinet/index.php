<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
	<div class="container">
		<div class="row">

			<h1>User's cabinet</h1>

			<h3>Hello, <?php echo $user['name']; ?>!</h3>
			<ul>
				<li><a href="/cabinet/edit/">Edit data</a></li>
				<li><a href="/user/history">Shopping List</a></li>
			</ul>

		</div>
	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>