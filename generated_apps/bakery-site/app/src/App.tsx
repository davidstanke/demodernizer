import React from 'react';
import './App.css';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <h1>Butter Bakery</h1>
        <p className="subtitle">Crafting sweetness in Jersey City</p>
      </header>
      <main className="App-content">
        <section className="info-section">
          <h2>Visit Us</h2>
          <p>123 Bakery Lane</p>
          <p>Jersey City, NJ 07302</p>
        </section>
        
        <section className="info-section">
          <h2>Hours</h2>
          <ul className="hours-list">
            <li><span>Monday - Friday:</span> <span>7:00 AM - 6:00 PM</span></li>
            <li><span>Saturday:</span> <span>8:00 AM - 5:00 PM</span></li>
            <li><span>Sunday:</span> <span>8:00 AM - 4:00 PM</span></li>
          </ul>
        </section>

        <section className="info-section">
          <h2>Fresh Today</h2>
          <div className="product-grid">
            <div className="product-card">
              <h3>Classic Croissant</h3>
              <p>Buttery, flaky, and golden brown.</p>
            </div>
            <div className="product-card">
              <h3>Sourdough Loaf</h3>
              <p>Slow-fermented for perfect tang and crust.</p>
            </div>
            <div className="product-card">
              <h3>Pain au Chocolat</h3>
              <p>Rich dark chocolate wrapped in buttery pastry.</p>
            </div>
          </div>
        </section>
      </main>
      <footer className="App-footer">
        <p>&copy; 2026 Butter Bakery. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default App;
