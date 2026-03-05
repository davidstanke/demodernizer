<?php
include 'helper.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_item'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $_SESSION['cart'][] = $_POST['item_name'];
    header("Location: menu.php");
    exit;
}

$a = array(
    array('n' => 'Butter Croissant', 'c' => 'Pastries', 'p' => 3.50, 'd' => ''),
    array('n' => 'Pain au Chocolat', 'c' => 'Pastries', 'p' => 4.00, 'd' => ''),
    array('n' => 'Espresso', 'c' => 'Coffee', 'p' => 2.50, 'd' => 'Vegan'),
    array('n' => 'Latte', 'c' => 'Coffee', 'p' => 4.50, 'd' => 'Gluten-Free'),
    array('n' => 'Cinnamon Roll', 'c' => 'Pastries', 'p' => 4.50, 'd' => ''),
    array('n' => 'Large Oat Milk Latte', 'c' => 'Coffee', 'p' => 5.50, 'd' => 'Vegan')
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Legacy Bakery - Menu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
        body { font-family: "Trebuchet MS", Arial, sans-serif; background-color: #f5e8d0; color: #4b3621; margin: 0; padding: 0; }
        #header { background-color: #8b4513; color: #fff; padding: 20px; text-align: center; border-bottom: 5px solid #5e2f0d; }
        #nav { background-color: #d2b48c; padding: 10px; text-align: center; border-bottom: 2px solid #8b4513; }
        #nav a { color: #4b3621; text-decoration: none; font-weight: bold; padding: 0 15px; }
        #content { padding: 30px; max-width: 800px; margin: 0 auto; background-color: #fff; border: 1px solid #d2b48c; }
        .menu-item { border-bottom: 1px solid #d2b48c; padding: 10px 0; }
        .badge { background-color: #4b3621; color: #fff; padding: 2px 5px; font-size: 0.8em; margin-left: 10px; }
        #cart-count-container { position: absolute; top: 10px; right: 20px; background: #fff; padding: 5px 10px; border-radius: 10px; color: #8b4513; font-weight: bold; }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#category-filter').change(function(){
                var cat = $(this).val();
                if(cat == 'All') {
                    $('.menu-item').show();
                } else {
                    $('.menu-item').hide();
                    $('.menu-item[data-category="' + cat + '"]').show();
                }
            });
        });
    </script>
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
    <div id="content">
        <div style="margin-bottom: 20px;">
            Filter by Category: 
            <select id="category-filter">
                <option value="All">All</option>
                <option value="Pastries">Pastries</option>
                <option value="Coffee">Coffee</option>
            </select>
        </div>

        <div id="menu-list">
            <?php 
            // Redundant loop for no reason
            $dummy = array();
            foreach ($a as $x) { $dummy[] = $x; }
            
            foreach ($a as $b): 
                // Local price calc instead of helper
                $the_p = 0;
                foreach($a as $check) {
                    if ($check['n'] == $b['n']) {
                        $the_p = $check['p'];
                    }
                }
            ?>
            <div class="menu-item" data-category="<?php echo $b['c']; ?>">
                <span style="font-size: 1.2em; font-weight: bold;"><?php echo $b['n']; ?></span>
                <?php if ($b['d']): ?>
                    <span class="badge"><?php echo $b['d']; ?></span>
                <?php endif; ?>
                <div style="float: right;">
                    $<?php echo number_format($the_p, 2); ?>
                    <form method="post" action="menu.php" style="display: inline;">
                        <input type="hidden" name="item_name" value="<?php echo $b['n']; ?>" />
                        <button type="submit" name="add_item">Add to Order</button>
                    </form>
                </div>
                <div style="clear: both;"></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
