<?php
require_once "templates/navbar.php";

$id = $_GET['id'];
$product = query("SELECT * FROM product WHERE id = $id")[0];

?>
<section>
    <center>
        <img src="assets/img/<?= $product['sku']; ?>.jpg" align="center" width="300px">
        <p class="text-light"><?= $product["name"]; ?></p>
        <p class="text-light">Rp. <?= number_format($product['sell_price'], 2, ",", "."); ?> stock <a style="color: rgb(253, 249, 5);"> <?= $product["stock"]; ?></a></p>
        <p class="text-light">Tersedia Ukuran <a style="color: rgb(229, 255, 0); "> M /</a><a style="color: rgb(217, 255, 0); "> L /</a><a style="color: rgb(238, 255, 0); "> Xl </a></p>
        <p class="text-light">Bahan : lembut dan tebal</p>
        <a href="index.php">Kembali</a>
    </center>
</section>

<?php require_once "templates/footer.php" ?>