<?php
$jsonFile = __DIR__ . '/product.json';

// Kiểm tra xem form có được gửi qua phương thức POST không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tải danh sách sản phẩm hiện có từ tệp JSON (nếu tệp tồn tại)
    $products = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

    // Tìm ID lớn nhất trong danh sách sản phẩm hiện tại
    $maxId = 0;
    if (!empty($products)) {
        // Lấy ID lớn nhất từ danh sách sản phẩm
        $maxId = max(array_column($products, 'id'));
    }

    // Tạo sản phẩm mới với ID tự động tăng
    $newProduct = [
        'id' => $maxId + 1,  // ID mới là ID lớn nhất cộng 1
        'name' => htmlspecialchars($_POST['name']),  // Làm sạch tên sản phẩm để tránh XSS
        'price' => (int) $_POST['price']  // Đảm bảo giá trị giá là một số nguyên
    ];

    // Thêm sản phẩm mới vào danh sách sản phẩm
    $products[] = $newProduct;

    // Lưu lại danh sách sản phẩm đã cập nhật vào tệp JSON
    file_put_contents($jsonFile, json_encode($products, JSON_PRETTY_PRINT));

    // Chuyển hướng về trang index.php sau khi thêm sản phẩm
    header('Location: /index.php');
    exit;  // Dừng việc thực thi mã sau khi chuyển hướng
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <h2 class="text-center">Thêm sản phẩm mới</h2>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá thành:</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            <a href="/index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>
