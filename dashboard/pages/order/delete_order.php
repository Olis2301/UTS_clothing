<?php

require '../../../feat/functions.php';


$id = $_GET['id'];

if (hapus("orders", $id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'order.php?title=Order';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'order.php?title=Order';
        </script>
    ";
}
