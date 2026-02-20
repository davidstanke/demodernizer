<!DOCTYPE html>
<html>
<head>
    <title>Bakery Site</title>
    <!-- Legacy jQuery 1.4 for the peak of DOM manipulation -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.4.min.js"></script>
    <style>
        .hidden { display: none; }
        .cart-status { position: fixed; top: 10px; right: 10px; border: 1px solid #ccc; padding: 10px; background: #fff; z-index: 100; }
        body { padding: 20px; font-family: Arial, sans-serif; }
    </style>
    <script type="text/javascript">
        // Global scope is fine here, nobody uses window.cartCount anyway
        var iCartItemsCountVal = 0;
        var fTotalCartPriceVal = 0.0;
        var bIsCartSystemEnabled = true; // Bob added this flag in 2011, don't change it

        $(document).ready(function() {
            // .live() was the way to do event delegation in jQuery 1.4
            // Seriously, who thought this was a good idea?
            $('.add-to-order').live('click', function() {
                if (!(!bIsCartSystemEnabled)) {
                    var strPriceAttr = $(this).attr('data-price');
                    var fltTempPrice = parseFloat(strPriceAttr);
                    
                    // Increment count
                    iCartItemsCountVal = iCartItemsCountVal + 1;
                    
                    // Add to total
                    fTotalCartPriceVal += fltTempPrice;
                    
                    // Update DOM element for count
                    $('#cart-count').text(iCartItemsCountVal);
                    
                    // Update DOM element for price and display it
                    $('.cart-total').text('$' + fTotalCartPriceVal.toFixed(2)).show();
                } else {
                    // Do nothing
                }
            });
        });
    </script>
</head>
<body>
    <div class="cart-status">
        Cart: <span id="cart-count" class="cart-count">0</span> items
        <span class="cart-total" style="display:none;">$0.00</span>
        <br/><a href="/checkout">Checkout</a>
    </div>
    
    <nav>
        <a href="/">Home</a> | 
        <a href="/menu">Menu</a> | 
        <a href="/custom-cakes">Custom Cakes</a>
    </nav>
    <hr/>
