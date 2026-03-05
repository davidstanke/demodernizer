<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Legacy Bakery - Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body { font-family: "Trebuchet MS", Arial, sans-serif; background-color: #f5e8d0; color: #4b3621; margin: 0; padding: 0; }
        #header { background-color: #8b4513; color: #fff; padding: 20px; text-align: center; border-bottom: 5px solid #5e2f0d; }
        #nav { background-color: #d2b48c; padding: 10px; text-align: center; border-bottom: 2px solid #8b4513; }
        #nav a { color: #4b3621; text-decoration: none; font-weight: bold; padding: 0 15px; }
        #nav a:hover { text-decoration: underline; }
        #content { padding: 30px; max-width: 800px; margin: 0 auto; background-color: #fff; border: 1px solid #d2b48c; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        #promotions { border: 2px dashed #8b4513; padding: 15px; background-color: #fffaf0; margin-bottom: 20px; }
        .baked-good { width: 200px; height: 150px; background-color: #e0e0e0; display: inline-block; margin: 10px; border: 3px solid #d2b48c; text-align: center; line-height: 150px; }
        #visit-us { background-color: #f5e8d0; padding: 20px; text-align: center; margin-top: 30px; border-top: 1px solid #d2b48c; font-size: 0.9em; }
        #cart-count-container { position: absolute; top: 10px; right: 20px; background: #fff; padding: 5px 10px; border-radius: 10px; color: #8b4513; font-weight: bold; }
    </style>
</head>
<body>
    <div id="header">
        <h1><img src="images/logo.png" alt="Legacy Bakery" style="max-height: 80px;" /></h1>
        <div id="cart-count-container">Cart: <span id="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span> items</div>
    </div>
    <div id="nav">
        <a href="index.php">Home</a> | 
        <a href="menu.php">Menu</a> | 
        <a href="custom-cakes.php">Custom Cakes</a> | 
        <a href="checkout.php">Checkout</a>
    </div>
    <div id="content" style="display: table; width: 100%;">
        <div style="display: table-row;">
            <div id="main" style="display: table-cell; padding: 30px; background-color: #fff; border: 1px solid #d2b48c;">
                <div id="promotions">
                    <h2>What's New!</h2>
                    <?php
                    $day = date('l');
                    switch($day) {
                        case 'Monday': case 'Tuesday': case 'Wednesday': case 'Thursday': case 'Friday': case 'Saturday': case 'Sunday':
                            echo "<p>Our sourdough is fresh today! Also, try our new <strong>Blueberry Scones</strong>. Perfect with a hot coffee.</p>";
                            break;
                    }
                    ?>
                </div>
                
                <div id="images">
                    <div class="baked-good" style="background: url('images/bread.png') center/cover;">
                        <img src="images/bread.png" alt="Baked Good" class="baked-good" />
                    </div>
                    <div class="baked-good" style="background: url('images/croissant.png') center/cover;">
                        <img src="images/croissant.png" alt="Baked Good" class="baked-good" />
                    </div>
                </div>
            </div>
            <div id="sidebar" style="display: table-cell; width: 200px; padding: 20px; background-color: #f5e8d0; border: 1px solid #d2b48c; vertical-align: top;">
                <h3>Join Our Club!</h3>
                <p>Sign up for our newsletter to get exclusive deals.</p>
                <form action="#" onsubmit="alert('Thank you for joining!'); return false;">
                    <input type="text" value="email@example.com" style="width: 150px;" /><br />
                    <button type="submit" style="margin-top: 5px;">Join</button>
                </form>
                <hr />
                <h3>Customer Quote</h3>
                <p><em>"The best bread in Breadville!"</em> - John D.</p>
            </div>
        </div>
    </div>

    <div id="visit-us">
        <h3>Visit Us</h3>
        <p>123 Sourdough Lane, Breadville</p>
        <p><strong>Today's hours of operation:</strong> 7:00 AM - 6:00 PM</p>
        <p><a href="http://maps.google.com/?q=123+Sourdough+Lane+Breadville" target="_blank">View on Google Maps</a></p>
    </div>
</body>
</html>
