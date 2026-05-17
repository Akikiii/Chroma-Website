<template>
  <div class="app-container">
    <!-- Abstract glowing blobs for background -->
    <div class="blob shape-1"></div>
    <div class="blob shape-2"></div>

    <div class="header-section">
      <div class="container text-center">
        <h1 class="main-title animate-title">Welcome to <span class="gradient-text">Chroma!</span></h1>
        <p class="subtitle animate-subtitle">
          The ultimate platform to upload, manage, and share your images seamlessly. Built with power, designed for speed.
        </p>

        <div class="actions animate-actions">
          <router-link to="/pricing" class="btn btn-primary primary-action">Get Started</router-link>
          <router-link to="/register" class="btn btn-outline secondary-action">Sign Up</router-link>
        </div>

        <div class="features-grid">
          <div class="feature-card animate-card" style="--delay: 0.1s">
            <div class="icon-wrapper">
               <div class="icon">☁️</div>
            </div>
            <h3>Easy Uploads</h3>
            <p>Drag and drop your images instantly with our lightning-fast uploader.</p>
          </div>
          <div class="feature-card animate-card" style="--delay: 0.3s">
            <div class="icon-wrapper">
               <div class="icon">🖼️</div>
            </div>
            <h3>Organize beautifully</h3>
            <p>Keep track of all your vibrant photos in an elegant, dark-themed dashboard.</p>
          </div>
          <div class="feature-card animate-card" style="--delay: 0.5s">
            <div class="icon-wrapper">
               <div class="icon">🔒</div>
            </div>
            <h3>Secure Access</h3>
            <p>Your media is private and protected. Only you control who sees your content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.app-container {
  min-height: calc(100vh - 80px); /* minus navbar height */
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 0;
  margin: 0;
  width: 100%;
  box-sizing: border-box;
  position: relative;
  overflow: hidden;
  background: transparent;
}

/* Background floating shapes */
.blob {
  position: absolute;
  filter: blur(80px);
  z-index: -1;
  opacity: 0.6;
  border-radius: 50%;
  animation: float 20s infinite alternate;
}

.shape-1 {
  width: 400px;
  height: 400px;
  background: rgba(225, 78, 202, 0.4);
  top: -100px;
  left: -100px;
}

.shape-2 {
  width: 500px;
  height: 500px;
  background: rgba(65, 88, 208, 0.4);
  bottom: -200px;
  right: -100px;
  animation-delay: -10s;
}

@keyframes float {
  0% { transform: translate(0, 0) scale(1); }
  100% { transform: translate(50px, 80px) scale(1.1); }
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  position: relative;
  z-index: 1;
}

.text-center {
  text-align: center;
}

.main-title {
  font-size: 5rem;
  font-weight: 800;
  margin-bottom: 20px;
  line-height: 1.1;
  letter-spacing: -2px;
}

.gradient-text {
  background: linear-gradient(135deg, #e14eca 0%, #4158D0 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.subtitle {
  font-size: 1.35rem;
  line-height: 1.8;
  color: #b0b0c0;
  max-width: 700px;
  margin: 0 auto 40px;
}

.actions {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-bottom: 90px;
}

.btn {
  padding: 16px 45px;
  font-size: 1.1rem;
  font-weight: 600;
  border-radius: 35px;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  border: none;
  text-decoration: none;
  display: inline-block;
  line-height: inherit;
}

.primary-action {
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  color: #fff;
  box-shadow: 0 10px 30px rgba(225, 78, 202, 0.3);
}

.primary-action:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(225, 78, 202, 0.5);
}

.secondary-action {
  background: rgba(255, 255, 255, 0.05);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
}

.secondary-action:hover {
  border-color: #e14eca;
  background: rgba(225, 78, 202, 0.1);
  transform: translateY(-5px);
  color: #e14eca;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 40px;
  text-align: center;
}

.feature-card {
  background: rgba(255, 255, 255, 0.02);
  backdrop-filter: blur(10px);
  border-radius: 25px;
  padding: 50px 30px;
  border: 1px solid rgba(255, 255, 255, 0.05);
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  overflow: hidden;
}

.feature-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, #e14eca, transparent);
  transform: translateX(-100%);
  transition: transform 0.6s ease;
}

.feature-card:hover {
  transform: translateY(-10px);
  background: rgba(255, 255, 255, 0.05);
  border-color: rgba(225, 78, 202, 0.3);
  box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

.feature-card:hover::before {
  transform: translateX(100%);
}

.icon-wrapper {
  width: 80px;
  height: 80px;
  margin: 0 auto 25px;
  background: rgba(255,255,255,0.05);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.3s ease;
}

.feature-card:hover .icon-wrapper {
  transform: scale(1.1) rotate(5deg);
  background: rgba(225, 78, 202, 0.1);
}

.icon {
  font-size: 2.5rem;
}

h3 {
  font-size: 1.6rem;
  font-weight: 700;
  margin-bottom: 15px;
  color: #fff;
}

p {
  color: #a0a0b0;
  line-height: 1.7;
  font-size: 1.05rem;
}

/* Entrance Animations */
.animate-title {
  animation: fadeInUp 0.8s ease backwards;
}
.animate-subtitle {
  animation: fadeInUp 0.8s ease 0.2s backwards;
}
.animate-actions {
  animation: fadeInUp 0.8s ease 0.4s backwards;
}
.animate-card {
  animation: fadeInUp 0.8s ease var(--delay) backwards;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ==================================
   MOBILE RESPONSIVENESS
=================================== */
@media (max-width: 768px) {
  .app-container {
    padding: 30px 0;
  }
  
  .main-title {
    font-size: 3rem;
  }
  
  .subtitle {
    font-size: 1.1rem;
    padding: 0 10px;
    margin-bottom: 30px;
  }

  .actions {
    flex-direction: column;
    gap: 15px;
    margin-bottom: 50px;
  }

  .btn {
    width: 100%;
    padding: 15px;
  }

  .blob {
    display: none; /* Hide expensive blobs on mobile */
  }

  .features-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }

  .feature-card {
    padding: 40px 20px;
  }
}
</style>