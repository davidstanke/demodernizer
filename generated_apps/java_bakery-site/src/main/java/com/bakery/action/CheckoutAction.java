package com.bakery.action;

import com.opensymphony.xwork2.ActionSupport;

public class CheckoutAction extends ActionSupport {
    private String confirmationMessage;
    
    public String getConfirmationMessage() { return confirmationMessage; }
    public void setConfirmationMessage(String confirmationMessage) { this.confirmationMessage = confirmationMessage; }

    @Override
    public String execute() {
        return SUCCESS;
    }
}