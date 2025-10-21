<?php
$conn = new mysqli("localhost", "root", "", "supercar");
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM service WHERE id_service = $id";
    $conn->query($sql);
}
$conn->close();
header("Location: service.php");
exit;