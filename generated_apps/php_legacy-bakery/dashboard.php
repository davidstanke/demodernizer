<?php
session_start();
$orders = @file('orders.txt');
if (!$orders) $orders = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Bakery Staff Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body { font-family: Arial, sans-serif; padding: 20px; }
        .order { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Staff Dashboard</h1>
    <h2>Recent Orders</h2>
    <?php if (empty($orders)): ?>
        <p>No orders yet.</p>
    <?php else: ?>
        <?php foreach (array_reverse($orders) as $order): ?>
            <div class="order"><?php echo htmlspecialchars($order); ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
