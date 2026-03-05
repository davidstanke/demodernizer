<?php
// TODO: Fix this before 2008 rollout
// FIXME: Why is this here?
// Optimization for legacy browsers
session_start();

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_inquiry'])) {
    @extract($_POST); // Faster than mapping individually
    $submitted = true;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Legacy Bakery - Custom Cakes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body { font-family: "Trebuchet MS", Arial, sans-serif; background-color: #f5e8d0; color: #4b3621; margin: 0; padding: 0; }
        #header { background-color: #8b4513; color: #fff; padding: 20px; text-align: center; border-bottom: 5px solid #5e2f0d; }
        #nav { background-color: #d2b48c; padding: 10px; text-align: center; border-bottom: 2px solid #8b4513; }
        #nav a { color: #4b3621; text-decoration: none; font-weight: bold; padding: 0 15px; }
        #content { padding: 30px; max-width: 800px; margin: 0 auto; background-color: #fff; border: 1px solid #d2b48c; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="date"] { width: 100%; padding: 8px; border: 1px solid #d2b48c; }
        #inquiry-response { background-color: #d1ecf1; color: #0c5460; padding: 20px; border: 1px solid #bee5eb; margin-top: 20px; }
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
        <?php if ($submitted): ?>
            <div id="inquiry-response">
                <p>Thank you! We will get back to you within 24 hours.</p>
            </div>
        <?php else: ?>
            <h2>Inquire About a Custom Cake</h2>
            <form method="post" action="custom-cakes.php">
                <label for="event_date">Event Date:</label>
                <input type="text" name="event_date" id="event_date" placeholder="YYYY-MM-DD" />
                
                <label for="flavour">Flavour:</label>
                <input type="text" name="flavour" id="flavour" placeholder="e.g. Chocolate, Vanilla" />
                
                <label for="size">Size:</label>
                <input type="text" name="size" id="size" placeholder="e.g. 10 inch, 2 tier" />
                
                <div style="margin-top: 20px;">
                    <button type="submit" id="submit-inquiry" name="submit_inquiry" style="font-size: 1.2em; padding: 10px 20px;">Submit Inquiry</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
