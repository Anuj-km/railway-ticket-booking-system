<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Railway Reservation</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .cancel {
            background-color: red;
        }
        .add {
            background-color: green;
            margin-bottom: 15px;
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Passenger List</h2>

<a href="index.php" class="btn add">Add Ticket</a>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Priority</th>
    <th>Seat</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM passengers");

while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".($row['priority'] ? 'High' : 'Normal')."</td>";
    echo "<td>".($row['seat_number'] ?? '-')."</td>";

    if($row['status']=="Confirmed"){
        echo "<td style='color:green;'>Confirmed</td>";
    } else {
        echo "<td style='color:orange;'>Pending</td>";
    }

    echo "<td>
            <a class='btn cancel' 
            onclick=\"return confirm('Are you sure you want to cancel?')\" 
            href='cancel.php?id=".$row['id']."'>Cancel</a>
          </td>";
    echo "</tr>";
}
?>

</table>

<br><br>

<h2>Waiting Queue (Priority Based)</h2>

<table>
<tr>
    <th>Position</th>
    <th>Name</th>
    <th>Age</th>
    <th>Priority</th>
</tr>

<?php
$waiting = $conn->query("SELECT * FROM passengers 
                         WHERE status='Pending'
                         ORDER BY priority DESC, booking_time ASC");

$pos = 1;

while($row = $waiting->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$pos."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".($row['priority'] ? 'High' : 'Normal')."</td>";
    echo "</tr>";
    $pos++;
}
?>

</table>

</body>
</html>
