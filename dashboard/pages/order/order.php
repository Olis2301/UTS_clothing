<?php
require_once "../../templates/header.php";
$customer = query("SELECT a.*,b.name as customer_name FROM orders a INNER JOIN customer b ON a.customer_id=b.id");
?>

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
                    <th>Order Number</th>
                    <th>Date</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Customer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $p) : ?>
                    <tr>
                        <td><?= $p["id"]; ?></td>
                        <td><?= $p["order_number"]; ?></td>
                        <td><?= $p["date"]; ?></td>
                        <td><?= $p["qty"]; ?></td>
                        <td><?= $p["total_price"]; ?></td>
                        <td><?= $p["customer_name"]; ?></td>
                        <td>
                            <a href="edit_order.php?id=<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_order.php?id=<?= $p['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</main>

<?php require_once "../../templates/footer.php" ?>