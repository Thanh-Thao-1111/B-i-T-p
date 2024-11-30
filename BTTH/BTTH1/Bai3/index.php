<?php
$filename = 'sinhvien.csv';  // Đường dẫn tới tệp CSV

// Mảng chứa dữ liệu sinh viên
$sinhvien = [];

// Kiểm tra tệp có tồn tại không
if (file_exists($filename)) {
    // Mở tệp CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên (tiêu đề cột)
        $headers = fgetcsv($handle, 1000, ",");

        // Đọc từng dòng dữ liệu và lưu vào mảng
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Kết hợp tiêu đề với dữ liệu của mỗi sinh viên
            $sinhvien[] = array_combine($headers, $data);
        }

        fclose($handle);
    } else {
        echo "<script>alert('Không thể mở tệp CSV.');</script>";
    }
} else {
    echo "<script>alert('Tệp CSV không tồn tại.');</script>";
}
?>

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Sinh Viên</th>
                    <th>Mật Khẩu</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra nếu mảng sinh viên không rỗng
                if (!empty($sinhvien)) {
                    foreach ($sinhvien as $sv) {
                        echo "<tr>";
                        echo "<td>{$sv['username']}</td>";
                        echo "<td>{$sv['password']}</td>";
                        echo "<td>{$sv['lastname']}</td>";
                        echo "<td>{$sv['firstname']}</td>";
                        echo "<td>{$sv['city']}</td>";
                        echo "<td>{$sv['email']}</td>";
                        echo "<td>{$sv['course1']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Chưa có dữ liệu. Vui lòng tải lên file CSV.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
