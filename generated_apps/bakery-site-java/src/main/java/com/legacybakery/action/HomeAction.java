package com.legacybakery.action;

import com.opensymphony.xwork2.ActionSupport;

public class HomeAction extends ActionSupport {
    private String message;

    public String execute() {
        message = "Butter Bakery";
        return SUCCESS;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
