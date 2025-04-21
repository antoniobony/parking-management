@extends('driver.layoutDriver')
@section('drivercontent')
<div class="card bg-light m-4 rounded max-height">
  <h5 class="card-header">Parking</h5>                    
  <div class="card-body">
      <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Titre de la carte 2</h5>
                  <p class="card-text">Texte de la carte 2</p>
                  <div class="row g-3 align-items-center">
                      <div class="col-auto">
                        <p class="card-text">Password</p>
                      </div>
                      <div class="col-auto">
                        <input type="text" class="form-control" >
                      </div>
                    </div>
                  <div class="container-xl ">
                      <button class="btn btn-primary mx-5 mt-2 col-md-5">Garer</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>  
@endsection