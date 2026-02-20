# Feature: Store Information & Accessibility
# As a hungry customer, I want to see the shop's location and hours so that I can visit in person.

Feature: Store Information

  Scenario: Viewing store hours and location
    Given I am on the bakery home page
    When I look at the footer or "Visit Us" section
    Then I should see the street address "123 Sourdough Lane"
    And I should see the current day's hours of operation
    And I should see a link to open the location in Google Maps

---

# Feature: Digital Menu
# As a customer with specific tastes, I want to browse the menu by category to see today's treats.

Feature: Digital Menu

  Scenario: Filtering the menu by category
    Given I am on the "Menu" page
    When I select the "Pastries" category
    Then I should see "Butter Croissant" and "Pain au Chocolat"
    But I should not see "Espresso" or "Latte"

  Scenario: Identifying dietary-friendly options
    Given I am browsing the menu
    When an item is "Gluten-Free" or "Vegan"
    Then it should display a clear badge or icon next to the item name

---

# Feature: Online Ordering for Pick-up
# As a busy local, I want to order bread and coffee online so it is ready when I arrive.

Feature: Online Ordering for Pick-up

  Scenario: Adding items to the cart
    Given I have selected a "Cinnamon Roll" from the menu
    And I have selected "Large Oat Milk Latte"
    When I click "Add to Order"
    Then my cart total should reflect the price of both items
    And the cart icon should show "2" items

  Scenario: Selecting a pick-up time
    Given I am at the checkout screen
    When I choose a pick-up time for "15 minutes from now"
    And I complete the payment
    Then I should receive an order confirmation email
    And the bakery staff should receive the order in their dashboard

---

# Feature: Custom Order Inquiry
# As a customer planning a party, I want to inquire about a custom cake for a quote.

Feature: Custom Order Inquiry

  Scenario: Submitting a custom cake request
    Given I am on the "Custom Cakes" page
    When I fill out the form with my "Event Date", "Flavour", and "Size"
    And I click "Submit Inquiry"
    Then I should see a message saying "Thank you! We will get back to you within 24 hours."