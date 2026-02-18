import { test, expect } from '@playwright/test';

test.describe('Butter Bakery Site', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('http://localhost:3000');
  });

  test('should display the main heading', async ({ page }) => {
    await expect(page.getByRole('heading', { name: 'Legacy Bakery', level: 1 })).toBeVisible();
  });

  test('should list bakery products', async ({ page }) => {
    await expect(page.getByText('Classic Croissant')).toBeVisible();
    await expect(page.getByText('Sourdough Loaf')).toBeVisible();
    await expect(page.getByText('Pain au Chocolat')).toBeVisible();
  });

  test('should show store hours', async ({ page }) => {
    await expect(page.getByRole('heading', { name: 'Hours' })).toBeVisible();
    await expect(page.getByText('Monday - Friday:')).toBeVisible();
  });

  test('should have contact information', async ({ page }) => {
    await expect(page.getByText('123 Bakery Lane')).toBeVisible();
    await expect(page.getByText('Jersey City, NJ 07302')).toBeVisible();
  });
});
