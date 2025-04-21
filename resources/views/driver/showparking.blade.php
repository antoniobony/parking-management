@extends('driver.layoutDriver')
@section('drivercontent')
<div class="page-header rounded-1 p-2 mx-4 mb-5 bg-white" style="border: 1px solid rgb(214, 209, 209);">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="title" style="color:  #012970">
        <h4>Parking disponible</h4>
      </div>
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Accueil</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Parking disponible
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="card bg-light m-4 rounded max-height" style="display: flex">
  @foreach ($parking as $p)
    <div class="card-body " >
      <div class="col-md-4" >
        
        <div class="card mb-3 " style="background-color: white">
          <div class="row g-0">
            <div class="col md-4">
              <img class="rounded-start" src={{asset($p->picture)}} height="114px" alt="div"> 
            </div>
            <div class="col md-8">
              <div class="card-body">
                <h5 class="card-title">{{$p->location}}</h5>
            <p class="card-text">{{$p->rule}}</p>
              <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <p class="card-text">{{$p->type}}</p>
                </div>
             @if($parkingduration==null) 
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
              Entrer le numéro
            </button>
            <div class="collapse show" id="home-collapse">
              <div class="col-auto">
                {{Form::open(array("route"=>array("driver.parkingStart","idd"=>$driver,"idp"=>$p->id),"method"=>"POST"))}}
                    {{Form::text("carnumber","",array("class"=>"form-control"))}}
              </div>
              @error('carnumber')
                    {{$message}}   
              @enderror
                <div class="container-xl ">    
                    {{Form::submit("Effectuer",array("class"=>"btn btn-primary mx-1 mt-2 col-lg-10"))}}
                </div>
                {{Form::close()}}
            </div>
           @endif
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  @endforeach
</div>
@if(session('info'))
  {{session('info')}}
@endif
@endsection