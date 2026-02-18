-- SQLite schema for Legacy Bakery
DROP TABLE IF EXISTS menu_items;

CREATE TABLE menu_items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT,
    price REAL,
    is_available INTEGER DEFAULT 1
);

INSERT INTO menu_items (name, description, price) VALUES
('Classic Croissant', 'Buttery and flaky.', 3.50),
('Sourdough Loaf', 'Tangy and crusty perfection.', 6.00),
('Pain au Chocolat', 'Rich chocolate in flaked pastry.', 4.00);
