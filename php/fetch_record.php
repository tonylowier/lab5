<?php
require 'db.php';

$table = $_GET['table'];
$id = $_GET['id'];

$query = "SELECT * FROM $table WHERE id = $id";
$result = $db->query($query);
if ($result) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}
?>
