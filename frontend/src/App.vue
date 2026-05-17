<script setup>
import { ref } from 'vue';

const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
  isMenuOpen.value = false;
};
</script>

<template>
  <div id="app">
    <nav class="navbar">
      <div class="nav-container">
        <router-link to="/" class="nav-logo" @click="closeMenu">Chroma</router-link>
        
        <!-- Hamburger Icon for Mobile -->
        <div class="hamburger" :class="{ 'is-active': isMenuOpen }" @click="toggleMenu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>

        <div class="nav-menu" :class="{ 'is-open': isMenuOpen }">
          <ul class="nav-links">
            <li><router-link to="/" @click="closeMenu">Home</router-link></li>
            <li><router-link to="/color-mixer" @click="closeMenu">Mixer</router-link></li>
            <li><router-link to="/hex-identifier" @click="closeMenu">Hex ID</router-link></li>
            <li><router-link to="/dashboard" @click="closeMenu">Dashboard</router-link></li>
            <li><router-link to="/pricing" @click="closeMenu">Pricing</router-link></li>
          </ul>
          <div class="auth-links">
            <router-link to="/login" class="btn-login router-btn" @click="closeMenu">Login</router-link>
            <router-link to="/register" class="btn-signup router-btn" @click="closeMenu">Sign Up</router-link>
          </div>
        </div>
      </div>
    </nav>
    <main class="main-content">
      <router-view />
    </main>
  </div>
</template>

<style scoped>
#app {
  width: 100%;
}

.navbar {
  display: flex;
  align-items: center;
  height: 80px;
  background: rgba(15, 12, 41, 0.6);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  padding: 0 20px;
  position: sticky;
  top: 0;
  z-index: 1000;
  width: 100%;
  box-sizing: border-box;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
}

.nav-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

.nav-logo {
  font-size: 1.8rem;
  font-weight: 800;
  color: #fff;
  text-decoration: none;
  letter-spacing: 1px;
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transition: all 0.3s;
  z-index: 1001; /* Keep above mobile menu */
}

.nav-menu {
  display: flex;
  align-items: center;
  flex-grow: 1;
  justify-content: flex-end;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 35px;
  margin: 0 35px 0 0;
  padding: 0;
}

.nav-links a {
  text-decoration: none;
  color: #b0b0c0;
  font-weight: 500;
  transition: all 0.3s ease;
  font-size: 1.05rem;
  position: relative;
}

.nav-links a::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -4px;
  left: 0;
  background-color: #e14eca;
  transition: width 0.3s ease;
}

.nav-links a:hover::after, .nav-links a.router-link-active::after {
  width: 100%;
}

.nav-links a:hover, .nav-links a.router-link-active {
  color: #fff;
}

.auth-links {
  display: flex;
  gap: 15px;
}

.btn-login, .btn-signup {
  padding: 10px 24px;
  border-radius: 25px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  font-family: inherit;
  font-size: 1rem;
  text-decoration: none;
  display: inline-block;
}

.btn-login {
  background: rgba(255, 255, 255, 0.05);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.btn-login:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

.btn-signup {
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  color: #fff;
  border: none;
}

.btn-signup:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(225, 78, 202, 0.5);
}

.hamburger {
  display: none;
  cursor: pointer;
  z-index: 1001; /* Keep above mobile menu */
}

.bar {
  display: block;
  width: 25px;
  height: 3px;
  margin: 5px auto;
  transition: all 0.3s ease-in-out;
  background-color: #fff;
  border-radius: 3px;
}

.main-content {
  min-height: calc(100vh - 80px);
}

/* ==================================
   MOBILE RESPONSIVENESS
=================================== */
@media (max-width: 900px) {
  .hamburger {
    display: block;
  }

  .hamburger.is-active .bar:nth-child(2) {
    opacity: 0;
  }

  .hamburger.is-active .bar:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
  }

  .hamburger.is-active .bar:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
  }

  .nav-menu {
    position: fixed;
    left: -100%;
    top: 0;
    flex-direction: column;
    background: rgba(15, 12, 41, 0.98);
    backdrop-filter: blur(20px);
    width: 100%;
    height: 100vh;
    justify-content: center;
    align-items: center;
    transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    padding-top: 80px;
    z-index: 1000;
  }

  .nav-menu.is-open {
    left: 0;
  }

  .nav-links {
    flex-direction: column;
    margin: 0;
    gap: 30px;
    align-items: center;
  }

  .nav-links a {
    font-size: 1.5rem;
  }

  .auth-links {
    flex-direction: column;
    margin-top: 40px;
    width: 80%;
    max-width: 300px;
  }

  .btn-login, .btn-signup {
    width: 100%;
    padding: 15px;
    font-size: 1.1rem;
  }
}
</style>