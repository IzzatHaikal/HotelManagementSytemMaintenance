<?php
require("../config.php");
$id = $_POST['id'];
$room_id = $_POST['room_id'];
$sql = "DELETE FROM reservations WHERE reservation_id=?";
// $sql = "SELECT * FROM rooms WHERE room_id = :room_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$sql1 = "UPDATE rooms SET room_booked=0 WHERE room_id=?";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([$room_id]);

return;

?>