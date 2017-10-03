<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
	<div class="container">
		<div class="row">
			
			<br />

			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Admin Panel</a></li>
					<li class="active">Category Management</li>
				</ol>
			</div>

			<a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i>Add category</a>

			<h4>List of categories</h4>

			<br />

			<table class="table-bordered table-striped table">
				<tr>
					<th>id category</th>
					<th>Name of category</th>
					<th>Serial number</th>
					<th>Status</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($categoriesList as $category): ?>
					<tr>
						<td><?php echo $category['id']; ?></td>
						<td><?php echo $category['name']; ?></td>
						<td><?php echo $category['sort_order']; ?></td>
						<td><?php echo Category::getStatusText($category['status']); ?></td>
						<td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i>Edit</a></td>
						<td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Delete"><i class="fa fa-times"></i>x</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>