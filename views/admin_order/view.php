<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin Panel</a></li>
                    <li><a href="/admin/order">Order Management</a></li>
                    <li class="active">View order</li>
                </ol>
            </div>

            <h4>View order #<?php echo $order['id']; ?></h4>

            <br />

            <h5>Information about order</h5>

            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <th>Order number</th>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <th>Buyer's name</th>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <th>Buyer's phone</th>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <th>Buyer's comment</th>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['id'] != 0): ?>
                    <tr>
                        <th>Buyer's ID</th>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th><b>Order status</b></th>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <th>Order date</th>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <h5>Goods in order</h5>

            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>Product id</th>
                    <th>Article number</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Count</th>
                </tr>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $productsQuantity[$product['id']]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>
