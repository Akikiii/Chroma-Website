<template>
  <div class="auth-container view-padding">
    <div class="auth-card animate-card">
      <div class="auth-header">
        <h1>Create Account</h1>
        <p>Join Chroma and unlock your creative potential.</p>
      </div>
      
      <form @submit.prevent="handleRegister" class="auth-form">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" placeholder="John Doe" required />
        </div>

        <div class="form-group">
          <label>Email Address</label>
          <input type="email" placeholder="you@example.com" required />
        </div>
        
        <div class="form-group">
          <label>Password</label>
          <input type="password" placeholder="••••••••" required />
        </div>
        
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
      
      <div class="auth-footer">
        <p>Already have an account? <router-link to="/login" class="auth-link">Login</router-link></p>
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
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
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

.btn {
  width: 100%;
  padding: 16px;
  border-radius: 12px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-top: 15px;
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