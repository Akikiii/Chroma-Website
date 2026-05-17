<template>
  <div class="pricing-container view-padding">
    <div class="header text-center animate-title">
      <h1><span class="gradient-text">Choose Your Plan</span></h1>
      <p>Whether you're a casual creator or a professional designer, we have a plan for you.</p>
    </div>

    <div class="pricing-grid container">
      <!-- Free Plan -->
      <div class="pricing-card animate-card" style="--delay: 0.1s">
        <div class="plan-header">
          <h2>Free</h2>
          <div class="price">
            <span class="currency">$</span>0<span class="period">/mo</span>
          </div>
          <p>Perfect to get started and explore the world of color.</p>
        </div>
        <div class="plan-features">
          <ul>
            <li><span class="check">✓</span> 50 Image Uploads</li>
            <li><span class="check">✓</span> Basic Color Mixing</li>
            <li><span class="check">✓</span> Standard Dashboard</li>
            <li class="disabled"><span class="cross">✕</span> Hex Extraction tool</li>
            <li class="disabled"><span class="cross">✕</span> Priority Support</li>
          </ul>
        </div>
        <button class="btn btn-outline" @click="$router.push('/register')">Get Started</button>
      </div>

      <!-- Premium Plan -->
      <div class="pricing-card premium animate-card" style="--delay: 0.3s">
        <div class="popular-badge">Most Popular</div>
        <div class="plan-header">
          <h2>Premium</h2>
          <div class="price">
            <span class="currency">$</span>9<span class="cents">.99</span><span class="period">/mo</span>
          </div>
          <p>For power users who need complete control and limitless storage.</p>
        </div>
        <div class="plan-features">
          <ul>
            <li><span class="check highlight">✓</span> Unlimited Image Uploads</li>
            <li><span class="check highlight">✓</span> Advanced Color Mixing</li>
            <li><span class="check highlight">✓</span> Unlimited Hex Extractions</li>
            <li><span class="check highlight">✓</span> Early Access to New Features</li>
            <li><span class="check highlight">✓</span> 24/7 Priority Support</li>
          </ul>
        </div>
        <button class="btn btn-primary" @click="$router.push('/register')">Upgrade Now</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.view-padding {
  padding: 60px 20px 100px;
  color: #fff;
  min-height: calc(100vh - 80px);
}

.header {
  margin-bottom: 60px;
}

.header h1 {
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 10px;
  letter-spacing: -1px;
}

.gradient-text {
  background: linear-gradient(135deg, #e14eca 0%, #4158D0 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.header p {
  color: #b0b0c0;
  font-size: 1.25rem;
}

.pricing-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
  max-width: 1000px;
  margin: 0 auto;
}

.pricing-card {
  flex: 1;
  min-width: 320px;
  max-width: 450px;
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius: 30px;
  padding: 50px 40px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  position: relative;
  display: flex;
  flex-direction: column;
}

.pricing-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
}

.pricing-card.premium {
  background: rgba(25, 20, 50, 0.4);
  border: 2px solid #e14eca;
  box-shadow: 0 15px 35px rgba(225, 78, 202, 0.15);
  transform: scale(1.05); /* Make it stand out slightly */
}

.pricing-card.premium:hover {
  transform: scale(1.05) translateY(-10px);
  box-shadow: 0 20px 45px rgba(225, 78, 202, 0.3);
}

.popular-badge {
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  color: #fff;
  padding: 8px 20px;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
  box-shadow: 0 4px 10px rgba(225, 78, 202, 0.4);
}

.plan-header {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  padding-bottom: 30px;
  margin-bottom: 30px;
  text-align: center;
}

.plan-header h2 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 15px;
}

.pricing-card.premium .plan-header h2 {
  color: #e14eca;
}

.price {
  font-size: 4rem;
  font-weight: 800;
  line-height: 1;
  margin-bottom: 15px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
}

.currency {
  font-size: 2rem;
  margin-top: 10px;
  margin-right: 2px;
  color: #b0b0c0;
}

.cents {
  font-size: 2rem;
  margin-top: 10px;
}

.period {
  font-size: 1.2rem;
  color: #b0b0c0;
  align-self: flex-end;
  margin-bottom: 15px;
  font-weight: 500;
}

.plan-header p {
  color: #a0a0b0;
  font-size: 1.05rem;
  line-height: 1.6;
}

.plan-features {
  flex-grow: 1;
  margin-bottom: 40px;
}

.plan-features ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.plan-features li {
  margin-bottom: 20px;
  font-size: 1.1rem;
  display: flex;
  align-items: center;
  gap: 15px;
}

.plan-features li.disabled {
  color: #606070;
}

.check {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 24px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  font-size: 0.9rem;
  color: #fff;
}

.check.highlight {
  background: #e14eca;
  box-shadow: 0 0 10px rgba(225, 78, 202, 0.4);
}

.cross {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 24px;
  background: transparent;
  border-radius: 50%;
  font-size: 0.9rem;
  color: #606070;
}

.btn {
  width: 100%;
  padding: 16px;
  border-radius: 30px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.btn-primary {
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  color: #fff;
  border: none;
  box-shadow: 0 8px 20px rgba(225, 78, 202, 0.3);
}

.btn-primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 25px rgba(225, 78, 202, 0.5);
}

.btn-outline {
  background: transparent;
  color: #fff;
  border: 2px solid rgba(255, 255, 255, 0.2);
}

.btn-outline:hover {
  border-color: #fff;
  background: rgba(255, 255, 255, 0.05);
  transform: translateY(-3px);
}

/* Entrance Animations */
.animate-title { animation: fadeInUp 0.8s ease backwards; }
.animate-card { animation: fadeInUp 0.8s ease var(--delay) backwards; }

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 768px) {
  .header h1 { font-size: 2.5rem; }
  .pricing-grid { flex-direction: column; align-items: center; }
  .pricing-card.premium { transform: scale(1); }
  .pricing-card.premium:hover { transform: translateY(-5px); }
}
</style>