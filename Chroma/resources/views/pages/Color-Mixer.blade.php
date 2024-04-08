  @extends('layouts.app', ['page' => __('Color Mixer DEMO(LIMITED TO 3 ONLY & Different) Refresh after mixing 3 colors'), 'pageSlug' => 'tables'])

  @section('content')
  <!DOCTYPE html>
<html>
<head>
  <title>Color Mixer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Mix n Match!</h4>
          </div>

          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Palette
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" onclick="showUniversalColors()">Universal colors</a>
                <a class="dropdown-item" href="#" onclick="showArtRangersPalette()">Art Rangers Palette</a>
              </div>
            </div>

          <div class="row mt-3" id="color-choices" style="display: flex; flex-wrap: wrap;">
            <div class="col-12" id="universal-colors">
              <div class="row justify-content-evenly">
                  <div class="col-1">
                      <button class="button" style="background-color: white; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: yellow; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: orange; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: green; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: blue; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: brown; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: black; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: red; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
              </div>
            </div>
            <div class="col-12" id="art-rangers-palette-other" style="display: none;">
              <div class="row justify-content-evenly">
                  <div class="col-1">
                      <button class="button" style="background-color: #F3F4F7; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: #8A3324; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: #FF00FF; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: #000f89; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: #4D8C57; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: #FFA500; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: #fdfd96; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                  <div class="col-1">
                      <button class="button" style="background-color: black ; width: 75px; height: 75px; border-radius: 50%;"></button>
                  </div>
                </div>
            </div>
          </div>

          <div class="card-body">
            <div id="color-box" style="width: 300px; height: 300px; border: 1px solid black; border-radius: 50%;"></div>
            <div id="color-code"></div>
    
            <div class="card-body">
            <div id="color-box-sim" style="width: 300px; height: 300px; border: 1px solid black; border-radius: 50%;"></div>
            <div id="color-code-sim"></div>
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

    let color1, color2, color3;
    let numColors = 0;

    colorButtons.forEach(button => {
      button.addEventListener('click', () => {
        if (!color1) {
          // Set the first color
          color1 = button.style.backgroundColor;
          colorBox.style.backgroundColor = color1;
          colorCode.textContent = chroma(color1).hex();
          button.classList.add('active');
          if (!colorNameDiv) {
            colorNameDiv = document.createElement('div');
            colorNameDiv.style.fontSize = '18px';
            colorNameDiv.style.fontWeight = 'bold';
            colorNameDiv.style.marginTop = '10px';
            colorBox.parentElement.insertBefore(colorNameDiv, colorCode);
          }
          numColors++;
        } else if (numColors < 3) {
          // Set the second or third color
          if (!color2) {
            color2 = button.style.backgroundColor;
            mixTwoColors();
          } else if (!color3) {
            color3 = button.style.backgroundColor;
            mixThreeColors();
          }
          button.classList.add('active');
          button.previousElementSibling.classList.add('active');
          numColors++;
        }
      });
    });

    function mixTwoColors() {
      const mixedColor = chroma.mix(color1, color2, 0.50);
      colorBox.style.backgroundColor = mixedColor.css();
      colorCode.textContent = mixedColor.hex();
    }

    function mixThreeColors() {
      const mixedColor12 = chroma.mix(color1, color2, 0.50);
      const mixedColor = chroma.mix(mixedColor12, color3, 0.50);
      colorBox.style.backgroundColor = mixedColor.css();
      colorCode.textContent = mixedColor.hex();
    }

    // Set the initial color
    const initialColor = colorButtons[0].style.backgroundColor;
    colorBox.style.backgroundColor = initialColor;
    colorCode.textContent = chroma(initialColor).hex();

    function showUniversalColors() {
      document.getElementById('universal-colors').style.display = 'block';
      document.getElementById('art-rangers-palette-other').style.display = 'none';
    }

    function showArtRangersPalette() {
      document.getElementById('universal-colors').style.display = 'none';
      document.getElementById('art-rangers-palette-other').style.display = 'block';

      // Get the RGB values of the current color
      const rgb = chroma(colorBox.style.backgroundColor).rgb();

      // Find the nearest color from your list
      const nearestColorName = findNearestColor(rgb);

      // Display the nearest color in the color-box-sim element
      colorBoxSim.style.backgroundColor = `rgb(${colors[colors.indexOf(nearestColorName)]})`;
      console.log( `rgb(${colors[colors.indexOf(nearestColorName)]})`);
      colorCodeSim.textContent = nearestColorName;
    }

    colorBox.addEventListener('click', () => {
      color1 = null;
      color2 = null;
      color3 = null;
      colorBox.style.backgroundColor = '';
      colorCode.textContent = '';
      if (colorNameDiv) {
        colorNameDiv.textContent = '';
      }
      colorButtons.forEach(button => {
        button.classList.remove('active');
      });
      numColors = 0;
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
        }
      }

      return nearestColor;
    }
  </script>
</body>
</html>
  @endsection

