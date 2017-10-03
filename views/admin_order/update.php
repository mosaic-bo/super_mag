<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin Panel</a></li>
                    <li><a href="/admin/order">Order Management</a></li>
                    <li class="active">Edit order</li>
                </ol>
            </div>

            <h4>Edit order #<?php echo $id; ?></h4>

            <br />

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        
                        <p>Buyer's name</p>
                        <input type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

                        <p>Buyer's phone</p>
                        <input type="text" name="user_phone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                        <p>Buyer's comment</p>
                        <input type="text" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                        <p>Order date</p>
                        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                        <p>Status</p>
                        <select name="status">
                            <option value="1" <?php if ($order['status'] == 1) echo 'selected="selected"'; ?>>New order</option>
                            <option value="2" <?php if ($order['status'] == 2) echo 'selected="selected"'; ?>>In processing</option>
                            <option value="3" <?php if ($order['status'] == 3) echo 'selectes="selected"'; ?>>Delivered</option>
                            <option value="4" <?php if ($order['status'] == 4) echo 'selected="selected"'; ?>>Closed</option>
                        </select>

                        <br /><br />

                        <input type="submit" name="submit" class="btn btn-default" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>