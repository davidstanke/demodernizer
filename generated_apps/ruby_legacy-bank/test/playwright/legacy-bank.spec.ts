import { test, expect } from '@playwright/test';

const BASE_URL = 'http://localhost:3000'; // Default Rails port
const API_URL = `${BASE_URL}/api/v1`;

test.describe('Legacy Bank - UI', () => {
  test('Accessing the Employee Portal', async ({ page }) => {
    await page.goto(BASE_URL);
    await expect(page).toHaveTitle(/Legacy Bank - Intranet/);
    await expect(page.locator('h2')).toContainText('Welcome to the Employee Portal');
  });

  test('Navigating to Customer Directory', async ({ page }) => {
    await page.goto(BASE_URL);
    await page.click('a:has-text("Customer Directory")');
    await expect(page.locator('h2')).toContainText('Customer Directory');
  });
});

test.describe('Legacy Bank - API', () => {
  let customerId: number;
  let accountId: number;

  test('Customer Management', async ({ request }) => {
    // Create Customer
    const createResponse = await request.post(`${API_URL}/customers`, {
      data: {
        firstName: 'John',
        lastName: 'Doe',
        email: 'john.doe@example.com',
        dateOfBirth: '1985-05-20',
        customerNumber: '1001'
      }
    });
    expect(createResponse.status()).toBe(201);
    const customer = await createResponse.json();
    customerId = customer.id;
    expect(typeof customerId).toBe('number');
    expect(customer.first_name).toBe('John');

    // Get Customer
    const getResponse = await request.get(`${API_URL}/customers/${customerId}`);
    expect(getResponse.status()).toBe(200);
    const retrievedCustomer = await getResponse.json();
    expect(retrievedCustomer.customer_number).toBe('1001');

    // Update Customer
    const updateResponse = await request.put(`${API_URL}/customers/${customerId}`, {
      data: { email: 'john.new@example.com' }
    });
    expect(updateResponse.status()).toBe(200);
    const updatedCustomer = await updateResponse.json();
    expect(updatedCustomer.email).toBe('john.new@example.com');

    // Delete Customer
    const deleteResponse = await request.delete(`${API_URL}/customers/${customerId}`);
    expect(deleteResponse.status()).toBe(204);

    const checkDelete = await request.get(`${API_URL}/customers/${customerId}`);
    expect(checkDelete.status()).toBe(404);
  });

  test('Account and Transaction Management', async ({ request }) => {
    // Setup Customer
    const setupCustomer = await request.post(`${API_URL}/customers`, {
      data: {
        firstName: 'Alice',
        lastName: 'Smith',
        email: 'alice.smith@example.com',
        dateOfBirth: '1990-01-01',
        customerNumber: '2002'
      }
    });
    const customer = await setupCustomer.json();
    const cId = customer.id;

    // Open Account
    const openAccount = await request.post(`${API_URL}/accounts`, {
      data: {
        customerId: cId,
        productCode: 'CHK-STD',
        currencyCode: 'USD'
      }
    });
    expect(openAccount.status()).toBe(201);
    const account = await openAccount.json();
    accountId = account.id;
    expect(typeof accountId).toBe('number');
    expect(account.status).toBe('ACTIVE');
    expect(parseFloat(account.balance)).toBe(0.00);

    // Update Status
    const updateStatus = await request.put(`${API_URL}/accounts/${accountId}/status`, {
      data: { status: 'FROZEN' }
    });
    expect(updateStatus.status()).toBe(200);
    const frozenAccount = await updateStatus.json();
    expect(frozenAccount.status).toBe('FROZEN');

    // Set Status back to ACTIVE for transactions
    await request.put(`${API_URL}/accounts/${accountId}/status`, {
      data: { status: 'ACTIVE' }
    });

    // Deposit
    const deposit = await request.post(`${API_URL}/transactions`, {
      data: {
        accountId: accountId,
        type: 'DEPOSIT',
        amount: 500.00,
        currency: 'USD',
        description: 'Initial Deposit'
      }
    });
    expect(deposit.status()).toBe(201);
    const depositResult = await deposit.json();
    expect(parseFloat(depositResult.balance_after)).toBe(500.00);

    // Withdrawal
    const withdrawal = await request.post(`${API_URL}/transactions`, {
      data: {
        accountId: accountId,
        type: 'WITHDRAWAL',
        amount: 50.00,
        currency: 'USD',
        description: 'Cash Withdrawal'
      }
    });
    expect(withdrawal.status()).toBe(201);
    const withdrawalResult = await withdrawal.json();
    expect(parseFloat(withdrawalResult.balance_after)).toBe(450.00);

    // History
    const historyResponse = await request.get(`${API_URL}/transactions/account/${accountId}`);
    expect(historyResponse.status()).toBe(200);
    const history = await historyResponse.json();
    expect(history.length).toBe(2);
  });

  test('Error Handling - Insufficient Funds', async ({ request }) => {
     // Setup Customer
     const setupCustomer = await request.post(`${API_URL}/customers`, {
      data: {
        firstName: 'Bob',
        lastName: 'Jones',
        email: 'bob.jones@example.com',
        dateOfBirth: '1970-12-12',
        customerNumber: '3003'
      }
    });
    const customer = await setupCustomer.json();
    const cId = customer.id;

    // Open Account
    const openAccount = await request.post(`${API_URL}/accounts`, {
      data: {
        customerId: cId,
        productCode: 'CHK-STD',
        currencyCode: 'USD'
      }
    });
    const account = await openAccount.json();
    const aId = account.id;

    // Attempt Withdrawal exceeding balance (0.00)
    const withdrawal = await request.post(`${API_URL}/transactions`, {
      data: {
        accountId: aId,
        type: 'WITHDRAWAL',
        amount: 100.00,
        currency: 'USD',
        description: 'Failed Overdraft'
      }
    });
    expect(withdrawal.status()).toBe(400);
    const error = await withdrawal.json();
    expect(error.status).toBe(400);
  });
});
