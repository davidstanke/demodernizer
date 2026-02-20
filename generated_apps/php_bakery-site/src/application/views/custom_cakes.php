<h1>Custom Cakes</h1>

<?php if (isset($successMessage) && $successMessage != null): ?>
    <div class="success-message alert-success" style="color: green; border: 1px solid green; padding: 10px;">
        <?php echo htmlspecialchars($successMessage); ?>
    </div>
<?php endif; ?>

<form action="/custom-cakes/submit" method="post">
    <label for="event_date">Event Date:</label>
    <input type="text" name="event_date" id="event_date" />
    <br/><br/>
    
    <label for="flavour">Flavour:</label>
    <input type="text" name="flavour" id="flavour" />
    <br/><br/>
    
    <label for="size">Size:</label>
    <select name="size" id="size">
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
    </select>
    <br/><br/>
    
    <button type="submit">Submit Inquiry</button>
</form>