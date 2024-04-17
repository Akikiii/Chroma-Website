@extends('layouts.app', ['page' => __('Canva Measurement Tool (1 oz = 25 sq in)'), 'pageSlug' => 'canva'])

@section('content')
<div class = container>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-pastel">
        <div class="card-header">
          <h4 class="card-title">Canva Measurement Tool</h4>
          <p class="card-category">1 oz of paint covers approximately covers 25 square inches</p>
        </div>
        <div class="card-body">
          <div id="sidesContainer">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="side1Width">Side 1 Width (in inch)</label>
                <input type="number" step="0.1" class="form-control side-input" id="side1Width" name="side1Width" required>
              </div>
              <div class="form-group col-md-6">
                <label for="side1Height">Side 1 Height (in inch)</label>
                <input type="number" step="0.1" class="form-control side-input" id="side1Height" name="side1Height" required>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" onclick="addSide()">Add Side</button>
          <button type="button" class="btn btn-danger" onclick="removeSide()">
            <i class="tim-icons icon-trash-simple"></i>
          </button>
          <div class="form-group">
            <label for="paint">Paint Needed (in oz)</label>
            <input type="number" step="0.1" class="form-control paint-input" id="paint" name="paint" disabled>
          </div>
          <button type="button" class="btn btn-primary" onclick="calculatePaint()">Calculate Paint Needed</button>        
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-pastel">
        <div class="card-header">
          <h4 class="card-title">Canva Measurement Tool</h4>
          <p class="card-category">1 oz of paint covers approximately covers 25 square inches</p>
        </div>
        <div class="card-body">
          <div id="sidesContainer">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="side1Width">Side 1 Width (in inch)</label>
                <input type="number" step="0.1" class="form-control side-input" id="side1Width" name="side1Width" required>
              </div>
              <div class="form-group col-md-6">
                <label for="side1Height">Side 1 Height (in inch)</label>
                <input type="number" step="0.1" class="form-control side-input" id="side1Height" name="side1Height" required>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" onclick="addSide()">Add Side</button>
          <button type="button" class="btn btn-danger" onclick="removeSide()">
            <i class="tim-icons icon-trash-simple"></i>
          </button>
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
  let sideCount = 1;

  function addSide() {
    sideCount++;
    const sideContainer = document.getElementById('sidesContainer');
    const newSide = document.createElement('div');
    newSide.className = 'form-row';
    newSide.innerHTML = `
      <div class="form-group col-md-6">
        <label for="side${sideCount}Width">Side ${sideCount} Width (in inch)</label>
        <input type="number" step="0.1" class="form-control side-input" id="side${sideCount}Width" name="side${sideCount}Width" required>
      </div>
      <div class="form-group col-md-6">
        <label for="side${sideCount}Height">Side ${sideCount} Height (in inch)</label>
        <input type="number" step="0.1" class="form-control side-input" id="side${sideCount}Height" name="side${sideCount}Height" required>
      </div>
    `;
    sideContainer.appendChild(newSide);
  }

  function removeSide() {
    if (sideCount > 1) {
      const sideContainer = document.getElementById('sidesContainer');
      sideContainer.removeChild(sideContainer.lastChild);
      sideCount--;
    }
  }

  function calculatePaint() {
    let totalArea = 0;

    for (let i = 1; i <= sideCount; i++) {
      const sideWidth = document.getElementById(`side${i}Width`).value;
      const sideHeight = document.getElementById(`side${i}Height`).value;

      if (sideWidth && sideHeight) {
        const area = sideWidth * sideHeight;
        totalArea += area;
      }
    }

    const paint = totalArea / 25;
    document.getElementById('paint').value = paint.toFixed(2); //Change if needed to have more decimals

    document.querySelector('.paint-input').style.backgroundColor = '#e0f7fa';
    document.querySelector('.paint-input').style.borderColor = '#80deea';
    document.querySelector('.paint-input').style.fontSize = '1.5rem';
    document.querySelector('.paint-input').style.padding = '0.5rem 1rem';
  }
</script>

<style>

.container {
    background-image: url('/storage/uploads/bg.jpg');
  background-size: cover;
  background-position: center;
}

  .paint-input {
    transition: background-color 0.3s, border-color 0.3s, font-size 0.3s, padding 0.3s;
  }

  .card-pastel {
      border-radius: 1rem;
      border: 1px solid #80deea;
      background-color: #e0f7fa;
    }

    .card-pastel .card-header {
      background-color: #80deea;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    .card-pastel .card-title {
      color: #333;
    }

    .card-pastel .card-category {
      color: #666;
    }

    .card-pastel .form-control {
      border-radius: 1rem;
      border: 1px solid #80deea;
    }

    .card-pastel .btn-primary {
      background-color: #80deea;
      border-color: #80deea;
      color: #333;
    }

    .card-pastel .btn-danger {
      background-color: #333;
      border-color: #333;
      color: #80deea;
    }

    .card-pastel .btn-danger i {
      color: #80deea;
    }
</style>