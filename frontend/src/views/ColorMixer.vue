<template>
  <div class="color-mixer-container view-padding">
    <div class="header text-center animate-title">
      <h1><span class="gradient-text">Color Mixer</span></h1>
      <p>Blend two colors together and discover beautiful new shades.</p>
    </div>

    <div class="mixer-card container animate-card">
      <div class="color-inputs">
        <div class="input-group">
          <label>Color 1</label>
          <div class="picker-wrapper">
            <input type="color" v-model="color1" class="color-picker" />
          </div>
          <span class="hex-value">{{ color1.toUpperCase() }}</span>
        </div>
        
        <div class="mix-icon">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
        </div>
        
        <div class="input-group">
          <label>Color 2</label>
          <div class="picker-wrapper">
            <input type="color" v-model="color2" class="color-picker" />
          </div>
          <span class="hex-value">{{ color2.toUpperCase() }}</span>
        </div>
      </div>
      
      <div class="result-section">
        <label>Resulting Blend</label>
        <div class="result-display-wrapper" :style="{ boxShadow: `0 10px 40px ${mixedColor}80` }">
          <div class="result-display" :style="{ backgroundColor: mixedColor }"></div>
        </div>
        <div class="result-details">
          <span class="hex-value result-hex">{{ mixedColor.toUpperCase() }}</span>
          <button class="copy-btn" @click="copyToClipboard(mixedColor)" :class="{ copied: isCopied }">
            {{ isCopied ? 'Copied!' : 'Copy Hex' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const color1 = ref('#FF0055');
const color2 = ref('#0055FF');
const isCopied = ref(false);

const hexToRgb = (hex) => {
  const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
  return result ? {
    r: parseInt(result[1], 16),
    g: parseInt(result[2], 16),
    b: parseInt(result[3], 16)
  } : null;
};

const rgbToHex = (r, g, b) => {
  return "#" + (1 << 24 | r << 16 | g << 8 | b).toString(16).slice(1);
};

const mixedColor = computed(() => {
  const c1 = hexToRgb(color1.value);
  const c2 = hexToRgb(color2.value);
  if(!c1 || !c2) return '#000000';
  
  const r = Math.round((c1.r + c2.r) / 2);
  const g = Math.round((c1.g + c2.g) / 2);
  const b = Math.round((c1.b + c2.b) / 2);
  
  return rgbToHex(r, g, b);
});

const copyToClipboard = async (text) => {
  try {
    await navigator.clipboard.writeText(text);
    isCopied.value = true;
    setTimeout(() => { isCopied.value = false; }, 2000);
  } catch (err) {
    console.error('Failed to copy: ', err);
  }
};
</script>

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

.mixer-card {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-radius: 30px;
  padding: 60px 40px;
  max-width: 900px;
  margin: 0 auto;
  border: 1px solid rgba(255, 255, 255, 0.08);
  box-shadow: 0 20px 50px rgba(0,0,0,0.3), inset 0 0 0 1px rgba(255,255,255,0.05);
}

.color-inputs {
  display: flex;
  align-items: center;
  justify-content: space-around;
  margin-bottom: 50px;
}

.input-group {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

.input-group label {
  font-weight: 600;
  font-size: 1.3rem;
  color: #fff;
}

.picker-wrapper {
  padding: 5px;
  background: rgba(255,255,255,0.05);
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,0.1);
  transition: transform 0.3s ease;
}

.picker-wrapper:hover {
  transform: scale(1.05);
  border-color: rgba(255,255,255,0.3);
}

.color-picker {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 120px;
  height: 120px;
  background-color: transparent;
  border: none;
  cursor: pointer;
  border-radius: 50%;
  overflow: hidden;
  padding: 0;
}

.color-picker::-webkit-color-swatch-wrapper {
  padding: 0;
}

.color-picker::-webkit-color-swatch {
  border-radius: 50%;
  border: none;
}

.color-picker::-moz-color-swatch {
  border-radius: 50%;
  border: none;
}

.hex-value {
  background: rgba(0,0,0,0.4);
  padding: 8px 20px;
  border-radius: 20px;
  font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
  font-size: 1.2rem;
  letter-spacing: 1px;
  border: 1px solid rgba(255,255,255,0.05);
}

.mix-icon {
  color: #a0a0b0;
  background: rgba(255,255,255,0.05);
  padding: 20px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: inset 0 2px 5px rgba(0,0,0,0.2);
}

.result-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 25px;
  padding-top: 50px;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.result-section label {
  font-size: 1.5rem;
  font-weight: 700;
  color: #fff;
}

.result-display-wrapper {
  padding: 8px;
  background: rgba(255,255,255,0.05);
  border-radius: 50%;
  transition: box-shadow 0.4s ease;
}

.result-display {
  width: 180px;
  height: 180px;
  border-radius: 50%;
  border: 4px solid rgba(255,255,255,0.2);
}

.result-details {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-top: 10px;
}

.result-hex {
  font-size: 1.6rem;
  font-weight: bold;
  color: #fff;
}

.copy-btn {
  background: transparent;
  color: #e14eca;
  border: 1px solid #e14eca;
  padding: 8px 16px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.3s ease;
}

.copy-btn:hover {
  background: rgba(225, 78, 202, 0.1);
}

.copy-btn.copied {
  background: #e14eca;
  color: #fff;
}

/* Entrance Animations */
.animate-title { animation: fadeInUp 0.8s ease backwards; }
.animate-card { animation: fadeInUp 0.8s ease 0.2s backwards; }

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 768px) {
  .color-inputs {
    flex-direction: column;
    gap: 40px;
  }
  
  .mix-icon {
    transform: rotate(90deg);
    padding: 15px;
  }
  
  .header h1 { font-size: 2.5rem; }
  .mixer-card { padding: 40px 20px; }
  .result-details { flex-direction: column; }
}
</style>