// @ts-check
import { test, expect } from '@playwright/test';

test.beforeEach(async ({ page }) => {
  await page.goto('http://localhost/timbo/');
});

test.describe('Hacer un pedido', () => {
  test('debe permitir iniciar sesión', async ({ page }) => {
    // Iniciar sesión
    await page.getByRole('link', { name: /iniciar sesión o registrarse/i }).click()

    await page.fill('input#email', 'esteban@mail.com');

    await page.fill('input#password', '123');

    await page.getByRole('button', { name: 'Iniciar Sesión' }).click()

    // Make sure the list only has one todo item.
    await expect(page.getByText('Hola, Esteban')).toHaveText([
      'Hola, Esteban'
    ])
  });

  test('debe permitir agregar un producto al carrito', async ({ page }) => {
    // Iniciar sesión
    await page.getByRole('link', { name: /iniciar sesión o registrarse/i }).click()

    await page.fill('input#email', 'esteban@mail.com');

    await page.fill('input#password', '123');

    await page.getByRole('button', { name: 'Iniciar Sesión' }).click()

    // Añadir al carrito
    await page.locator('button.product__btn').first().click()
    
    await page.getByAltText('Ícono de carrito').click()
    
    // Make sure the list only has one todo item.
    await expect(page.locator('ul.cart-products')).toHaveCount(1)
  });

  test('debe permitir realizar la compra', async ({ page }) => {
    // Iniciar sesión
    await page.getByRole('link', { name: /iniciar sesión o registrarse/i }).click()

    await page.fill('input#email', 'esteban@mail.com');

    await page.fill('input#password', '123');

    await page.getByRole('button', { name: 'Iniciar Sesión' }).click()

    // Añadir al carrito
    await page.locator('button.product__btn').first().click()
    
    await page.getByAltText('Ícono de carrito').click()

    await page.locator('button.cart-confirm__btn').click()

    await page.getByLabel('Boleta').click();
    await page.fill('input#doc-number', '78765432');
    await page.fill('input#tel', '965235858');
    await page.fill('input#location', 'Lima, PERÚ');

    await page.getByText('Hacer pedido').click()
    
    // Make sure the list only has one todo item.
    await expect(page.locator('h1')).toHaveText(/gracias por tu compra/i)
  });
})