<!DOCTYPE html>
<html>
<head>
  <title>Color Checker</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap">
  <style>
#container {
  font-family: Arial;
  width: 1300px;
  padding: 10px;
  border-radius: 10px;
  margin-left: 80px;
  display: flex;
}

.left-side {
  background-color: #48366C;
  width: 50%;
  padding-right: 20px;
}

.right-side {
  background-color: #1E0F2C;
  width: 50%;
  padding-left: 20px;
  box-sizing: border-box;

}

.title-card {
  font-family: Arial;
  font-size: 3.5em;
  letter-spacing: -4px;
  font-weight: bold;
  padding: 10px;
  text-align: Left;
}


#image_input {
  background-color: #f08080;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
  font-weight: bold;
margin-top: 20px;
}

#image_input:hover {
  background-color: #d76363;
}


#display_image {
  width: 450px;
  height: 400px;
  border: 2px solid #f0e6fa;
  background-position: center;
  background-size: contain;
  margin: 20px auto;
  position: relative;
  background-color: white;
  transition: transform 0.25s ease;
  overflow: hidden;
  object-fit: contain;
  touch-action: none;
}

.paint-type{
  font-family: Arial;
  font-weight: bold;
  background-color: #602393;
  color: #9d77c1;
  padding: 10px 10px;
  margin-top: 5px;
  border: none;
  cursor: pointer;
  font-size: 14px;
  border-radius: 20px;
}

#zoom_box {
  bottom:20px;
  width: 550px;
  height: 400px;
  border: 2px solid black;
  background-position: center;
  background-size: contain;
  margin: 20px auto;
  position: relative;
  background-color: white;
  transition: transform 0.25s ease;
  overflow: hidden;
  object-fit: contain;
  touch-action: none;
}

#color_info {
  background-color: #42305a;
  right: 100px;
  width: 590px;
  height: 500px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  padding: 10px;
  box-sizing: border-box;
  display: flex;
  flex-wrap: wrap;
  align-content: space-between;
}

#color_preview {
  width: 250px;
  height: 150px;
  margin-bottom: 10px;
}


#color_hex, #color_rgb {
  font-size: 20px;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
  color:white;
}

#artranger {
  width: 300px;
  height: 200px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  justify-content: center;
  align-items: center;
  padding: 10px;
  box-sizing: border-box;
  display: flex;
  flex-wrap: wrap;
  align-content: space-between;
}

#artranger_preview {
  width: 250px;
  height: 150px;
  margin-bottom: 5px;
}

#artranger_hex, #artranger_rgb {
  color: white;
  font-size: 20px;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
}

h4 {
  width: 100%;
  box-sizing: border-box;
  margin-top: 10px;
  margin-bottom: 10px;
}
#buttons_container {
  justify-content: center;
  position: relative;
}

button {
  margin-bottom: 10px;
}



#pointer {
  position: absolute;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: black;
  transform: translate(-50%, -50%);
}

#hex_finder_button {
  margin-bottom: 10px;
  padding: 10px 20px;
  border: none;
  border-radius: 20px;
  /* Round corners */
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  background-color: #f0e8ff;
  color: #5e1dec;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

#hex_finder_button:hover {
  background-color: #f797b6;
}

#image_input {
  margin-bottom: 10px;
  padding: 10px 20px;
  border: none;
  border-radius: 20px;
  /* Round corners */
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  background-color: #f0e8ff;
  color: #5e1dec;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.chiller-font {
  font-family: 'Pacifico', cursive;
  font-size: 30px;
  color: black;
  text-align: left;
  line-height: 1.5;
}

.dropdown-buttons {
  height:60px;
  display: flex;
  flex-direction: row;
}

.alternative-title {
  font-size: 1.5rem; 
  font-family: Arial, sans-serif;
  font-weight:bolder;
}

.mixture-box {
  border: 2px solid black;
  background-color:plum;
  position:relative;
  right: 250px;
  margin-top: -360px;
  left:300px;
  height:230px;
  width: 230px;
  border-radius: 20px;
}
.mix-reference {
  text-align:center;
  border-radius:20px;
  border: solid black 2px;
  background-color:#f0e6fa;
  color: black;
  font-size: 18px;
  font-weight:bold;
  font-family:Arial;
}

.color-name {
  font-weight: bold;
  font-size: 16px;
  margin-top: 5px;
  color:white;
  margin-left: 20px;
  list-style-type: disc;
}

#color_name1_box, #color_name2_box, #color_name3_box, #color_name4_box {
  font-style:italic;
  margin-left: 6px;
  margin-top: 8px;
  margin-bottom: 10px;
  border-radius: 7px;
  width: 210px;
  height:30px;
}
  </style>
</head>
<body>
  @extends('layouts.app', ['page' => __('Color Checker'), 'pageSlug' => 'maps'])

  @section('content')
  
  <div id="container">
  <div class="left-side">
    <div class="card card-plain" id="content">
      <div class="card-body">
        <canvas id="display_canvas" style="display: none;"></canvas>
        <div id="zoom_box">
          <div id="display_image" draggable="true"></div>
        </div>
        <div id="buttons_container">
      <button id="hex_finder_button">Dropper Tool</button>
      <input type="file" id="image_input" accept="image/png, image/jpg">
    </div>
      </div>
    </div>
  </div>


  <div class="right-side">
    <div class = "dropdown-buttons">
        <div class="dropdown">
          <button class="paint-type" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Brand <span id="selectedSpoonMeasurement">(Universal Color)</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#" >Universal Colors</a>
            <a class="dropdown-item" href="#" >Art Rangers</a>
            <a class="dropdown-item" href="#" >Brand X</a>
            <a class="dropdown-item" href="#" >Krayola</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="paint-type" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Paint Type <span id="selectedSpoonMeasurement">(Basic Colors)</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#" onclick="showBasicColors()">Basic Colors</a>
            <a class="dropdown-item" href="#" onclick="showPastelColors()">Pastel Colors</a>
            <a class="dropdown-item" href="#" onclick="showMetallicColors()">Metallic Colors</a>
            <a class="dropdown-item" href="#" onclick="showGlitterColors()">Glitter Colors</a>
            <a class="dropdown-item" href="#" onclick="showNeonColors()">Neon Colors</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="paint-type" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            + Add to Palette<span id="selectedSpoonMeasurement"></span>
          </button>
        </div>
      </div>
    <div id="color_info">
      <div id="color_preview" style="background-color: Black; border: 3px solid black;"></div>
      <span id="color_hex" contenteditable="true" style="cursor: pointer;">#FFFFFF</span>
      <span id="color_rgb" contenteditable="true" style="cursor: pointer;">RGB(255, 255, 255)</span>
      <h4 class="alternative-title">Alternative:</h4>
      <div id="artranger_preview" style="background-color: white; border: 3px solid black;"></div>
      <span id="artranger_hex" contenteditable="true" style="cursor: pointer;">Nearest Color</span>
      <span id="artranger_rgb" contenteditable="true" style="cursor: pointer;">RGB(255, 255, 255)</span>
      <div class="mixture-box">
        <h3 class="mix-reference">Estimated Mixture:</h3>
        <div id = "color_name1_box"> 
          <div id="color_name1" class="color-name" style = "font-weight:bold; font-family: Arial; color:black;">
            <span id="color-text1" >Test</span>
          </div>
        </div>
        <div id = "color_name2_box" > 
          <div id="color_name2" class="color-name">
            • <span class="color-box" id="color-box2" style = "color: blue;">me</span>
            <span id="color-text2"></span>
          </div>
        </div>
        <div id = "color_name3_box"> 
          <div id="color_name3" class="color-name">
            • <span class="color-box" id="color-box3">out!</span>
            <span id="color-text3"></span>
          </div>
        </div>
        <div id = "color_name4_box"> 
          <div id="color_name4" class="color-name">
            <span class="color-box" id="color-box4"></span>
            <span id="color-text4"></span>
          </div>
        </div>
</div>
      </div>
    </div>
  </div>
</div>
  @endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.3.0/chroma.min.js"></script>
  <script>
    var NearestMixture = "";
    const colorBox = document.querySelectorAll('color_preview');
    const colorBox1 = document.getElementById("color-box1");
    if(colorBox1 == "Green Mid"){
      colorBox1.style.display = "block " ;
    }


    document.addEventListener('DOMContentLoaded', function() {
      const image_input = document.querySelector('#image_input');
      var uploaded_image = "";
      var zoom_level = 0;
      var canvas = document.querySelector('#display_canvas');
      var ctx = canvas.getContext('2d');
      var hex_finder_enabled = false;
      var zoom_box_enabled = false;
      var zoom_box = document.querySelector('#zoom_box');
      var display_image = document.querySelector('#display_image');
      var drag_start_x = 0;
      var drag_start_y = 0;
      var drag_offset_x = 0;
      var drag_offset_y = 0;

      image_input.addEventListener("change", function(){
      const reader = new FileReader();
      reader.addEventListener("load", () => {
        uploaded_image = reader.result;
        display_image.style.backgroundImage = `url(${uploaded_image})`;

     
        var img = new Image();
        img.src = uploaded_image;
        img.onload = function() {
          var aspectRatio = img.width / img.height;

          
          var boxWidth = 450;
          var boxHeight = boxWidth / aspectRatio;
          display_image.style.width = boxWidth + "px";
          display_image.style.height = boxHeight + "px";
          display_image.style.backgroundSize = `cover`;

     
          canvas.width = boxWidth;
          canvas.height = boxHeight;
          ctx.imageSmoothingEnabled = false;
          ctx.drawImage(img, 0, 0, boxWidth, boxHeight);
        };
      });
      reader.readAsDataURL(this.files[0]);
    });

      display_image.addEventListener('dragstart', function(e) {
        drag_start_x = e.clientX;
        drag_start_y = e.clientY;
      });

      display_image.addEventListener('dragover', function(e) {
        e.preventDefault();
      });

      display_image.addEventListener('drop', function(e) {
        e.preventDefault();
        drag_offset_x = e.clientX - drag_start_x;
        drag_offset_y = e.clientY - drag_start_y;
        display_image.style.left = `${drag_offset_x}px`;
        display_image.style.top = `${drag_offset_y}px`;
      });

      display_image.addEventListener('wheel', function(e) {
        console.log('Wheel event triggered. Zoom box enabled:', zoom_box_enabled);
        if (zoom_box_enabled) {
          if (e.deltaY < 0) {
            zoom_level += 0.25;
          } else {
            zoom_level -= 0.25;
          }
          zoom_box.style.transform = `scale(${zoom_level})`;
        }
      });
      display_image.addEventListener('click',function(e) {
        if (hex_finder_enabled) {
          var x = e.offsetX;
          var y = e.offsetY;

          // Get the pixel data from the canvas
         // Get the pixel data from the canvas
        var pixel = ctx.getImageData(x, y, 1, 1);
        var data = pixel.data;
        var rgba = 'rgba(' + data[0] + ', ' + data[1] + ', ' + data[2] + ', ' + (data[3] / 255) + ')';
        var hex = '#' + componentToHex(data[0]) + componentToHex(data[1]) + componentToHex(data[2]);
        const currentColor = [data[0],data[1],data[2]];
        

          // Find the nearest color from your list
          const nearestColorName = findNearestColor(currentColor);
          NearestMixture = nearestColorName;
          console.log("Near: " + NearestMixture);



          document.querySelector('#color_preview').style.backgroundColor = rgba;
          document.querySelector('#color_hex').textContent = 'Hex: ' + hex;
          document.querySelector('#color_rgb').textContent = 'RGB: ' + data[0] + ', ' + data[1] + ', ' + data[2];
          console.log(rgba);

          var hue = parseInt(hex.substring(1), 16);
          var angle = hue / 360 * 2 * Math.PI;


          var radius = 75;
          var x = radius * Math.cos(angle) + 75;
          var y = radius * Math.sin(angle) + 75;

  
        }
      });



      function componentToHex(c) {
        var hex = c.toString(16);
        return hex.length == 1? '0' + hex : hex;
      }

      document.querySelector('#hex_finder_button').addEventListener('click', function() {
        hex_finder_enabled =!hex_finder_enabled;
        if (hex_finder_enabled) {
          this.textContent = "Dropper Tool Activated!";
        } else {
          this.textContent = "Dropper Tool";
        }
      });

      function copyToClipboard() {
        var range = document.createRange();
        var colorInfo = document.querySelector('#color_info');
        range.selectNode(colorInfo);
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
      }

      document.querySelector('#color_hex').addEventListener('click', function() {
        copyToClipboard();
      });

      document.querySelector('#color_rgb').addEventListener('click', function() {
        copyToClipboard();
      });
      
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
          document.querySelector('#artranger_rgb').textContent = 'RGB: ' + colors[i];
          document.querySelector('#artranger_preview').style.backgroundColor = "rgba("+ colors[i] +")";
          
        }
      }

      console.log(nearestColor);
      document.querySelector('#artranger_hex').textContent ="Name: " + nearestColor;
    

      let colorBox1 = document.getElementById("colorbox1");
      if(nearestColor == "Green Mid" || nearestColor == "Grass Green"){
        console.log("working" + nearestColor);
        document.querySelector('#color_name1').textContent = "•White: 1/16 tsp";
        document.querySelector('#color_name1_box').style.backgroundColor = "white"; 
        document.querySelector('#color_name1').style.color = "black"; 
        document.querySelector('#color_name2').textContent = "•Pale Yellow: 1/4 tsp";
        document.querySelector('#color_name2').style.color = "black"; 
        document.querySelector('#color_name2_box').style.backgroundColor = "yellow"; 
        document.querySelector('#color_name3').textContent = "•Green: 1/8 tsp";
        document.querySelector('#color_name3_box').style.backgroundColor = "green"; 
        document.querySelector('#color_name4').textContent = "";
      }else if(nearestColor == "Phthalo Blue"){
      document.querySelector('#color_name1').textContent = "•Phthalo Blue: 1/4 tsp";
      document.querySelector('#color_name1_box').style.backgroundColor = "blue"; 
      document.querySelector('#color_name2').textContent = "•Green Mid: 1/4 tsp";
      document.querySelector('#color_name2_box').style.backgroundColor = "green"; 
      document.querySelector('#color_name3').textContent = "•Black: 1/8 tsp";
      document.querySelector('#color_name3').style.color = "white";
      document.querySelector('#color_name3_box').style.backgroundColor = "black"; 
      document.querySelector('#color_name4').textContent = "•White: 1/4 tsp";
      document.querySelector('#color_name4_box').style.backgroundColor = "white";
      document.querySelector('#color_name4').style.color = "black";

      }else if(nearestColor == "Viridian"){
      document.querySelector('#color_name1').textContent = "•Green: 1/8 tsp";
      document.querySelector('#color_name1_box').style.backgroundColor = "green"; 
      document.querySelector('#color_name2').textContent = "•Yellow: 2 1/2 Tbsp";
      document.querySelector('#color_name2').style.color = "black";
      document.querySelector('#color_name2_box').style.backgroundColor = "yellow"; 
      document.querySelector('#color_name3').style.color = "black";
      document.querySelector('#color_name3').textContent = "•White: 1/16 tsp";
      document.querySelector('#color_name3_box').style.backgroundColor = "white"; 
      document.querySelector('#color_name4').textContent = "";
      document.querySelector('#color_name4_box').style.backgroundColor = ""; 
      }else if(nearestColor == "Pastel Green" ){
      document.querySelector('#color_name1').textContent = "•Green: 1/8 tsp";
      document.querySelector('#color_name1_box').style.backgroundColor = "green"; 
      document.querySelector('#color_name2').textContent = "•Yellow: 1/8 tsp";
      document.querySelector('#color_name2_box').style.backgroundColor = "yellow"; 
      document.querySelector('#color_name2').style.color = "black";
      document.querySelector('#color_name3').textContent = "";
      document.querySelector('#color_name3_box').style.backgroundColor = ""; 
      document.querySelector('#color_name4').textContent = "";
      document.querySelector('#color_name4_box').style.backgroundColor = ""; 
      }else if(nearestColor == "Burnt Umber" || nearestColor == "Yellow Ochre"){
      document.querySelector('#color_name1').textContent = "•Burnt umber: 1/16 tsp";
      document.querySelector('#color_name1').style.color = "white";
      document.querySelector('#color_name1_box').style.backgroundColor = "#8A3324"; 
      document.querySelector('#color_name2').textContent = "•Yellow Pale: 1/4 tsp";
      document.querySelector('#color_name2_box').style.backgroundColor = "yellow"; 
      document.querySelector('#color_name2').style.color = "black";
      document.querySelector('#color_name3').textContent = "•Orange:  1/4 tsp";
      document.querySelector('#color_name3_box').style.backgroundColor = "orange"; 
      document.querySelector('#color_name4').textContent = "";
      document.querySelector('#color_name4_box').style.backgroundColor = ""; 
      }else{
      document.querySelector('#color_name1').textContent = "There is no Existing Mixture for this color in the Database!";
      document.querySelector('#color_name1').style.color = "black";
      document.querySelector('#color_name1_box').style.backgroundColor = ""; 
      document.querySelector('#color_name2').textContent = "";
      document.querySelector('#color_name2_box').style.backgroundColor = ""; 
      document.querySelector('#color_name3').textContent = "";
      document.querySelector('#color_name3_box').style.backgroundColor = ""; 
      document.querySelector('#color_name4').textContent = "";
      document.querySelector('#color_name4_box').style.backgroundColor = ""; 
      }

      return nearestColor;
    }
    
     
      function addColorPreviewClickListener() {
      const colorPreview = document.getElementById("color_preview");
      colorPreview.addEventListener("click", function() {
        const colorHex = document.getElementById("color_hex").innerText;
        window.location.href = `{{ route('pages.tables') }}?color=${colorHex}`;
      });
    }

    // Call the function after the DOM has loaded
      window.onload = addColorPreviewClickListener;
  </script>

</body>
</html>