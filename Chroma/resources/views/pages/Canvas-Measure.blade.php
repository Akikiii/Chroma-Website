@extends('layouts.app', ['page' => __('Canva Measurement Tool (1 oz = 25 sq in)'), 'pageSlug' => 'canva'])

@section('content')
<div class="container">
  <h4 class="card-title">Canva Measurement Tool</h4>
  <h6 class="small-title">1 OZ OF PAINT COVERS APPROXIMATELY 25 SQUARE INCHES</h6>
  <form>
    <div class="side-group">
      <label for="side1Width">Width(Inches)</label>
      <input type="number" step="0.1" class="side-control" id="side1Width" name="side1Width" placeholder = "0.00"required>
    </div>
    <div class="side-group">
      <label for="side1Height">Length(Inches)</label>
      <input type="number" step="0.1" class="side-control" id="side1Height" name="side1Height" placeholder ="0.00" required>
    </div>
    <div class="side-group">
      <label for="paint">Paint Needed (in oz)</label>
      <input type="number" step="0.1" class="paint-input" id="paint" name="paint" placeholder="0.00" disabled>
    </div>
    <button type="button" class="btn-primary" onclick="calculatePaint()">Calculate Paint Needed</button>
    <div class="image-container">
    <img src="storage\uploads\guide.jpg" alt="Your Image Description">
  </div>
  </form>
</div>
@endsection

<script>
  let sideCount = 1;


  //Incase if we need more sides
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


  }
</script>

<style>

.container {
  font-size: 30px;
  font-weight:bold;
  max-width: 150px;
  margin: 30px 30px;
  height: 550px;
  padding: 50px;
  border-radius: 15px;
  background-color: #49366d;
  color:whitesmoke;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
}

.image-container {

  margin-top:-400px;
  width: 40%; 
  margin-left: 600px; 
}

.image-container img {
  width: 800px; 
  height: auto; 
}
.card-title {
  margin-bottom: 0;
  font-weight: bold;
  font-size: 32px;
  margin-top: -40px;
}


.small-title {
  font-size: 14px;
  margin-top: -25px;  
}


.side-group {
  margin-top: 20px;
  margin-bottom:10px;


}

.side-control {
  border-radius: 20px;
  width: 20%; /* decrease the width to 20% */
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  background-color: #fff;
}

.btn-primary {
  width: 30%; 
  padding: 10px;
  margin-top:20px;
  font-size: 16px;
  border: none;
  border-radius: 15px;
  background-color: #7b64a4;
  color: #fff;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #23527c;
}
.paint-input{
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  border-radius: 20px;
  width: 20%; /* decrease the width to 20% */
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  background-color: #fff;
}
</style>