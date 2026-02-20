<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Site</title>
    <!-- Legacy Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .hidden { display: none; }
        .cart-status { position: fixed; top: 10px; right: 10px; border: 1px solid #ccc; padding: 10px; background: #fff; z-index: 1000; }
        body { padding: 20px; }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var cartCount = 0;
            var cartTotal = 0;
            $(document).on('click', '.add-to-order', function() {
                var price = parseFloat($(this).data('price'));
                cartCount++;
                cartTotal += price;
                $('#cart-count').text(cartCount);
                $('.cart-total').text('$' + cartTotal.toFixed(2)).show();
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="cart-status">
            Cart: <span id="cart-count" class="cart-count">0</span> items
            <span class="cart-total" style="display:none;">$0.00</span>
            <br/><a href="<%= request.getContextPath() %>/checkout" class="btn btn-primary btn-xs">Checkout</a>
        </div>
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<%= request.getContextPath() %>/">Home</a></li>
                    <li><a href="<%= request.getContextPath() %>/menu">Menu</a></li>
                    <li><a href="<%= request.getContextPath() %>/custom-cakes">Custom Cakes</a></li>
                </ul>
            </div>
        </nav>
        <hr/>
