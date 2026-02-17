import { test, expect } from '@playwright/test';

test('has title', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  await expect(page).toHaveTitle(/Legacy Bank - Intranet/);
});

test('welcome message', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  await expect(page.locator('h2')).toContainText('Welcome to the Employee Portal');
});

test('navigation to customer list', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  await page.click('a[href="#customers"]');
  await expect(page.locator('h2')).toContainText('Customer Directory');
});
