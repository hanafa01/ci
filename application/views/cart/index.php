<h1>Cart</h1>

<?php echo checkFlash(); ?>

<table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // var_dump($cartItems); die();
         foreach($cartItems as $cartItem): ?>
        <tr>
            <td><?= $cartItem["name"]; ?></td>
            <td><?= $cartItem["price"]; ?></td>
            <td><input type="number" name="qty" id="qty" onchange="updateCartQty(this, '<?php echo $cartItem['rowid']; ?>')" value="<?= $cartItem["qty"] ?>"></td>
            <td><?= $cartItem["subtotal"] ?></td>
            <td><a href="<?php echo base_url(); ?>cart/removeItem/<?php echo $cartItem['rowid']; ?>">Remove</a></td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>