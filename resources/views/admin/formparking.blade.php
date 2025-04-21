@extends('admin.layoutAdmin')
@section('admincontent')
{{Form::open(array("route"=>array("admin.admin.parking.store",$admin),"method"=>"POST","enctype"=>"multipart/form-data"))}}
        {{ csrf_field() }}
        <div class="input-group custom">
            {{Form::label("location","location")}}
            {{Form::text("location","",array("placeholder"=>"location"))}}
        </div>
        @error('location')
            {{$message}}
        @enderror
        <div class="input-group custom">
            {{Form::label("rule","rule")}}
            {{Form::textarea("rule","",array("placeholder"=>"rule"))}}
        </div>
        @error('rule')
            {{$message}}
        @enderror
        <div class="input-group custom">
            {{Form::label("place","place")}}
            {{Form::number("place")}}
        </div>
        @error('place')
            {{$message}}
        @enderror
        <div class="input-group custom">
            {{Form::label("picture","picture")}}
            {{Form::file("picture")}}
        </div>
        @error('picture')
            {{$message}}
        @enderror
        <div class="input-group custom">
            {{Form::label("mode","mode")}}
            {{Form::select("mode",array("free"=>"free","payable"=>"payable"),"free")}}
        </div>
        @error('mode')
            {{$message}}
        @enderror
        <div class="input-group custom">
            {{Form::label("type","type")}}
            {{Form::select("type",array("private"=>"private","public"=>"public"),"public")}}
        </div>
        @error('type')
            {{$message}}
        @enderror
        <div class="input-group custom">
            {{Form::label("prix par minute","prix par minute")}}
            {{Form::text("price","",array("placeholder"=>"prix par minute"))}}
        </div>
        @error('location')
            {{$message}}
        @enderror
        {{Form::submit('créer',array('class'=>'col-sm-2'))}}
    {{Form::close()}}
        @if(session('fails'))
        {{session('fails')}}
        @endif
@endsection