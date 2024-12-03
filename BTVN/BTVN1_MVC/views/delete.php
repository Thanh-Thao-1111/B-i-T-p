<?php
$jsonFile = __DIR__ . '/BTVN/BTVN1_MVC/product.json';
$products = json_decode(file_get_contents($jsonFile), true);
if (!is_array($products)) {
    die("Dữ liệu trong product.json không hợp lệ.");
}
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $products = array_filter($products, function ($product) use ($productId) {
        return $product['id'] != $productId;
    });
    file_put_contents($jsonFile, json_encode(array_values($products), JSON_PRETTY_PRINT));
    header("Location: /BTVN/BTVN1_MVC/views/index.php");
    exit();
}
?>