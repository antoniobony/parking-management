@extends('admin.layoutAdmin')
@section('admincontent')
<div class="page-header rounded-1 p-2 mb-5 bg-white" style="border: 1px solid rgb(214, 209, 209);">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="title" style="color:  #012970">
          <h4>Profil</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Profil
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
        <!-- Bordered Tabs -->
        @livewire('admin-driver-profile-tabs')
        <!-- End Bordered Tabs -->

@endsection