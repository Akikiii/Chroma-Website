import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Dashboard from '../views/Dashboard.vue';
import ColorMixer from '../views/ColorMixer.vue';
import HexIdentifier from '../views/HexIdentifier.vue';
import Pricing from '../views/Pricing.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/dashboard', name: 'Dashboard', component: Dashboard },
  { path: '/color-mixer', name: 'ColorMixer', component: ColorMixer },
  { path: '/hex-identifier', name: 'HexIdentifier', component: HexIdentifier },
  { path: '/pricing', name: 'Pricing', component: Pricing },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;