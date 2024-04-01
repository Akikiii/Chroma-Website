@extends('layouts.app', ['page' => __('Canva Measurement Tool (1 oz = 25 sq in)'), 'pageSlug' => 'canva'])

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Canva Measurement Tool</h4>
          <p class="card-category">1 oz of paint covers approximately covers 25 square inches</p>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="width">Canvas Width (in inch)</label>
              <input type="number" step="0.1" class="form-control" id="width" name="width" required>
            </div>
            <div class="form-group">
              <label for="height">Canvas Height (in inch)</label>
              <input type="number" step="0.1" class="form-control" id="height" name="height" required>
            </div>
            <div class="form-group">
              <label for="paint">Paint Needed (in oz)</label>
              <input type="number" step="0.1" class="form-control paint-input" id="paint" name="paint" disabled>
            </div>
            <button type="button" class="btn btn-primary" onclick="calculatePaint()">Calculate Paint Needed</button>
        </div>
      </div>
    </div>
  </div>
@endsection

<script>
  function calculatePaint() {
    const width = document.getElementById('width').value;
    const height = document.getElementById('height').value;
    const paint = (width * height) / 25; //Formula for Acrylic paint per square surface
    document.getElementById('paint').value = paint.toFixed(2); //Change if needed to have more decimals

    document.querySelector('.paint-input').style.backgroundColor = '#ffe699';
    document.querySelector('.paint-input').style.borderColor = '#ffb347';
    document.querySelector('.paint-input').style.fontSize = '1.5rem';
    document.querySelector('.paint-input').style.padding = '0.5rem 1rem';
  }
</script>

<style>
  .paint-input {
    transition: background-color 0.3s, border-color 0.3s, font-size 0.3s, padding 0.3s;
  }
</style>
