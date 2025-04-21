@extends('driver.layoutDriver')
@section('drivercontent')
<div class="page-header rounded-1 p-2 mb-5 bg-white" style="border: 1px solid rgb(214, 209, 209);">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="title" style="color:  #012970">
        <h4>Liste des parking </h4>
      </div>
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Accueil</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Liste des parkings  
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="container d-column justify-content-space-end">
  <div class="row pb-10 p-2">
    @if($p!==null)
    @foreach($p as $i) 
    @if($i["active"]==null)
      <div class="col-xl-5 col-lg-3 col-md-10 mb-20 "> 
        <div class="card p-2">
          @if($i["mode"]!=="free")
            <p>Solde à payer {{$i["montant"]}}$</p>
            <p>Durrée {{$i['duration']}}</p>
            {{Form::open(array("route"=>array("driver.checkout",$i["id"]),"method"=>" POST"))}}
            {{ csrf_field() }}
            {{Form::submit('Payé',array('class'=>'btn btn-secondary'))}}  
            {{Form::close()}}    
          @else
            {{Form::open(array("route"=>array("driver.parkingEnd",$i["id"]),"method"=>"PUT"))}}
            {{Form::submit('Parking Terminé',array('class'=>'btn'))}}
            {{Form::close()}}
          @endif
        </div>
      </div>
      @endif
    @endforeach
    @endif
    <div class="col-xl-5 col-lg-3 col-md-6 mb-20"> 
      <div class="card p-2">
        <button class="btn"><a href={{route('driver.showparking',['driver'=>$driver])}}>Parking Dispo</a></button>
      </div>
    </div>
  </div>
    <div class="col-12 mt-5">
      <div class="card top-selling overflow-auto" style="background-color: white">
        <div class="card-body pb-0" style="background-color: white">
          <h5 class="card-title">Liste parking <span>| </span></h5>
          <table class="table table-borderless" style="background-color: white">
            <thead>
              <tr>
                <th scope="col">Picture</th>
                <th scope="col">Numéro du voiture</th>
                <th scope="col">Adresse du parking</th>
                <th scope="col">Date du parking</th>
                <th scope="col">Durré du parking</th>
                <th scope="col">Solde payer</th>
              </tr>
            </thead>
            <tbody>
              @if($p!==null)
              @foreach ($p as $item)
              <tr>
                <th scope="row"><a href="#"><img class="rounded" height="50px" width="50" src={{$item["picture"]}} alt=""></a></th>
                <td>{{$item['carNumber']}}</td>
                <td>{{$item['place']}}</td>
                <td>{{$item['parking_date']}}</td>
                <td class="fw-bold">{{$item['duration']}}</td>
                @if($i["mode"]=="payable")
                <td class="fw-bold">{{str_ireplace("$","",$item['montant'])}}$</td>
                @else
                <td class="fw-bold">0$</td>
                @endif
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- End Top Selling -->
    @if(session("success"))
      {{session("success")}}
    @endif
  </div>
@endsection