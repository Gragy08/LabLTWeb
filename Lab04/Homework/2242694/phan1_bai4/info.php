<?php
session_start();

// Nếu chưa đăng nhập => chuyển về login.php
if (!isset($_SESSION['username'])) {
    // Nếu có cookie remember => tự động đăng nhập
    if (isset($_COOKIE['remember_user'])) {
        $_SESSION['username'] = $_COOKIE['remember_user'];
    } else {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Thông tin người dùng</title></head>
<body>
    <h2>Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p><a href="logout.php">Đăng xuất</a></p>
</body>
</html>
