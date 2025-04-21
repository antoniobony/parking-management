<div class="container d-flex justify-content-space-between">
<div class="col-xl-4 mx-1" >
    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center rounded-4" style="background-color: white">
        <img src={{asset("asset/profile-img.png")}} alt="Profile" class="rounded-circle">
        <h2>{{$username}}</h2>
        <h3>{{$email}}</h3>
      </div>
    </div>
  </div>
<div class="col-xl-8">
<div class="card" style="background-color: white">
<div class="card-body pt-3">
<div>
    <ul class="nav nav-tabs nav-tabs-bordered">

        <li class="nav-item">
          <button wire:click.prevent='selectTab("Overview")' class="nav-link {{$tab=='Overview'?'active':''}}" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
        </li>

        <li class="nav-item">
          <button wire:click.prevent='selectTab("Edit_Profile")' class="nav-link {{$tab=='Edit_Profile'?'active':''}}" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier  Profil</button>
        </li>

        <li class="nav-item">
          <button wire:click.prevent='selectTab("Change_Password")' class="nav-link {{$tab=='Change_Password'?'active':''}}" data-bs-toggle="tab" data-bs-target="#profile-change-password">Modifier Mot de passe</button>
        </li>
        @if(Auth::guard('admin')->check())
        <li class="nav-item">
          <button wire:click.prevent='selectTab("Change_Parking")' class="nav-link {{$tab=='Change_Password'?'active':''}}" data-bs-toggle="tab" data-bs-target="#profile-change-parking">Modifier Propos Parking</button>
        </li>
        @endif
      </ul>
      <div class="tab-content pt-2">
        <div class="tab-pane fade {{$tab=='Overview'?'show active':''}} profile-overview" id="profile-overview">
          <h5 class="card-title">A propos</h5>
          <p class="small fst-italic">{{Auth::guard('admin')->id()?"L'administrateur a la responsabilité d'assurer l'exactitude et la mise à jour des informations
            sur le parking,y compris les règles,les disponibilité des places et les instructions d'accès.":
            "Le conducteur "
          }}</p>

          <h5 class="card-title">Details du profil</h5>

          <div class="row">
            <div class="col-lg-3 col-md-4 label ">Nom de l'utilisateur</div>
            <div class="col-lg-9 col-md-8">{{$username}}</div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-4 label">Email</div>
            <div class="col-lg-9 col-md-8">{{$email}}</div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-4 label">Role</div>
            <div class="col-lg-9 col-md-8">{{Auth::guard('admin')->id()? 'Admin':'Conducteur'}}</div>
          </div>
        </div>
        
        <div class="tab-pane fade {{$tab=='Edit_Profile'?'show active':''}} profile-edit pt-3" id="profile-edit">

          <!-- Profile Edit Form -->
          {{ Form::open(array("route"=>Auth::guard('admin')->check()?array("admin.admin.update",$id):array("driver.driver.update",$id),"method"=>"PUT"))}}
            <div class="row mb-3">
              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom de l'utilisateur</label>
              <div class="col-md-8 col-lg-9">
                <input name="username" type="text" class="form-control" id="fullName"  value={{$username}}>
              </div>
            </div>
            <div class="row mb-3">
              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
              <div class="col-md-8 col-lg-9">
                <input name="email" type="email" class="form-control" id="Email" value={{$email}}>
              </div>
            </div>
            @if (session('fails'))
              <div class="alert alert-danger alert-dismissible fade show " role="alert">
                {{session('fails')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="text-center">
              {{Form::submit("Sauvegarder",array("class"=>"btn btn-primary"))}}
            </div>
          {{Form::close()}}<!-- End Profile Edit Form -->
        </div>
        <div class="tab-pane fade {{$tab=='Change_Password'?'show active':''}} pt-3" id="profile-change-password">
          <!-- Change Password Form -->
          <form wire:submit.prevent='UpdatePassword()'>

            <div class="row mb-3">
              <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
              <div class="col-md-8 col-lg-9">
                <input name="password" type="password" class="form-control" id="currentPassword" wire:model.defer='password'>
              </div>
              @error('password')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="row mb-3">
              <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
              <div class="col-md-8 col-lg-9">
                <input name="newpassword" type="password" class="form-control" id="newPassword" wire:model.defer='newpassword'>
              </div>
              @error('newpassword')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="row mb-3">
              <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer nouveau mot de passe</label>
              <div class="col-md-8 col-lg-9">
                <input name="renewpassword" type="password" class="form-control" id="renewPassword" wire:model.defer='renewpassword'>
              </div>
              @error('renewpassword')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show " role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Modifier Mot de passe</button>
            </div>
          </form><!-- End Change Password Form -->

        </div>
        
        @if(Auth::guard('admin')->check())
        <div class="tab-pane fade {{$tab=='Change_Parking'?'show active':''}} pt-3" id="profile-change-parking">
            @livewire('admin-driver-header-profile-info')
        </div>
        @endif
</div>
</div>
</div>
</div>
</div>



