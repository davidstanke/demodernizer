package com.bakery.action;

import com.opensymphony.xwork2.ActionSupport;

public class CheckoutSubmitAction extends ActionSupport {
    private String pickup_time;
    private String confirmationMessage;

    public void setPickup_time(String pickup_time) { this.pickup_time = pickup_time; }
    public String getPickup_time() { return pickup_time; }
    
    public String getConfirmationMessage() { return confirmationMessage; }
    public void setConfirmationMessage(String confirmationMessage) { this.confirmationMessage = confirmationMessage; }

    @Override
    public String execute() {
        confirmationMessage = "Order Confirmed";
        return SUCCESS;
    }
}