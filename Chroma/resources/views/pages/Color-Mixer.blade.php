@extends('layouts.app', ['page' => __('Color Mixer'), 'pageSlug' => 'Color_mixer'])
 @section('content')
<!DOCTYPE html>
<html>
<style>
 .container {
  background-image: url("storage/uploads/bg2.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size:cover;
  padding: 20px;
  border-radius: 10px;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  color: #666;
}

.card-box {
  background-color: #fce4ec;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  color: #666;
  position: relative;
  left: 25%;
}

.card-header {
  background: linear-gradient(to bottom, #e6e6ff, #b3b3ff);
  padding: 10px;
  border-radius: 5px 5px 0 0;
  width: 100%;
}

.card-title {
  font-size: 24px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 0;
  color: #663399;
  padding: 10px;
  border-radius: 5px;
  width: max-content;
  margin: 0 auto;
  display: block;
}

.dropdown {
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 10px;
}

.box {
  background: linear-gradient(to bottom, #b3b3ff, #4CAF50);
  padding: 10px;
  border-radius: 5px;
  width: 150px;
  position:absolute;
  margin-left: -73px;
  text-align: center;
}

.bold {
  color: white;
  font-weight: bold;
  margin-bottom: 10px;
}

#mix-button {
  display: inline-block;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  border-radius: 5px;
  margin-top: 10px;
}

#clear-button {
  display: inline-block;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  border-radius: 5px;
  margin-top: 10px;
}

.button-container {
  position: relative;
  display: inline-block;
}

.palette-button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  margin-bottom: 10px;
  margin-top: 20px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  border-radius: 5px;
}

.dropdown-menu, .dropdown-medium{
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 5px;
  margin-top: 5px;
}

.dropdown-item {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  border-radius: 5px;
}

.dropdown-item:hover {
  background-color: #f1f1f1;
}


</style>

<head>
  <title>Color Mixer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card-box">
          <div class="card-header">
            <h4 class="card-title" style="text-align: center;">Mix n Match!</h4>
            <h6 class= "card-statement" style="text-align: center;"> Mix and match your colors to find its nearest Art ranger color!</h6>
          </div>
          <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
            <div class="button-container" style="margin-right: 30px;">
              <button class="palette-button" type="button" id="paletteDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Palette <span id="selectedPalette1">(Universal Colors)</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="paletteDropdown1">
                <a class="dropdown-item" href="#" onclick="showUniversalColors()">Universal colors</a>
                <a class="dropdown-item" href="#" onclick="showArtRangersPalette()">Art Rangers Palette</a>
              </div>
            </div>

            <div class="button-container" style="margin-right: 30px;">
              <button class="palette-button" type="button" id="paletteDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Palette <span id="selectedPalette2">(Type of Medium)</span>
              </button>
              <div class="dropdown-menu" style="position: absolute; left: 50%; transform: translateX(-50%); top: 100%;" id="artRangersSubmenu">
                <a class="dropdown-item" href="#" onclick="showBasicColors()">Basic Colors</a>
                <a class="dropdown-item" href="#" onclick="showPastelColors()">Pastel Colors</a>
                <a class="dropdown-item" href="#" onclick="showMetallicColors()">Metallic Colors</a>
                <a class="dropdown-item" href="#" onclick="showGlitterColors()">Glitter Colors</a>
                <a class="dropdown-item" href="#" onclick="showNeonColors()">Neon Colors</a>
              </div>
            </div>

          <div class="dropdown">
          <button class="palette-button" type="button" id="spoonMeasurementDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Spoon Measurement <span id="selectedSpoonMeasurement">(1 tbsp)</span>
          </button>
          <div class="dropdown-menu" aria-labelledby="spoonMeasurementDropdown">
            <a class="dropdown-item" href="#" onclick="setSpoonMeasurement(0.03825);">1/4 tsp</a>
            <a class="dropdown-item" href="#" onclick="setSpoonMeasurement(0.0765);">1/2 tsp</a>
            <a class="dropdown-item" href="#" onclick="setSpoonMeasurement(0.152999);">1 tsp</a>
            <a class="dropdown-item" href="#" onclick="setSpoonMeasurement(0.114749);">1/4 tbsp</a>
            <a class="dropdown-item" href="#" onclick="setSpoonMeasurement(0.229499);">1/2 tbsp</a>
            <a class="dropdown-item" href="#" onclick="setSpoonMeasurement(0.458997);">1 tbsp</a>
          </div>
        </div>
    </div>
          <div class="row mt-3" id="color-choices" style="display: flex; flex-wrap: nowrap; display: flex; flex-direction: row; justify-content: center; margin-left:20px;">
            <div class="col-10" id="universal-colors">
              <div class="row justify-content-evenly">
                  <div class="col-1.5">
                      <button class="button" style="background-color: white; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: yellow; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: orange; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: green; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: blue; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: brown; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: black; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: red; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
              </div>
            </div>
            <div class="col-10" id="art-rangers-palette-other" style="display: none;">
              <div class="row justify-content-evenly">
                  <div class="col-1.5">
                      <button class="button" style="background-color: #F3F4F7; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: #8A3324; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: #FF00FF; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: #000f89; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: #4D8C57; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: #FFA500; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: #fdfd96; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1.5">
                      <button class="button" style="background-color: black ; width:65px; height:65px; border-radius: 50%;"></button>
                  </div>
                </div>
            </div>
          </div>
          <div class="card-body" style="display: flex; flex-direction: row; justify-content: center;">
            <div id="color-box" style="width: 250px; height: 250px; border: 2px solid black; border-radius: 50%; position: relative; display: inline-block; padding: 10px;">
        
            </div>
            <div id="color-box-sim" style="width: 250px; height: 250px; border: 2px solid black; border-radius: 50%; position: relative; display: inline-block; margin-left: 180px; padding: 10px;">
             
            </div>
          </div>
          <div class="card-body">
            <div style="text-align: center;">
            <div id="color-code" style="text-align:left; font-size: 1.2em; color: #333; font-weight: bold; padding-left: 10px;"></div>
            </div>
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
              <div class="box">
                <p class="bold">Press me to Mix it!</p>
                <label for="hexCodeInput">Enter Hex Code:</label>
                <input type="text" class="form-control" id="hexCodeInput" placeholder="#ffffff">
                <button id="mix-button" class="btn btn-primary">Mix It!</button>
                <button id="clear-button" class="btn btn-primary">Clear!</button>
              </div>
            </div>
            <div class="card-body">
              <div style="text-align: center;">
              <div id="color-code-sim" style="text-align:right; font-size: 1.2em; color: #333; font-weight: bold; padding-left: 10px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.3.0/chroma.min.js"></script>
  <script>
    const colorButtons = document.querySelectorAll('button[style]');
    const colorBox = document.getElementById('color-box');
    const colorCode = document.getElementById('color-code');
    let colorNameDiv = null;
    const colorBoxclone = document.getElementById('color-box');
    const colorCodeClone = document.getElementById('color-code');
    const colorBoxSim = document.getElementById('color-box-sim');
    const colorCodeSim = document.getElementById('color-code-sim');
    const hexCodeInput = document.getElementById('hexCodeInput');

    let colorsList = [];
    let numColors = 0;
    let colorsWeight = []; 



    window.onload = function() {
      const urlString = window.location.href;
      const last6Chars = urlString.slice(-6);
      console.log("Entire URL:", urlString);
      console.log("Last 6 characters:", last6Chars);
      colorBox.style.backgroundColor = '#' + last6Chars;
      colorCode.textContent = '#' + last6Chars;
};
      const inputHexCode = hexCodeInput;

    hexCodeInput.addEventListener('keydown', function(event) {
      if (event.key === 'Enter') {
        colorBox.style.backgroundColor = '#' + inputHexCode.value;
        colorCode.textContent = '#' + inputHexCode.value;
      }
    });


    colorButtons.forEach(button => {
      button.addEventListener('click', () => {
        if (numColors < 6) {
          colorsWeight.push(spoonMeasurement);
          // Set the color
          colorsList[numColors] = button.style.backgroundColor;
          colorBox.style.backgroundColor = colorsList[numColors];
          colorCode.textContent = chroma(colorsList[numColors]).hex();
          
          button.classList.add('active');
          if (!colorNameDiv) {
            colorNameDiv = document.createElement('div');
            colorNameDiv.style.fontSize = '18px';
            colorNameDiv.style.fontWeight = 'bold';
            colorNameDiv.style.marginTop = '10px';
          }
          numColors++;
          console.log(colorsList + " This is the Color List");
          console.log(colorsWeight + " This is weight");
        }
      });
    });

    const mixButton = document.getElementById('mix-button');

    mixButton.addEventListener('click', () => {
      mixColors();
      const rgb = chroma(colorBox.style.backgroundColor).rgb();
      const nearestColorName = findNearestColor(rgb);
      document.getElementById('color-code-sim').innerHTML = nearestColorName;
      colorCodeSim.textContent = nearestColorName;
    });
 
    function mixColors() {
      let mixedColor = chroma.average(colorsList, 'lch', colorsWeight);
      colorBox.style.backgroundColor = mixedColor.css();  
      colorCode.textContent = mixedColor.hex();
    }

    // Set the initial color
    const initialColor = colorButtons[0].style.backgroundColor;
    colorBox.style.backgroundColor = initialColor;
    colorCode.textContent = chroma(initialColor).hex();


    let spoonMeasurement = 0.458997; 

    function setSpoonMeasurement(measurement) {
      console.log(measurement);
      spoonMeasurement = measurement;
      if(measurement == 0.03825){
        document.getElementById('selectedSpoonMeasurement').textContent = '(1/4 tsp)';
      } else if(measurement == 0.0765){
        document.getElementById('selectedSpoonMeasurement').textContent = '(1/2 tsp)';
      } else if(measurement == 0.152999){
        document.getElementById('selectedSpoonMeasurement').textContent = '(1 tsp)';
      } else if(measurement == 0.114749){
        document. getElementById('selectedSpoonMeasurement').textContent = '(1/4 tbsp)';
      } else if(measurement == 0.229499){
        document.getElementById('selectedSpoonMeasurement').textContent = '(1/2 tbsp)';
      } else if(measurement == 0.458997){
        document.getElementById('selectedSpoonMeasurement').textContent = '(1 tbsp)';
      }
    }
    
    document.querySelector("#paletteDropdown2").style.display = "none";


    function showUniversalColors() {
    document.getElementById('universal-colors').style.display = 'block';
    document.getElementById('art-rangers-palette-other').style.display = 'none';
    document.getElementById('selectedPalette1').textContent = '(Universal colors)';
    document.querySelector("#paletteDropdown2").style.display = "none";
  }

  function showArtRangersPalette() {
    document.getElementById('universal-colors').style.display = 'none';
    document.getElementById('art-rangers-palette-other').style.display = 'block';
    document.getElementById('selectedPalette1').textContent = '(Art Rangers Palette)';
    document.querySelector("#paletteDropdown2").style.display = "block";
  }
    const clearButton = document.getElementById('clear-button');

    
        clearButton.addEventListener('click', () => {
          colorBox.style.backgroundColor = '';
          colorCode.textContent = '';
          if (colorNameDiv) {
            colorNameDiv.textContent = '';
          }
          colorButtons.forEach(button => {
            button.classList.remove('active');
          });
          numColors = 0;
          colorsWeight = [];
          colorsList = [];
        });
    const colorNames = [
      'Pastel Orange',
      'Pastel Red',
      'Pink',
      'Neon Pink',
      'Neon Orange',
      'Orange',
      'Brilliant Red',
      'Magenta',
      'Titanium White',
      'Pastel Yellow',
      'Yellow Pale',
      'Lemon Yellow',
      'Pearlescent Yellow',
      'Neon Yellow',
      'Gold',
      'Yellow Ochre',
      'Viridian',
      'Grass Green',
      'Neon Green',
      'Green Mid',
      'Pastel Green',
      'Neon Blue',
      'Ultramarine Blue',
      'Phthalo Blue',
      'Pearlescent Blue',
      'Pastel Blue',
      'Pastel Pink',
      'Pastel Purple',
      'Purple',
      'Neon Purple',
      'Rose Red',
      'Pastel Grey',
      'Silver',
      'Burnt Sienna',
      'Burnt Umber',
      'Black',
      'Pearlescent Green',
      'Pearlescent Rose',
      'Pearlescent Red',
      'Pearlescent Purple',
      'Glitter Crystal',
      'Glitter Silver',
      'Glitter Blue',
      'Glitter Gold',
      'Glitter Green',
      'Glitter Pink',
      'Glitter Red',
      'Glitter Purple',
    ];
    const colors = [
      [255, 179, 71], // Pastel Orange
      [255, 105, 97], // Pastel Red
      [255, 192, 203], // Pink
      [255, 110, 199], // Neon Pink
      [255, 163, 67], // Neon Orange
      [255, 165, 0], // Orange
      [255, 0, 0], // Brilliant Red
      [255, 0, 255], // Magenta
      [255, 255, 255], // Titanium White
      [253, 253, 150], // Pastel Yellow
      [250, 250, 210], // Yellow Pale
      [255, 244, 79], // Lemon Yellow
      [250, 218, 94], // Pearlescent Yellow
      [255, 255, 0], // Neon Yellow
      [255, 215, 0], // Gold
      [204, 119, 34], // Yellow Ochre
      [64, 130, 109], // Viridian
      [76, 175, 80], // Grass Green
      [57, 255, 20], // Neon Green
      [77, 140, 87], // Green Mid
      [119, 221, 119], // Pastel Green
      [77, 77, 255], // Neon Blue
      [18, 10, 143], // Ultramarine Blue
      [0, 15, 137], // Phthalo Blue
      [63, 110, 170], // Pearlescent Blue
      [174, 214, 241], // Pastel Blue
      [255, 209, 220], // Pastel Pink
      [177, 156, 217], // Pastel Purple
      [128, 0, 128], // Purple
      [191, 0, 255], // Neon Purple
      [194, 30, 86], // Rose Red
      [207, 207, 196], // Pastel Grey
      [192, 192, 192], // Silver
      [233, 116, 81], // Burnt Sienna
      [138, 51, 36], // Burnt Umber
      [0, 0, 0], // Black
      [0, 166, 147], // Pearlescent Green
      [227, 138, 174], // Pearlescent Rose
      [170, 64, 105], // Pearlescent Red
      [147, 112, 219], // Pearlescent Purple
      [230, 232, 250], // Glitter Crystal
      [206, 207, 210], // Glitter Silver
      [0, 0, 255], // Glitter Blue
      [223, 183, 34], // Glitter Gold
      [0, 255, 0], // Glitter Green
      [255, 105, 180], // Glitter Pink
      [241, 84, 97], // Glitter Red
      [142, 63, 226], // Glitter Purple
    ];
    function findNearestColor(rgb) {
      console.log(rgb);
      let nearestColor = null;
      let nearestDistance = Infinity;

      for (let i = 0; i < colors.length; i++) {
        const distance = Math.sqrt(
          Math.pow(colors[i][0] - rgb[0], 2) +
          Math.pow(colors[i][1] - rgb[1], 2) +
          Math.pow(colors[i][2] - rgb[2], 2)
        );

        if (distance < nearestDistance) {
          nearestColor = colorNames[i];
          nearestDistance = distance;
          colorBoxSim.style.backgroundColor = `rgb(` + colors[i] + ")";
        }
      }
      return nearestColor;
    }
  </script>
</body>
</html>
  @endsection

