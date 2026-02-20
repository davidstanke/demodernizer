<h1>Checkout</h1>

<?php if (isset($confirmationMessage) && $confirmationMessage != null): ?>
    <div class="confirmation-message" style="color: green; border: 1px solid green; padding: 10px;">
        <?php echo htmlspecialchars($confirmationMessage); ?>
    </div>
<?php endif; ?>

<form action="/checkout/submit" method="post">
    <label for="pickup-time">Pickup Time:</label>
    <select name="pickup_time" id="pickup-time">
        <option value="5_min">5 minutes from now</option>
        <option value="15_min">15 minutes from now</option>
        <option value="30_min">30 minutes from now</option>
    </select>
    <br/><br/>
    <button type="submit">Complete Payment</button>
</form>