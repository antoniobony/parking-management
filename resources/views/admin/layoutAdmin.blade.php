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
        <a href={{route('admin.admin.show',["admin"=>Auth::guard('admin')->id()])}} class="nav-link text-white {{Route::is('admin.admin.show')?'active':''}}">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Accueil
      </a>
    </li>
    <li>
      <a href={{route('admin.admin.parking.index',["admin"=>Auth::guard('admin')->id()])}} class="nav-link text-white {{Route::is('admin.admin.parking.index')?'active':''}}">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
       Suivie du parking
      </a>
    </li>
    <li>
        <a href={{route('admin.AllDriver',["admin"=>Auth::guard('admin')->id()])}} class="nav-link text-white {{Route::is('admin.AllDriver')?'active':''}}">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Liste des conducteurs
      </a>
    </li>
    <li>
        <a href={{route('admin.showProfile')}} class="nav-link text-white {{Route::is('admin.showProfile')?'active':''}}">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Profile
      </a>
    </li>
  </ul>
@endsection
@section('content')
    @yield('admincontent')
@endsection
