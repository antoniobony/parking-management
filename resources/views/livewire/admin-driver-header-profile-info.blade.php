<div>
    @if($parking_id!==null)
    {{Form::open(array("route"=>array("admin.parking.update",$parking_id),"method"=>"PUT","enctype"=>"multipart/form-data"))}}
        {{ csrf_field() }}
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Adresse</label>
          <div class="col-sm-10">
            <input type="text" name="location" class="form-control" value={{$location}}>
          </div>
          @error('location')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Règlement</label>
          <div class="col-sm-10">
            <input type="textarea" name="rule" class="form-control" value={{$rule}} style="height: 100px"></textarea>
          </div>
          @error('rule')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">Nombre de place </label>
          <div class="col-sm-10">
            <input name="place" type="number" value={{$place}} class="form-control">
          </div>
          @error('place')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="row mb-3">
          <label for="inputNumber" class="col-sm-2 col-form-label">image</label>
          <div class="col-sm-10">
            <input name="picture" class="form-control" type="file" id="formFile">
          </div>
          @error('picture')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Type</label>
          <div class="col-sm-10">
            <select name="type" class="form-select" aria-label="Default select example" >
              <option {{$type=="public"?"selected":""}} value="public">public</option>
              <option {{$type=="private"?"selected":""}} value="private">private</option>
            </select>
          </div>
          @error('type')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Mode</label>
            <div class="col-sm-10">
              <select name="mode" class="form-select" aria-label="Default select example">
                <option wire:click.prevent="selectMode('free')" {{$mode=="free" ? "selected" :""}} value="free">free</option>
                <option wire:click.prevent="selectMode('payable')" {{$mode=="payable" ? "selected" :""}} value="payable">payable</option>
              </select>
            </div>
            @error('mode')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          @if($m==null || $m=="payable")
              <div class="row mb-3" >
                <label for="inputText" class="col-sm-2 col-form-label">Prix par minute (dollar $)</label>
              <div class="col-sm-10">
                <input type="text" name="price_minute" class="form-control" value={{$price_minute}}>
              </div>
              @error('price_minute')
                <span class="text-danger">{{$message}}</span>
              @enderror
              </div>
          @endif
        <div class="row mb-3" style="margin-left: 250px">
          <div class="col-sm-10">
            {{Form::submit('Changer',array("class"=>"btn btn-primary"))}}
          </div>
        </div>
      
      {{Form::close()}}<!-- End General Form Elements -->
      @if(Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('success')}}
        <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @endif
</div>
