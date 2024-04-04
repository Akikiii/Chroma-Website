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
          displayColorName(chroma(color1).name());
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
      displayColorName(mixedColor.name());
    }

    function mixThreeColors() {
      const mixedColor12 = chroma.mix(color1, color2, 0.50);
      const mixedColor = chroma.mix(mixedColor12, color3, 0.50);
      colorBox.style.backgroundColor = mixedColor.css();
      colorCode.textContent = mixedColor.hex();
      displayColorName(mixedColor.name());
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
}
    // Add event listener to remove the color when clicking on the color box
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

  </script>
</body>
</html>
  @endsection

