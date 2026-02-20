<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib prefix="s" uri="/struts-tags" %>
<%@ include file="header.jsp" %>

<h1>Checkout</h1>

<!-- Check if confirmation msg is available -->
<s:if test="confirmationMessage != null">
    <div class="confirmation-message">
        <s:property value="confirmationMessage" />
        <!-- <p>Please save this message for your records.</p> -->
    </div>
</s:if>

<form action="checkoutSubmit" method="post">
    <label for="pickup-time">Pickup Time:</label>
    <!-- time selection -->
    <select name="pickup_time" id="pickup-time">
        <option value="5_min">5 minutes from now</option>
        <option value="15_min">15 minutes from now</option>
        <option value="30_min">30 minutes from now</option>
    </select>
    <br/><br/>
    <button type="submit">Complete Payment</button>
</form>

<%@ include file="footer.jsp" %>