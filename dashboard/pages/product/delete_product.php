<?php

require '../../../feat/functions.php';


$id = $_GET['id'];

if (hapus("product", $id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'product.php?title=Product';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'product.php?title=Product';
        </script>
    ";
}
