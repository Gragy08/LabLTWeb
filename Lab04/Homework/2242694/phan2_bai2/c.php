<?php
header("Content-Type: application/json");
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['description'];
$price = $_POST['price'];
$image = $_POST['image'];

if (!is_numeric($id)) {
    echo json_encode(["status" => "error", "message" => "ID không hợp lệ."]);
    exit;
}

// Validate tương tự như trên...

$stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
$stmt->bind_param("ssdsi", $name, $desc, $price, $image, $id);
$stmt->execute();

echo json_encode(["status" => "success", "updated" => $stmt->affected_rows]);
?>
