<!DOCTYPE html>
<html>
<head>
  <title>Color Checker</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap">
  <style>
    .title-card {
      font-family: Montserrat, sans-serif;
      font-size: 3.5em; /* Adjust font size for desired size */
      letter-spacing: -4px; /* Reduce space between letters */
      font-weight: bold;
      padding: 10px;
      text-align: Left;
    }

      #container {
      background-image: linear-gradient(to right, #f0e6fa, #d6cef0); /* Light pink to light lavender gradient */
      background-repeat: no-repeat;
      background-attachment: fixed; /* Keep background fixed on scroll */
      padding: 20px;
      border-radius: 10px; /* Add rounded corners */
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
      width: 75px;
      height: 75px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    #artranger_hex, #artranger_rgb {
      font-size: 20px;
      font-weight: bold;
    }

    #image_input {
      background-color: #f08080; /* Light pink button color */
      color: white; /* White text color */
      padding: 10px 20px;
      border: none;
      border-radius: 5px; /* Rounded corners */
      cursor: pointer; /* Change cursor to pointer on hover */
      font-size: 18px; /* Adjust font size */
      font-weight: bold;
      margin-top: 20px;
    }

    #image_input:hover {
      background-color: #d76363; /* Slightly darker pink on hover */
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
      width: 75px;
      height: 75px;
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
        Say goodbye to eyeballing paint mixtures, because we will do it for you.
        </div>
        <div class="card-body">
          </div>
          <input type="file" id="image_input" accept="image/png, image/jpg">
          <canvas id="display_canvas" style="display: none;"></canvas>
          <div id="zoom_box">
            <div id="display_image" draggable="true"></div>
          </div>
          <div id="color_info">
              <div id="color_preview" style="background-color: white;"></div>
              <span id="color_hex" contenteditable="true" style="cursor: pointer;">#FFFFFF</span>
              <span id="color_rgb" contenteditable="true" style="cursor: pointer;">RGB(255, 255, 255)</span>
            </div>  
            <div id="color_wheel">
              <div id="pointer"></div>
            </div>
            <div id="artranger">
              <div id="artranger_preview" style="background-color: white;"></div>
              <span id="artranger_hex" contenteditable="true" style="cursor: pointer;">#FFFFFF</span>
              <span id="artranger_rgb" contenteditable="true" style="cursor: pointer;">RGB(255, 255, 255)</span>
            </div>
            <div id="buttons_container">
            <button id="hex_finder_button">Enable Hex Finder</button>
          </div>
      </div>
  @endsection
  <script>
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
        e.preventDefault();
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

          // Get the pixel data from thecanvas
          var pixel = ctx.getImageData(x, y, 1, 1);
          var data = pixel.data;
          var rgba = 'rgba(' + data[0] + ', ' + data[1] + ', ' + data[2] + ', ' + (data[3] / 255) + ')';
          var hex = '#' + componentToHex(data[0]) + componentToHex(data[1]) + componentToHex(data[2]);

          fetch('/api/pictures/nearest-color', {  // Added closing parenthesis here
              method: 'POST',
              body: JSON.stringify({
                red: data[0],
                green: data[1],
                blue: data[2],
              }),
            })
            .then(response => response.json())
            .then(data => {
              if (data.message === 'Nearest color found!') {
                console.log("Nearest color name:", data.color_name);
              } else {
                console.log(data.message);
              }
            });




// Update the color preview, hex, RGB, and color name elements
          document.querySelector('#color_preview').style.backgroundColor = rgba;
          document.querySelector('#color_hex').textContent = 'Hex: ' + hex;
          document.querySelector('#color_rgb').textContent = 'RGB: ' + data[0] + ', ' + data[1] + ', ' + data[2];

// Calculate the angle of the color on the color wheel based on the hex code
          var hue = parseInt(hex.substring(1), 16);
          var angle = hue / 360 * 2 * Math.PI;

// Calculate the x and y coordinates of the pointer based on the angle and the radius of the color wheel
          var radius = 75;
          var x = radius * Math.cos(angle) + 75;
          var y = radius * Math.sin(angle) + 75;

// Set the position of the pointer using the calculated x and y coordinates
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
  </script>

</body>
</html>