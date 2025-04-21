@extends('clayout.layout')
@section('logout')
{{Form::open(array("route"=>array("logout"),"method"=>"POST"))}}
      {{ csrf_field() }}
      {{Form::submit('Se déconnecter',array('class'=>'btn btn-primary'))}}
    {{Form::close()}}
@endsection
@section('navcontent')
<ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href={{route('driver.showparking',["driver"=>Auth::guard('driver')->id()])}} class="nav-link text-white {{Route::is('driver.showparking') ? 'active':''}}" >
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Parking disponible
      </a>
    </li>
    <li>
        <a href={{route('driver.drivertracking',["driver"=>Auth::guard('driver')->id()])}} class="nav-link text-white {{Route::is('driver.drivertracking')?'active':''}}">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Suivi des parkings
      </a>
    </li>
    <li>
      <a href={{route('driver.showProfile')}} class="nav-link text-white {{Route::is('driver.showProfile')?'active':''}}">
      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
      Profil
    </a>
  </li>
  </ul>
@endsection
@section('content')
    @yield('drivercontent')
@endsection
