const { test, expect } = require('@playwright/test');

const BASE_URL = 'http://localhost:8080';

test.describe('Legacy Bakery Application', () => {

  test('Checking what\'s new on the home page', async ({ page }) => {
    await page.goto(BASE_URL + '/index.php');
    await expect(page.locator('h1 img')).toHaveAttribute('alt', 'Legacy Bakery');
    await expect(page.locator('#promotions')).toBeVisible();
    await expect(page.locator('img.baked-good').first()).toBeVisible();
  });

  test('Viewing store hours and location', async ({ page }) => {
    await page.goto(BASE_URL + '/index.php');
    const footer = page.locator('#visit-us');
    await expect(footer).toContainText('123 Sourdough Lane');
    await expect(footer).toContainText('hours of operation');
    await expect(footer.locator('a[href*="maps.google.com"]')).toBeVisible();
  });

  test('Filtering the menu by category', async ({ page }) => {
    await page.goto(BASE_URL + '/menu.php');
    await page.selectOption('#category-filter', 'Pastries');
    
    await expect(page.locator('.menu-item:has-text("Butter Croissant")')).toBeVisible();
    await expect(page.locator('.menu-item:has-text("Pain au Chocolat")')).toBeVisible();
    
    // Use more specific matching to avoid "Large Oat Milk Latte" matching "Latte"
    await expect(page.locator('.menu-item').filter({ hasText: /^Espresso/ })).not.toBeVisible();
    await expect(page.locator('.menu-item').filter({ hasText: /^Latte/ })).not.toBeVisible();
  });

  test('Identifying dietary-friendly options', async ({ page }) => {
    await page.goto(BASE_URL + '/menu.php');
    const gfItem = page.locator('.menu-item:has-text("Gluten-Free")');
    const veganItem = page.locator('.menu-item:has-text("Vegan")');
    
    await expect(gfItem.locator('.badge')).toBeVisible();
    await expect(veganItem.first().locator('.badge')).toBeVisible();
  });

  test('Adding items to the cart and selecting pick-up time', async ({ page }) => {
    await page.goto(BASE_URL + '/menu.php');
    
    // Add Cinnamon Roll
    const cinnamonRoll = page.locator('.menu-item:has-text("Cinnamon Roll")');
    await cinnamonRoll.getByRole('button', { name: 'Add to Order' }).click();
    
    // Add Large Oat Milk Latte
    const latte = page.locator('.menu-item:has-text("Large Oat Milk Latte")');
    await latte.getByRole('button', { name: 'Add to Order' }).click();
    
    // Verify cart icon
    await expect(page.locator('#cart-count')).toHaveText('2');
    
    // Go to checkout
    await page.goto(BASE_URL + '/checkout.php');
    
    // Choose pick-up time
    await page.selectOption('#pickup-time', { label: '15 minutes from now' });
    
    // Complete payment
    await page.click('#complete-payment');
    
    // Verify order confirmation
    await expect(page.locator('#confirmation-message')).toContainText('order confirmation');
  });

  test('Submitting a custom cake request', async ({ page }) => {
    await page.goto(BASE_URL + '/custom-cakes.php');
    
    await page.fill('input[name="event_date"]', '2026-05-01');
    await page.fill('input[name="flavour"]', 'Chocolate');
    await page.fill('input[name="size"]', '10 inch');
    await page.click('#submit-inquiry');
    
    await expect(page.locator('#inquiry-response')).toContainText('Thank you! We will get back to you within 24 hours.');
  });

});
