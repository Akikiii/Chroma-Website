<!DOCTYPE html>
<html>
<head>
  <title>Color Checker</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    #display_image {
      width: 600px;
      height: 600px;
      border: 1px solid black;
      background-position: center;
      background-size: cover;
      margin: 20px auto;
      position: relative;
      background-color: white;
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
          </div>
          <input type="file" id="image_input" accept="image/png, image/jpg">
          <div id="display_image"></div>

  @endsection

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const image_input = document.querySelector('#image_input');
      var uploaded_image = "";

      image_input.addEventListener("change", function(){
        const reader = new FileReader();
        reader.addEventListener("load", () => {
          uploaded_image = reader.result;
          document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`;
        });
        reader.readAsDataURL(this.files[0]);
      });
    });
  </script>

    
</body>
</html>
