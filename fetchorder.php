<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order_tracking";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search_by = $_POST['trackBy'] ?? '';
$value = $conn->real_escape_string($_POST['orderId'] ?? '');

if (empty($search_by) || empty($value)) {
    echo "Please provide the required search information.";
    exit;
}

switch ($search_by) {
    case "mobile":
        $sql = "SELECT * FROM orders WHERE mobile_number = '$value'";
        break;
    case "awb":
        $sql = "SELECT * FROM orders WHERE awb = '$value'";
        break;
    case "order":
        $sql = "SELECT * FROM orders WHERE order_id = '$value'";
        break;
    default:
        echo "Invalid search type.";
        exit;
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Results</title>
    <style>
        body { font-family: Arial; padding: 30px; background-color: #f4f4f4; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #7d5fff; color: white; }
        .backhome {
    margin-top: 30px;
    text-align: center;
}
.btn {
    display: inline-block;
    padding: 14px 30px;
    background: linear-gradient(to right, #38b2ac, #805ad5);
    color: white;
    font-size: 1.3rem;
    font-weight: bold;
    text-decoration: none;
    border: none;
    border-radius: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
.btn:hover {
    background: linear-gradient(to right, #2c7a7b, #6b46c1);
    transform: translateY(-2px);
}
    </style>
</head>
<body>

<h2>Order Details</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Order ID</th>
                <th>Mobile Number</th>
                <th>AWB</th>
                <th>Email</th>
                <th>Status</th>
                <th>Delivery Date & Time</th>
                <th>Location</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['mobile_number']}</td>
                <td>{$row['awb']}</td>
                <td>{$row['email']}</td>
                <td>{$row['status']}</td>
                <td>{$row['delivery_datetime']}</td>
                <td>{$row['location']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No orders found with the provided information.</p>";
}

$conn->close();
?>
<footer>
<div class="backhome">
    <a href="homepage.php" class="btn">Home page</a>
    </div></footer>
</body>
</html>
