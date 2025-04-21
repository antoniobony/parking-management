@extends('admin.layoutAdmin')
@section('admincontent')
<div class="page-header rounded-1 p-2 mb-5 bg-white" style="border: 1px solid rgb(214, 209, 209);">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="title" style="color:  #012970">
          <h4>Liste des conducteurs</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Liste des conducteurs
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
<div class="col-12 mt-5">
  <div class="card top-selling overflow-auto">
    <div class="card-body pb-0 bg-white">
      <h5 class="card-title">Conducteurs Recents <span>| </span></h5>
      <table class="table table-borderless">
        <thead class="bg-white">
          <tr>
            <th scope="col" class="bg-white">Nom du conducteur</th>
            <th scope="col" class="bg-white">Email</th>
            <th scope="col" class="bg-white">Nombre de parking réalisé</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($driver as $item)
          <tr>
            <td class="bg-white">{{$item->username}}</td>
            <td class="bg-white">{{$item->email}}</td>
            <td class="bg-white"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
              {{$item->c}}</button>
            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-borderless datatable bg-white">
                      <thead>
                        <tr>
                          <th scope="col">Numéro du voiture</th>
                          <th scope="col">Date du parking</th>
                          <th scope="col">Durée du parking</th>
                          <th scope="col">Montant</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($array as $arrays)
                          @if($arrays['iddriver']==$item->id)
                            <tr>
                              <td>{{$arrays['carNumber']}}</td>
                              <td>{{$arrays['parking_date']}}</td>
                              <td>{{$arrays['duration']}}</td>
                              <td>@if($arrays['mode']=="free")
                                  <span class="badge bg-warning">0$</span>                        
                                  @else
                                  <span class="badge bg-success">{{str_replace('$','',$arrays['montant'])}}$</span>
                                  @endif
                              </td>
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
  @endsection