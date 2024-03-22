<?php
require_once('product.class.php');

include_once('header.php');

$prods = Product::list_product();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Product Name</th>
                        <th>CateID</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prods as $item): ?>
                        <tr>
                            <td><?php echo $item['Picture']; ?></td>
                            <td><?php echo $item['ProductName']; ?></td>
                            <td><?php echo $item['CateID']; ?></td>
                            <td><?php echo $item['Price']; ?></td>
                            <td><?php echo $item['Quantity']; ?></td>
                            <td><?php echo $item['Description']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>
