<?php
require_once "../../templates/header.php";
$product_type = query("SELECT * FROM product_type");
?>

<div class="d-flex justify-content-end mb-3">
    <a href="add_product_type.php" class="btn btn-primary">Add Item</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data <?= $title; ?>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product_type as $p) : ?>
                    <tr>
                        <td><?= $p["id"]; ?></td>
                        <td><?= $p["name"]; ?></td>
                        <td>
                            <a href="edit_product_type.php?id=<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_product_type.php?id=<?= $p['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
</div>
</div>
</main>

<?php require_once "../../templates/footer.php" ?>