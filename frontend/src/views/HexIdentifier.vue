<template>
  <div class="hex-identifier-container view-padding">
    <div class="header text-center">
      <h1>Hex Identifier</h1>
      <p>Identify the exact core colors used in any image you upload.</p>
    </div>

    <div class="identifier-card container">
      <div class="upload-section" @click="triggerUpload">
        <input type="file" ref="fileInput" @change="handleImage" accept="image/*" class="hidden-input" />
        <div v-if="!imageSrc" class="upload-placeholder">
          <div class="icon">📤</div>
          <p>Click to upload or drag an image here</p>
        </div>
        <img v-else :src="imageSrc" class="uploaded-image" />
      </div>

      <div class="results-section" v-if="imageSrc">
        <button class="btn btn-primary" @click="extractColors">Extract Colors</button>
        
        <div class="extracted-colors" v-if="extractedColors.length > 0">
          <div class="color-swatch-container" v-for="color in extractedColors" :key="color.hex">
            <div class="color-swatch" :style="{ backgroundColor: color.hex }"></div>
            <span class="hex-label">{{ color.hex }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const fileInput = ref(null);
const imageSrc = ref(null);
const extractedColors = ref([]);

const triggerUpload = () => {
  fileInput.value.click();
};

const handleImage = (event) => {
  const file = event.target.files[0];
  if (file) {
    imageSrc.value = URL.createObjectURL(file);
    extractedColors.value = []; // reset
  }
};

const extractColors = () => {
  // Mocking color extraction since we are doing frontend only right now.
  // Normally you'd draw the image to a canvas and get the ImageData, or send to backend.
  extractedColors.value = [
    { hex: '#1E1E2F' },
    { hex: '#E14ECA' },
    { hex: '#D13DB9' },
    { hex: '#8E44AD' },
    { hex: '#2A1D44' }
  ];
};
</script>

<style scoped>
.view-padding {
  padding: 40px 20px;
  color: #fff;
}
.header {
  margin-bottom: 50px;
}
.header h1 {
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 10px;
}
.header p {
  color: #a0a0b0;
  font-size: 1.2rem;
}
.identifier-card {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 20px;
  padding: 40px;
  max-width: 800px;
  margin: 0 auto;
  border: 1px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.upload-section {
  border: 2px dashed rgba(255, 255, 255, 0.3);
  border-radius: 15px;
  min-height: 250px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s;
  overflow: hidden;
  margin-bottom: 30px;
}

.upload-section:hover {
  border-color: #e14eca;
  background: rgba(225, 78, 202, 0.05);
}

.hidden-input {
  display: none;
}

.upload-placeholder {
  text-align: center;
  color: #a0a0b0;
}

.upload-placeholder .icon {
  font-size: 4rem;
  margin-bottom: 15px;
}

.uploaded-image {
  max-width: 100%;
  max-height: 400px;
  object-fit: contain;
}

.results-section {
  text-align: center;
}

.btn-primary {
  background-color: #e14eca;
  color: #fff;
  border: none;
  padding: 12px 30px;
  border-radius: 30px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  margin-bottom: 30px;
  transition: background 0.3s;
}

.btn-primary:hover {
  background-color: #d13db9;
}

.extracted-colors {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.color-swatch-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.color-swatch {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border: 3px solid rgba(255,255,255,0.2);
  box-shadow: 0 4px 10px rgba(0,0,0,0.5);
}

.hex-label {
  background: rgba(0,0,0,0.5);
  padding: 4px 10px;
  border-radius: 12px;
  font-size: 0.9rem;
  font-family: monospace;
}

/* ==================================
   MOBILE RESPONSIVENESS
=================================== */
@media (max-width: 768px) {
  .header h1 {
    font-size: 2.5rem;
  }
  
  .identifier-card {
    padding: 30px 15px;
  }
  
  .upload-placeholder .icon {
    font-size: 3rem;
  }
  
  .btn-primary {
    width: 100%;
  }
}
</style>