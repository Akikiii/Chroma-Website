<!DOCTYPE html>
<html>
<head>
  <title>Color Checker</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .container {
      width: 600px;
      height: 600px;
      border: 1px solid black;
      margin: 20px auto;
      position: relative;
      background-color: white;
    }

    .tools {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 20px;
      display: flex;
      flex-direction: column;
    }

    .tool-button {
      width: 50px;
      height: 50px;
      border: none;
      border-radius: 50%;
      background-color: white;
      box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
      margin-bottom: 10px;
      cursor: pointer;
    }

    .zoom-in {
      background-color: #333;
      color: white;
    }

    .zoom-out {
      background-color: #333;
      color: white;
    }

    .dropper {
      background-color: #333;
      color: white;
    }
  </style>
</head>
<body>
  @extends('layouts.app', ['page' => __('Color Checker'), 'pageSlug' => 'maps'])

  @section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header">
          Color Picker
        </div>
        <div class="card-body">
          <div class="container">
            <div class="tools">
              <button class="tool-button zoom-in">+</button>
              <button class="tool-button zoom-out">-</button>
              <button class="tool-button dropper">D</button>
            </div>
            <div class="image">
            </div>
          </div>
          <form method="POST" action="{{ route('image.upload') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload Image</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection

  <script>
    // Add event listeners to the buttons
    document.querySelector('.zoom-in').addEventListener('click', function() {
      // Add zoom-in functionality here
    });

    document.querySelector('.zoom-out').addEventListener('click', function() {
      // Add zoom-out functionality here
    });

    document.querySelector('.dropper').addEventListener('click', function() {
      // Add dropper tool functionality here
    });

    // Add an event listener to the form to display the uploaded image in the container
    document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();
      const formData = new FormData(event.target);
      const image = formData.get('image');
      const imageUrl = URL.createObjectURL(image);
      const imageContainer = document.querySelector('.image');
      imageContainer.style.backgroundImage = `url(${imageUrl})`;
    });
  </script>

</body>
</html>