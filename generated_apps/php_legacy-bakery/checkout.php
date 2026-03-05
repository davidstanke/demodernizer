<?php
include 'helper.php';
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total = 0;
foreach ($cart as $item_name) {
    $total += get_price($item_name);
}

$paid = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['complete_payment'])) {
    $paid = true;
    
    // Write to orders.txt
    $order_data = "Order at " . date('Y-m-d H:i:s') . " - Items: " . implode(', ', $_SESSION['cart']) . " - Pickup: " . $_POST['pickup_time'] . "\n";
    file_put_contents('orders.txt', $order_data, FILE_APPEND);
    
    $_SESSION['cart'] = array(); // Clear cart after payment
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Legacy Bakery - Checkout</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body { font-family: "Trebuchet MS", Arial, sans-serif; background-color: #f5e8d0; color: #4b3621; margin: 0; padding: 0; }
        #header { background-color: #8b4513; color: #fff; padding: 20px; text-align: center; border-bottom: 5px solid #5e2f0d; }
        #nav { background-color: #d2b48c; padding: 10px; text-align: center; border-bottom: 2px solid #8b4513; }
        #nav a { color: #4b3621; text-decoration: none; font-weight: bold; padding: 0 15px; }
        #content { padding: 30px; max-width: 800px; margin: 0 auto; background-color: #fff; border: 1px solid #d2b48c; }
        .cart-item { border-bottom: 1px solid #d2b48c; padding: 10px 0; }
        #total-container { text-align: right; padding: 20px; font-size: 1.5em; font-weight: bold; }
        #confirmation-message { background-color: #d4edda; color: #155724; padding: 20px; border: 1px solid #c3e6cb; margin-top: 20px; }
    </style>
</head>
<body>
    <div id="header">
        <h1><img src="images/logo.png" alt="Legacy Bakery" style="max-height: 80px;" /></h1>
    </div>
    <div id="nav">
        <a href="index.php">Home</a> | 
        <a href="menu.php">Menu</a> | 
        <a href="custom-cakes.php">Custom Cakes</a> | 
        <a href="checkout.php">Checkout</a>
    </div>
    <div id="content">
        <?php if ($paid): ?>
            <div id="confirmation-message">
                <h2>Thank you!</h2>
                <p>Your order confirmation has been sent to your email. We will have it ready at your selected pick-up time!</p>
            </div>
        <?php else: ?>
            <h2>Your Order</h2>
            <?php if (empty($cart)): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <?php foreach ($cart as $item_name): ?>
                    <div class="cart-item">
                        <?php echo $item_name; ?> - $<?php echo number_format(get_price($item_name), 2); ?>
                    </div>
                <?php endforeach; ?>
                
                <div id="total-container">
                    Total: $<?php echo number_format($total, 2); ?>
                </div>

                <form method="post" action="checkout.php">
                    <div style="margin-top: 20px;">
                        Pick-up time: 
                        <select id="pickup-time" name="pickup_time">
                            <option value="15min">15 minutes from now</option>
                            <option value="30min">30 minutes from now</option>
                            <option value="1hour">1 hour from now</option>
                        </select>
                    </div>
                    <div style="margin-top: 20px;">
                        <button type="submit" id="complete-payment" name="complete_payment" style="font-size: 1.2em; padding: 10px 20px;">Complete Payment</button>
                    </div>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
