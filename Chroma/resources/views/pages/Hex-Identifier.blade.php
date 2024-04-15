<!DOCTYPE html>
<html>
<head>
  <title>Color Checker</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap">
  <style>
    .title-card {
      font-family: Montserrat, sans-serif;
      font-size: 3.5em; 
      letter-spacing: -4px;
      font-weight: bold;
      padding: 10px;
      text-align: Left;
    }

      #container {
      background-image: url("storage/uploads/bg5.png");
      background-repeat: no-repeat;
      background-attachment:inherit; 
      background-size:100%;
      padding: 20px;
      border-radius: 10px; 
    }

    #artranger {
      position: absolute;
      top: 500px;
      right: 250px; 
      width: 300px;
      height: 200px;
      background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1); 
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 10px;
      box-sizing: border-box;
    }

    #artranger_preview {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    #artranger_hex, #artranger_rgb {
      color:black;
      font-size: 20px;
      font-weight: bold;
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
    
    #zoom_box {
      width: 550px;
      height: 400px;
      border: 2px solid black;
      background-position: center;
      background-size: contain;
      margin: 20px auto;
      right: 25%;
      position: relative;
      background-color: white;
      transition: transform 0.25s ease;
      overflow: hidden;
      object-fit: contain;
      touch-action: none;
    }

    #color_info {
      position: absolute;
      top: 280px;
      right: 100px; 
      width: 300px;
      height: 200px;
      background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1); 
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 10px;
      box-sizing: border-box;
    }

    #color_preview {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    #color_hex, #color_rgb {
      font-size: 20px;
      font-weight: bold;
    }

    #buttons_container {
      position: absolute;
      bottom: -90px;
      left: 0; 
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px;
    }

    button {
      margin-bottom: 10px;
    }

    #color_wheel {
      position: absolute;
      bottom: 0;
      right: 50px;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background-image: conic-gradient(red, yellow, lime, aqua, blue, magenta, red);
      border: 2px solid black;
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
      border-radius: 20px; /* Round corners */
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.2s ease-in-out;
      background-color: #ffc1d3;
      color: #ffffff; 
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); 
    }

    #hex_finder_button:hover {
      background-color: #f797b6; 
    }

    .chiller-font {
      font-family: 'Pacifico', cursive;
      font-size: 30px;
      color: black;
      text-align: left;
      line-height: 1.5;
    }
  </style>
</head>
<body>
  @extends('layouts.app', ['page' => __('Color Checker'), 'pageSlug' => 'maps'])

  @section('content')
<div id="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-plain" id = "content">
      <div class="title-card">
        <span style="color: royalblue;">U</span>
        <span style="color: slateblue;">p</span>
        <span style="color: lightblue;">l</span>
        <span style="color: skyblue;">o</span>
        <span style="color: lightpink;">a</span>
        <span style="color: pink;">d</span>
        <span style="color: hotpink;"> </span>
        <span style="color: hotpink;">I</span>
        <span style="color: pink;">m</span>
        <span style="color: lightpink;">a</span>
        <span style="color: skyblue;">g</span>
        <span style="color: lightblue;">e</span>
        <span style="color: slateblue;"> </span>
        <span style="color: royalblue;">H</span>
        <span style="color: slateblue;">e</span>
        <span style="color: lightblue;">r</span>
        <span style="color: skyblue;">e</span>
      </div>
        <div class = card-body>
          <div class= "chiller-font">
          Say goodbye to eyeballing paint mixtures, because we will do it for you.
          </div>
        </div>
        <div class="card-body">
          </div>
          <input type="file" id="image_input" accept="image/png, image/jpg">
          <canvas id="display_canvas" style="display: none;"></canvas>
          <div id="zoom_box">
            <div id="display_image" draggable="true"></div>
          </div>
          <div id="color_info">
              <div id="color_preview" style="background-color: Black; border: 3px solid black;"></div>
              <span id="color_hex" contenteditable="true" style="cursor: pointer;">#FFFFFF</span>
              <span id="color_rgb" contenteditable="true" style="cursor: pointer;">RGB(255, 255, 255)</span>
            </div>  
            <div id="color_wheel">
              <div id="pointer"></div>
            </div>
            <div id="artranger">
              <div id="artranger_preview" style="background-color: white; border: 3px solid black;"></div>
              <span id="artranger_hex" contenteditable="true" style="cursor: pointer;">Nearest Color</span>
              <span id="artranger_rgb" contenteditable="true" style="cursor: pointer;">RGB(255, 255, 255)</span>
            </div>
            <div id="buttons_container">
            <button id="hex_finder_button">Enable Hex Finder</button>
          </div>
      </div>
  @endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.3.0/chroma.min.js"></script>
  <script>
    const colorBox = document.querySelectorAll('color_preview');
    document.addEventListener('DOMContentLoaded', function() {
      const image_input = document.querySelector('#image_input');
      var uploaded_image = "";
      var zoom_level = 1;
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


          document.querySelector('#color_preview').style.backgroundColor = rgba;
          document.querySelector('#color_hex').textContent = 'Hex: ' + hex;
          document.querySelector('#color_rgb').textContent = 'RGB: ' + data[0] + ', ' + data[1] + ', ' + data[2];
          console.log(rgba);

          var hue = parseInt(hex.substring(1), 16);
          var angle = hue / 360 * 2 * Math.PI;


          var radius = 75;
          var x = radius * Math.cos(angle) + 75;
          var y = radius * Math.sin(angle) + 75;

          var pointer = document.querySelector('#pointer');
          pointer.style.left = x + 'px';
          pointer.style.top = y + 'px';
        }
      });


      function componentToHex(c) {
        var hex = c.toString(16);
        return hex.length == 1? '0' + hex : hex;
      }

      document.querySelector('#hex_finder_button').addEventListener('click', function() {
        hex_finder_enabled =!hex_finder_enabled;
        if (hex_finder_enabled) {
          this.textContent = "Disable Hex Finder";
        } else {
          this.textContent = "Enable Hex Finder";
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
      return nearestColor;
    }
  </script>

</body>
</html>