<h1>Products</h1>

<?php echo checkFlash(); ?>

<table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
            <td><a>Add to Cart</a></td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>