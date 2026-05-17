<template>
  <div class="auth-container view-padding">
    <div class="auth-card animate-card">
      <div class="auth-header">
        <h1>Welcome Back</h1>
        <p>Login to manage your vibrant images.</p>
      </div>
      
      <form @submit.prevent="handleLogin" class="auth-form">
        <div class="form-group">
          <label>Email Address</label>
          <input type="email" placeholder="you@example.com" required />
        </div>
        
        <div class="form-group">
          <label>Password</label>
          <input type="password" placeholder="••••••••" required />
        </div>
        
        <div class="form-options">
          <label class="remember-me">
            <input type="checkbox" /> Remember me
          </label>
          <a href="#" class="forgot-password">Forgot password?</a>
        </div>
        
        <button type="submit" class="btn btn-primary">Sign In</button>
      </form>
      
      <div class="auth-footer">
        <p>Don't have an account? <router-link to="/register" class="auth-link">Sign Up</router-link></p>
      </div>
    </div>
  </div>
</template>

<style scoped>
.view-padding {
  padding: 60px 20px;
  min-height: calc(100vh - 80px);
  display: flex;
  align-items: center;
  justify-content: center;
}

.auth-card {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-radius: 25px;
  padding: 50px;
  width: 100%;
  max-width: 450px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  box-shadow: 0 20px 50px rgba(0,0,0,0.3);
}

.auth-header {
  text-align: center;
  margin-bottom: 40px;
}

.auth-header h1 {
  font-size: 2.2rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 10px;
}

.auth-header p {
  color: #a0a0b0;
  font-size: 1.05rem;
}

.auth-form {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.form-group label {
  color: #fff;
  font-weight: 500;
  font-size: 0.95rem;
}

.form-group input {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  padding: 15px 20px;
  border-radius: 12px;
  color: #fff;
  font-size: 1rem;
  font-family: inherit;
  transition: all 0.3s ease;
}

.form-group input::placeholder {
  color: #606070;
}

.form-group input:focus {
  outline: none;
  border-color: #e14eca;
  background: rgba(225, 78, 202, 0.05);
  box-shadow: 0 0 0 4px rgba(225, 78, 202, 0.1);
}

.form-options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.9rem;
}

.remember-me {
  display: flex;
  align-items: center;
  gap: 8px;
  color: #a0a0b0;
  cursor: pointer;
}

.forgot-password {
  color: #e14eca;
  text-decoration: none;
  transition: color 0.3s ease;
}

.forgot-password:hover {
  text-decoration: underline;
}

.btn {
  width: 100%;
  padding: 16px;
  border-radius: 12px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-top: 10px;
}

.btn-primary {
  background: linear-gradient(135deg, #e14eca 0%, #ba44ad 100%);
  color: #fff;
  border: none;
  box-shadow: 0 8px 20px rgba(225, 78, 202, 0.3);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 25px rgba(225, 78, 202, 0.5);
}

.auth-footer {
  text-align: center;
  margin-top: 30px;
  color: #a0a0b0;
}

.auth-link {
  color: #e14eca;
  text-decoration: none;
  font-weight: 600;
}

.auth-link:hover {
  text-decoration: underline;
}

.animate-card { animation: fadeInUp 0.6s ease backwards; }

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 480px) {
  .auth-card { padding: 40px 25px; }
  .auth-header h1 { font-size: 1.8rem; }
}
</style>