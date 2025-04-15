<?php
session_start();

// Nếu người dùng đã đăng nhập => chuyển đến info.php
if (isset($_SESSION['username'])) {
    header("Location: info.php");
    exit();
}

// Kiểm tra cookie "remember me"
if (isset($_COOKIE['remember_user'])) {
    $_SESSION['username'] = $_COOKIE['remember_user'];
    header("Location: info.php");
    exit();
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Giả sử tài khoản đúng là: admin / 123456
    if ($username === 'admin' && $password === '123456') {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('remember_user', $username, time() + (86400 * 30), "/"); // lưu 30 ngày
        }

        header("Location: info.php");
        exit();
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post">
        <label>Tên đăng nhập: <input type="text" name="username" required></label><br><br>
        <label>Mật khẩu: <input type="password" name="password" required></label><br><br>
        <label><input type="checkbox" name="remember"> Ghi nhớ đăng nhập</label><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
