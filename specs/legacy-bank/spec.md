# Banking Application Specification v0.1.0

## Overview

This application represents an intranet site for a bank named Legacy Bank. The application manages core banking entities: Persons (Customers), Financial Applications (Accounts), and Transactions. It provides a user Web UI, backed by a RESTful API, for use by employees of the bank. Because it is to be used in demo contexts, it should not require any login. All customer data is fully visible and editable by an anonymous user.

## Design Principles

1. **Stateless REST:** All API interactions are stateless.
2. **Clean UI:** The Web UI supports all functionality provided by the API, via clean, simple pages.

---

## Data Model (Summary)

The application maps to the provided DDL in ddl.md:

-   **Person (Customer):** Represents the identity (`customers` table).
    -   Key attributes: `customer_id` (UUID), `customer_number` (String), `first_name`, `last_name`, `email`, `kyc_status`.
-   **Financial Application (Account):** Represents a product instance held by a customer (`accounts` table).
    -   Key attributes: `account_id` (UUID), `account_number`, `product_code`, `balance`, `status`.
-   **Transaction:** Represents a financial movement (`transactions` table).
    -   Key attributes: `transaction_id` (UUID), `amount`, `transaction_type`, `balance_after`.

---

## API Specification

All endpoints are prefixed with `/api/v1`.

### 1. Person (Customers)

**Base URL:** `/api/v1/customers`

#### Create Person
-   **Method:** `POST /`
-   **Body:**
    ```json
    {
      "firstName": "John",
      "lastName": "Doe",
      "email": "john.doe@example.com",
      "dateOfBirth": "1985-05-20",
      "customerNumber": "1001"
    }
    ```
-   **Response:** `201 Created` with created Customer .

#### Get Person
-   **Method:** `GET /{id}`
-   **Response:** `200 OK` with Customer .
-   **Error:** `404 Not Found` if ID does not exist.

#### Update Person
-   **Method:** `PUT /{id}`
-   **Body:** (Fields to update, e.g., address, email)
-   **Response:** `200 OK` with updated Customer .

#### Delete Person
-   **Method:** `DELETE /{id}`
-   **Response:** `204 No Content`.

---

### 2. Financial Application (Accounts)

**Base URL:** `/api/v1/accounts`

#### Create Financial Application (Open Account)
-   **Method:** `POST /`
-   **Body:**
    ```json
    {
      "customerId": "uuid-...",
      "productCode": "SAV-GOLD",
      "currencyCode": "USD"
    }
    ```
-   **Response:** `201 Created` with Account  (including generated `accountNumber`).

#### Get Account Details
-   **Method:** `GET /{id}`
-   **Response:** `200 OK` with Account .

#### Update Account Status
-   **Method:** `PATCH /{id}/status`
-   **Body:** `{ "status": "FROZEN" }`
-   **Response:** `200 OK` with updated Account .

---

### 3. Transactions

**Base URL:** `/api/v1/transactions`

#### Create Transaction (Deposit/Withdrawal)
-   **Method:** `POST /`
-   **Body:**
    ```json
    {
      "accountId": "uuid-...",
      "type": "DEPOSIT",
      "amount": 100.00,
      "currency": "USD",
      "description": "ATM Deposit"
    }
    ```
-   **Response:** `201 Created` with Transaction  (including `balanceAfter`).

#### Get Transaction History
-   **Method:** `GET /account/{accountId}`
-   **Response:** `200 OK` with List of Transaction s.

---

## Error Handling

Errors return a standard JSON structure:

```json
{
  "timestamp": "2026-02-06T10:00:00Z",
  "status": 400,
  "error": "Bad Request",
  "message": "Invalid email format",
  "path": "/api/v1/customers"
}
```

| HTTP Status | Condition |
|-------------|-----------|
| 400 | Validation failure (e.g., missing field, negative amount) |
| 404 | Resource not found (Customer/Account ID) |
| 409 | Conflict (e.g., Duplicate customer # or Email) |
| 500 | Internal Server Error |