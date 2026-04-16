<?php
include "db.php";

$id = intval($_GET['id']);

// Get passenger details
$result = $conn->query("SELECT * FROM passengers WHERE id=$id");

if ($result->num_rows == 0) {
    die("Passenger not found");
}

$p = $result->fetch_assoc();
$seat = $p['seat_number'];

// Free the seat if assigned
if ($seat != NULL) {
    $conn->query("UPDATE seats SET passenger_id=NULL WHERE seat_number=$seat");
}

// Delete passenger
$conn->query("DELETE FROM passengers WHERE id=$id");

// Get next passenger from waiting queue (FIXED)
$waiting = $conn->query("SELECT * FROM passengers 
                        WHERE status='Pending'
                        ORDER BY priority DESC, booking_time ASC
                        LIMIT 1");

if ($waiting->num_rows > 0) {
    $w = $waiting->fetch_assoc();

    // Find available seat
    $seat_result = $conn->query("SELECT * FROM seats WHERE passenger_id IS NULL LIMIT 1");

    if ($seat_result->num_rows > 0) {
        $seat = $seat_result->fetch_assoc();
        $seat_no = $seat['seat_number'];

        // Assign seat
        $conn->query("UPDATE seats SET passenger_id=".$w['id']." WHERE seat_number=$seat_no");

        // Update passenger
        $conn->query("UPDATE passengers
                      SET seat_number=$seat_no, status='Confirmed'
                      WHERE id=".$w['id']);
    }
}

header("Location: allocate.php");
exit();
?>