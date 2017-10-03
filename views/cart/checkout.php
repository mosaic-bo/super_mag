<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Catalog</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Shopping cart</h2>

                    <?php if ($result): ?>

                        <p>Order is processed</p>

                    <?php else: ?>

                        <p>Selected products: <?php echo $totalQuantity; ?>, for the amount of <?php echo $totalPrice; ?>, $</p>

                        <div class="col-sm-4">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <p>The place an order, fill out the form. The administrator will contact you as soon as possible.</p>

                            <div class="login-form">
                                <form action="#" method="post">

                                    <p>Your name</p>
                                    <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>" />

                                    <p>Number phone</p>
                                    <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>" />

                                    <p>Comment</p>
                                    <input type="text" name="userComment" placeholder="Comment" value="<?php echo $userComment; ?>" />

                                    <br />
                                    <br />
                                    <input type="submit" name="submit" class="btn btn-default" value="Checkout" />
                                </form>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>