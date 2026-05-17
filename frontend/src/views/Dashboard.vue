<template>
  <div class="dashboard-container view-padding">
    <div class="header text-center animate-title">
      <h1><span class="gradient-text">Dashboard</span></h1>
      <p>Welcome back! Here is your personal image management hub.</p>
    </div>
    
    <div class="dashboard-grid container">
      <!-- Card 1 -->
      <div class="card animate-card" style="--delay: 0.1s">
        <div class="card-icon-wrapper">
          <span class="icon">🖼️</span>
        </div>
        <h3>My Images</h3>
        <p class="stat">12 <span class="stat-label">Total Uploads</span></p>
        <button class="btn btn-outline">View Collection</button>
      </div>

      <!-- Card 2 -->
      <div class="card animate-card" style="--delay: 0.3s">
        <div class="card-icon-wrapper">
          <span class="icon">💾</span>
        </div>
        <h3>Storage Used</h3>
        <p class="stat">450 MB <span class="stat-label">/ 5 GB</span></p>
        <div class="progress-bar">
          <div class="progress" style="width: 15%;"></div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="card animate-card" style="--delay: 0.5s">
        <div class="card-icon-wrapper">
          <span class="icon">⚡</span>
        </div>
        <h3>Recent Activity</h3>
        <ul class="activity-list">
          <li><span class="activity-bullet green"></span> Uploaded "sunset.jpg"</li>
          <li><span class="activity-bullet red"></span> Deleted "old_logo.png"</li>
          <li><span class="activity-bullet purple"></span> Mixed colors on Hex Identifier</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
.view-padding {
  padding: 60px 20px;
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

.dashboard-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 35px;
  max-width: 1200px;
  margin: 0 auto;
}

.card {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius: 25px;
  padding: 40px 30px;
  border: 1px solid rgba(255, 255, 255, 0.05);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  overflow: hidden;
}

.card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, #e14eca, #4158D0);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card:hover {
  transform: translateY(-10px);
  background: rgba(255, 255, 255, 0.06);
  border-color: rgba(225, 78, 202, 0.3);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 20px rgba(225, 78, 202, 0.1);
}

.card:hover::before {
  opacity: 1;
}

.card-icon-wrapper {
  width: 60px;
  height: 60px;
  background: rgba(225, 78, 202, 0.1);
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 25px;
  border: 1px solid rgba(225, 78, 202, 0.2);
}

.icon {
  font-size: 1.8rem;
}

.card h3 {
  margin-top: 0;
  color: #fff;
  font-size: 1.6rem;
  font-weight: 700;
  margin-bottom: 10px;
}

.stat {
  font-size: 2rem;
  font-weight: 800;
  color: #e14eca;
  margin-bottom: 25px;
  display: flex;
  align-items: baseline;
  gap: 8px;
}

.stat-label {
  font-size: 1rem;
  font-weight: 500;
  color: #a0a0b0;
}

.btn-outline {
  width: 100%;
  background: transparent;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.2);
  padding: 12px 20px;
  border-radius: 25px;
  cursor: pointer;
  transition: all 0.3s ease;
  font-weight: 600;
  font-size: 1rem;
}

.btn-outline:hover {
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  border-color: transparent;
  box-shadow: 0 5px 15px rgba(225, 78, 202, 0.4);
  transform: translateY(-2px);
}

.progress-bar {
  background: rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  height: 12px;
  margin-top: 5px;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.progress {
  background: linear-gradient(90deg, #4158D0, #e14eca);
  height: 100%;
  border-radius: 10px;
  position: relative;
}

.progress::after {
  content: "";
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.4) 50%, rgba(255,255,255,0) 100%);
  animation: shimmer 2s infinite;
}

@keyframes shimmer {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}

.activity-list {
  list-style: none;
  padding: 0;
  margin: 0;
  color: #b0b0c0;
}

.activity-list li {
  padding: 12px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 1.05rem;
}

.activity-list li:last-child {
  border-bottom: none;
}

.activity-bullet {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  display: inline-block;
}

.activity-bullet.green { background: #00f2fe; box-shadow: 0 0 10px rgba(0, 242, 254, 0.5); }
.activity-bullet.red { background: #fd1d1d; box-shadow: 0 0 10px rgba(253, 29, 29, 0.5); }
.activity-bullet.purple { background: #e14eca; box-shadow: 0 0 10px rgba(225, 78, 202, 0.5); }

/* Entrance Animations */
.animate-title { animation: fadeInUp 0.8s ease backwards; }
.animate-card { animation: fadeInUp 0.8s ease var(--delay) backwards; }

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 768px) {
  .header h1 { font-size: 2.5rem; }
  .view-padding { padding: 40px 15px; }
  .card { padding: 30px 20px; }
}
</style>