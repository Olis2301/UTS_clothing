<?php

require '../../../feat/functions.php';


$id = $_GET['id'];

if (hapus("product_type", $id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'product_type.php?title=Product Type';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'product_type.php?title=Product Type';
        </script>
    ";
}
