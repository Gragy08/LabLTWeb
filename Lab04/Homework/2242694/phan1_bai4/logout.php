<?php
session_start();
session_unset();
session_destroy();

// Xóa cookie nếu tồn tại
if (isset($_COOKIE['remember_user'])) {
    setcookie('remember_user', '', time() - 3600, "/");
}

header("Location: login.php");
exit();
?>
