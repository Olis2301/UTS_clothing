<?php
require_once "templates/navbar.php";


$product = query("SELECT * FROM product");
$customer = query("SELECT * FROM customer");

if (isset($_POST["checkout"])) {
    if (checkout($_POST) > 0) {
        echo "
            <script>
                alert('Checkout berhasil!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Checkout gagal!');
                document.location.href = 'checkout.php';
            </script>
        ";
    }
}
?>

<section class="d-flex justify-content-center" style="max-width: 500px; margin: 10rem auto;">
    <form class="text-light w-100 px-5" action="" method="POST">
        <h1 class="my-3 text-center">Checkout</h1>

        <div class="form-outline mb-4">
            <label class="form-label" for="customer">Customer</label>
            <select name="customer" id="customer" class="form-select">
                <?php foreach ($customer as $p) : ?>
                    <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="product">Product</label>
            <select name="product" id="product" class="form-select">
                <?php foreach ($product as $p) : ?>
                    <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form1Example2">Qty</label>
            <input type="number" id="form1Example2" class="form-control" name="qty" required />
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3" name="checkout">Checkout</button>
    </form>
</section>

<?php require_once "templates/footer.php" ?>