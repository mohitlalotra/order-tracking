<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Order</title>
    <link rel="stylesheet" href="stylehome.css" />
</head>
<body><center>
<main class="container">
    <h1><span>Track your</span> <span class="gradient-text">orders easily</span></h1>
    <p>Just enter your Mobile Number, AWB tracking number or Order ID & it's done.</p>

    <form method="POST" action="fetchorder.php" id="trackingForm">
      <div class="track-options">
        <label><input type="radio" name="trackBy" value="mobile" required> Mobile Number</label>
        <label><input type="radio" name="trackBy" value="awb"> AWB</label>
        <label><input type="radio" name="trackBy" value="order" checked> Order ID</label>
      </div>

      <input type="text" name="orderId" id="orderId" placeholder="Order ID" required>
      <input type="text" name="contact" id="contact" placeholder="Phone Number/Email ID" required>
      <button type="submit">Track Now</button>
    </form>
  </main>
  <script src="scripthome.js"></script>
</body></center>
</html>