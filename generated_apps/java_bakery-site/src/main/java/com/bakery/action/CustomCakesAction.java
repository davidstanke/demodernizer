package com.bakery.action;

import com.opensymphony.xwork2.ActionSupport;

public class CustomCakesAction extends ActionSupport {
    private String successMessage;

    public String getSuccessMessage() { return successMessage; }
    public void setSuccessMessage(String successMessage) { this.successMessage = successMessage; }

    @Override
    public String execute() {
        return SUCCESS;
    }
}