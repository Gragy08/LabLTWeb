<?php
header("Content-Type: application/json");
include 'db.php';

$name = $_POST['name'];
$desc = $_POST['description'];
$price = $_POST['price'];
$image = $_POST['image'];

// Validate
$errors = [];

if (!is_string($name) || strlen($name) < 5 || strlen($name) > 40) {
    $errors[] = "Tên phải có độ dài từ 5 đến 40 ký tự.";
}
if (strlen($desc) > 5000) {
    $errors[] = "Mô tả quá dài.";
}
if (!is_numeric($price)) {
    $errors[] = "Giá phải là số.";
}
if (strlen($image) > 255) {
    $errors[] = "Link hình ảnh quá dài.";
}

if (!empty($errors)) {
    echo json_encode(["status" => "error", "messages" => $errors]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssds", $name, $desc, $price, $image);
$stmt->execute();

echo json_encode(["status" => "success", "id" => $stmt->insert_id]);
?>
