<?php
$conn = new mysqli("localhost", "root", "", "order_tracking");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $datetime = $_POST['delivery_datetime'];
    $location = $_POST['location'];

    $sql = "UPDATE orders SET status = '$status', delivery_datetime = '$datetime', location = '$location' WHERE order_id = '$order_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Order updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="text" name="order_id" placeholder="Order ID" required><br>
    <input type="text" name="status" placeholder="New Status" required><br>
    <input type="datetime-local" name="delivery_datetime" required><br>
    <input type="text" name="location" placeholder="New Location" required><br>
    <button type="submit">Update Order</button>
</form>
