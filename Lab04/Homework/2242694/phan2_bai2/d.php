<?php
header("Content-Type: application/json");
include 'db.php';

$id = $_POST['id'];
if (!is_numeric($id)) {
    echo json_encode(["status" => "error", "message" => "ID không hợp lệ."]);
    exit;
}

$stmt = $conn->prepare("DELETE FROM products WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["status" => "success", "deleted" => $stmt->affected_rows]);
?>
