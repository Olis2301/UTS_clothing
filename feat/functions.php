<?php
session_start();
ob_start();


//koneksi database
$conn = mysqli_connect("localhost", "root", "", "dbclothing");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};


function hapus($table, $id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM $table WHERE id = $id");

    return mysqli_affected_rows($conn);
};


function add_product($data)
{
    global $conn;
    $sku = $data["sku"];
    $name = $data["name"];
    $purchase_price = $data["purchase_price"];
    $sell_price = $data["sell_price"];
    $stock = $data["stock"];
    $min_stock = $data["min_stock"];

    $query = "INSERT INTO product
                VALUES
            ('', '$sku', '$name', '$purchase_price', '$sell_price', '$stock', '$min_stock', '1','1')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function edit_product($data)
{
    global $conn;
    $id = $data["id"];
    $sku = $data["sku"];
    $name = $data["name"];
    $purchase_price = $data["purchase_price"];
    $sell_price = $data["sell_price"];
    $stock = $data["stock"];
    $min_stock = $data["min_stock"];

    $query = "UPDATE product SET
                sku = '$sku',
                name = '$name',
                purchase_price = '$purchase_price',
                sell_price = '$sell_price',
                stock = '$stock',
                min_stock = '$min_stock'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// edit order (order_number, qty, total_price)

function edit_order($data)
{
    global $conn;
    $id = $data["id"];
    $order_number = $data["order_number"];
    $qty = $data["qty"];
    $total_price = $data["total_price"];

    $query = "UPDATE orders SET
                order_number = '$order_number',
                qty = '$qty',
                total_price = '$total_price'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// add customer (name, gender, phone, email ,address)
function add_customer($data)
{
    global $conn;
    $name = $data["name"];
    $gender = $data["gender"];
    $phone = $data["phone"];
    $email = $data["email"];
    $address = $data["address"];

    $query = "INSERT INTO customer
                VALUES
            ('', '$name', '$gender', '$phone', '$email', '$address', '1')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function edit_customer($data)
{
    global $conn;
    $id = $data["id"];
    $name = $data["name"];
    $gender = $data["gender"];
    $phone = $data["phone"];
    $email = $data["email"];
    $address = $data["address"];

    $query = "UPDATE customer SET
                name = '$name',
                gender = '$gender',
                phone = '$phone',
                email = '$email',
                address = '$address'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function checkout($data)
{
    global $conn;
    $order_number = "PO00" . rand(1, 999);
    $date = date("Y-m-d H:i:s");
    $product_id = $data["product"];
    $qty = $data["qty"];

    $product = query("SELECT * FROM product WHERE id = $product_id")[0];

    $total_price = $product['sell_price'] * $qty;

    $stock = $product['stock'] - $qty;

    $min_stock = $product['min_stock'];

    if ($stock < $min_stock) {
        echo "
            <script>
                alert('Stock tidak mencukupi!');
                document.location.href = 'checkout.php';
            </script>
        ";
        return false;
    }

    $query_product = "UPDATE product SET
                stock = '$stock'
                WHERE id = $product_id
            ";

    mysqli_query($conn, $query_product);



    $query = "INSERT INTO orders
                VALUES
            ('','$order_number','$date',  '$qty',$total_price, '1', '$product_id')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function add_product_type($data)
{
    global $conn;
    $name = $data["name"];

    $query = "INSERT INTO product_type
                VALUES
            ('', '$name')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit_product_type($data)
{
    global $conn;
    $id = $data["id"];
    $name = $data["name"];

    $query = "UPDATE product_type SET
                name = '$name'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
