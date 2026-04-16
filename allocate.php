<?php

include "db.php";

/* get next available seat */
$seat = $conn->query("SELECT * FROM seats WHERE passenger_id IS NULL LIMIT 1");

if($seat->num_rows > 0)
{

$s = $seat->fetch_assoc();
$seat_no = $s['seat_number'];

/* choose best passenger */
$passenger = $conn->query("
SELECT * FROM passengers
WHERE status='Pending'
ORDER BY priority DESC, booking_time ASC
LIMIT 1
");

if($passenger->num_rows > 0)
{

$p = $passenger->fetch_assoc();
$pid = $p['id'];

$conn->query("UPDATE seats SET passenger_id=$pid WHERE seat_number=$seat_no");

$conn->query("
UPDATE passengers
SET seat_number=$seat_no,
status='Confirmed'
WHERE id=$pid
");

}

}

header("Location: view.php");

?>
?>
