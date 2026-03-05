Feature: Legacy Bank Intranet
  As a bank employee
  I want to manage customers, accounts, and transactions
  So that I can perform core banking operations via the intranet portal

  Background:
    Given the Legacy Bank Intranet application is running

  @ui
  Scenario: Accessing the Employee Portal
    Given I am on the home page
    Then I should see the title "Legacy Bank - Intranet"
    And I should see a welcome message "Welcome to the Employee Portal"

  @ui @customers
  Scenario: Navigating to Customer Directory
    Given I am on the home page
    When I click on the "Customer Directory" link
    Then I should see the heading "Customer Directory"

  @api @customers
  Scenario: Create and manage a customer
    When I create a new customer with the following details:
      | firstName      | John                 |
      | lastName       | Doe                  |
      | email          | john.doe@example.com |
      | dateOfBirth    | 1985-05-20           |
      | customerNumber | 1001                 |
    Then the customer should be created successfully
    And I should be able to retrieve the customer details for "1001"
    When I update the customer "1001" email to "john.new@example.com"
    Then the customer email should be "john.new@example.com"
    When I delete the customer "1001"
    Then the customer "1001" should no longer exist

  @api @accounts
  Scenario: Open and manage a financial account
    Given a customer with number "1001" exists
    When I open a new account for customer "1001" with:
      | productCode  | CHK-STD |
      | currencyCode | USD     |
    Then a new account should be created in "ACTIVE" status
    And the account balance should be 0.00
    When I update the account status to "FROZEN"
    Then the account status should be "FROZEN"

  @api @transactions
  Scenario: Perform financial transactions
    Given customer "1001" has an "ACTIVE" account with balance 500.00
    When I record a "DEPOSIT" transaction:
      | amount      | 100.00      |
      | description | ATM Deposit |
    Then the transaction should be successful
    And the new account balance should be 600.00
    When I record a "WITHDRAWAL" transaction:
      | amount      | 50.00        |
      | description | Cash machine |
    Then the transaction should be successful
    And the new account balance should be 550.00
    And the transaction history should show 2 transactions

  @api @error-handling
  Scenario: Handle invalid transaction requests
    Given customer "1001" has an "ACTIVE" account with balance 10.00
    When I attempt to record a "WITHDRAWAL" of 100.00
    Then the request should fail with a 400 "Bad Request" error
    And the error message should indicate insufficient funds or validation failure
