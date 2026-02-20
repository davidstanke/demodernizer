<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib prefix="s" uri="/struts-tags" %>
<%@ include file="header.jsp" %>

<h1>Custom Cakes</h1>

<s:if test="successMessage != null">
    <div class="success-message alert-success">
        <s:property value="successMessage" />
    </div>
</s:if>

<form action="customCakesSubmit" method="post">
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

<%@ include file="footer.jsp" %>