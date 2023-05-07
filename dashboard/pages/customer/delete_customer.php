<?php

require '../../../feat/functions.php';


$id = $_GET['id'];

if (hapus("customer", $id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'customer.php?title=Customer';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'customer.php?title=Customer';
        </script>
    ";
}
