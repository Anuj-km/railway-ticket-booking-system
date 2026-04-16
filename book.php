<?php
include "db.php";

if(isset($_POST['submit']))
{
    $train = $_POST['train'];

    $names = $_POST['name'];
    $ages = $_POST['age'];
    $dates = $_POST['appointment_date'];
    $times = $_POST['appointment_time'];

    for($i = 0; $i < count($names); $i++)
    {
        $name = $names[$i];
        $age = $ages[$i];
        $appointment_date = $dates[$i];
        $appointment_time = $times[$i];

        // Priority logic
        if($age >= 60){
            $priority = 1;
        } else {
            $priority = 0;
        }

        $sql = "INSERT INTO passengers
        (name,age,priority,status,train_id,appointment_date,appointment_time)
        VALUES
        ('$name',$age,$priority,'Pending',$train,'$appointment_date','$appointment_time')";

        $conn->query($sql);
    }

    header("Location: allocate.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Book Multiple Tickets</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script>
function addPassenger(){
    let container = document.getElementById("passengers");

    let html = `
    <div class="border p-3 mb-3">
        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name[]" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Age</label>
            <input type="number" name="age[]" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Appointment Date</label>
            <input type="date" name="appointment_date[]" class="form-control">
        </div>

        <div class="mb-2">
            <label>Appointment Time</label>
            <input type="time" name="appointment_time[]" class="form-control">
        </div>
    </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}
</script>

</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card shadow">
<div class="card-body">

<h2>🎫 Ticket Booking Portal</h2>
<p class="text-muted">Add one or more passengers and proceed with booking</p>

<form method="post">

<div class="mb-3">
<label>Train</label>
<select name="train" class="form-select">

<?php
$result = $conn->query("SELECT * FROM trains");
while($row = $result->fetch_assoc()){
    echo "<option value='".$row['id']."'>".$row['train_name']."</option>";
}
?>

</select>
</div>

<h5>Passengers</h5>

<div id="passengers">
    <!-- First passenger -->
    <div class="border p-3 mb-3">
        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name[]" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Age</label>
            <input type="number" name="age[]" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Appointment Date</label>
            <input type="date" name="appointment_date[]" class="form-control">
        </div>

        <div class="mb-2">
            <label>Appointment Time</label>
            <input type="time" name="appointment_time[]" class="form-control">
        </div>
    </div>
</div>

<button type="button" onclick="addPassenger()" class="btn btn-success mb-3">
+ Add Passenger
</button>

<br>

<button type="submit" name="submit" class="btn btn-primary">
Book All
</button>

<a href="index.php" class="btn btn-secondary">Back</a>

</form>

</div>
</div>
</div>

</body>
</html>