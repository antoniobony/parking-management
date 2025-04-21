@extends('admin.layoutAdmin')
@section('admincontent')
<div class="page-header rounded-1 p-2 mb-5 bg-white" style="border: 1px solid rgb(214, 209, 209);">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="title" style="color:  #012970">
        <h4>Suivie du parking</h4>
      </div>
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Accueil</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Suivie du parking
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="card bg-white">
    <div class="card-body">
      <h5 class="card-title mb-4 " style="padding: 20px 0 15px 0;
      font-size: 18px;
      font-weight: 500;
      color: #012970;
      font-family: Poppins, sans-serif;">Suivie du parking</h5>

      <!-- Bordered Tabs Justified -->
      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true" style="border-bottom: border-bottom: 52px solid #4154f1">Tout</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">En cours</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Terminé</button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab" style="min-height:79px">
            <table class="table table-borderless datatable bg-white">
                <thead>
                  <tr>
                    <th scope="col">Nom du conducteur</th>
                    <th scope="col">Numéro du voiture</th>
                    <th scope="col">Date du parking</th>
                    <th scope="col">Durée du parking</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                @if($admin!==null)
                @foreach ($admin as $item)
                  <tr>
                    <th scope="row"><a href="#">{{$item['username']}}</a></th>
                    <td>{{$item['carNumber']}}</td>
                    <td>{{$item['parking_date']}}</td>
                    <td>{{$item['duration']}}</td>
                    <td>@if($item['active']==null)
                        <span class="badge bg-warning">En cours</span>                        
                        @else
                        <span class="badge bg-success">Terminé</span>
                        @endif
                    </td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
        </div>
        <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab" style="min-height:79px">
            <table class="table table-borderless datatable bg-white">
                <thead>
                  <tr>
                    <th scope="col">Nom du conducteur</th>
                    <th scope="col">Numéro du voiture</th>
                    <th scope="col">Date du parking</th>
                    <th scope="col">Durée du parking</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                @if($admin!==null)
                @foreach ($admin as $item)
                  @if($item['active']==null)
                  <tr>
                    <th scope="row"><a href="#">{{$item['username']}}</a></th>
                    <td>{{$item['carNumber']}}</td>
                    <td>{{$item['parking_date']}}</td>
                    <td>{{$item['duration']}}</td>
                    <td><span class="badge bg-warning">En cours</span></td>
                  </tr>
                  @endif  
                @endforeach
                @endif
                </tbody>
              </table>
        </div>
        <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab" style="min-height:79px">
            <table class="table table-borderless datatable bg-white">
                <thead>
                  <tr>
                    <th scope="col">Nom du conducteur</th>
                    <th scope="col">Numéro du voiture</th>
                    <th scope="col">Date du parking</th>
                    <th scope="col">Durée du parking</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                @if($admin!==null  && $item['active']!==null)
                @foreach ($admin as $item)
                  <tr>
                    <th scope="row"><a href="#">{{$item['username']}}</a></th>
                    <td>{{$item['carNumber']}}</td>
                    <td>{{$item['parking_date']}}</td>
                    <td>{{$item['duration']}}</td>
                    <td><span class="badge bg-success">Terminé</span></td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
        </div>
      </div><!-- End Bordered Tabs Justified -->

    </div>
  </div>
  <div class="container-fluid mt-4 ">
  <button class="btn btn-primary justify-content-end"><a href={{route('admin.AllDriver',["admin"=>Auth::guard('admin')->id()])}} class="nav-link text-white ">Voir liste des conducteurs</a></button>
  </div>
@endsection