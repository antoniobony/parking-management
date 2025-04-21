<?php

namespace App\Http\Controllers;
use App\Enums\Mode;
use App\Enums\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $timezone='Africa/Addis_Ababa';

    public function index(string $id)
    {
        $dt = Carbon::now($this->timezone);
        $array=null;
        $parkingDurations = \App\Models\parkingDuration::join('parkings', 'parking_durations.parking_id', '=', 'parkings.id')
        ->join('drivers', 'drivers.id', '=', 'parking_durations.driver_id')
        ->where('parkings.admin_id', $id)
        ->get();
        $i=null;
        foreach($parkingDurations as $pa){
            $date1 = date_create($pa->parking_start);
            $date=date_format($pa->parking_start,"d-m-Y H:i:s");
            $date2=$pa->parking_end==null?date_create($dt->format('d-m-Y H:i:s')):date_create($pa->parking_end);
            $diff = date_diff($date1, $date2);
            $h=0;
            $m=0;
            for($j=0;$diff->d > $j;$j++){
                $h+=24;
                $m=24*60;}
            $h=$diff->h+$h>=10?$diff->h+$h:"0".$diff->h+$h;
            $m=$diff->i+$m>=10?$diff->i+$m:"0".$diff->i+$m;
            if($i==null){
                $array=array(array("iddriver"=>$pa->driver_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","username"=>$pa->username,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end));}
            else{
                array_push($array,array("iddriver"=>$pa->driver_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","username"=>$pa->username,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end));}
            $i++;}
        return view('admin.drivertracking',["admin"=>$array]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
       return view('admin.formparking',["admin"=>$id,"type"=>"create"]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
        $validate=Validator::make($request->all(),[
            "location"=>"bail|required|string",
            "rule"=>"bail|required|string",
            "mode"=>["bail","required",Rule::enum(Mode::class)],
            "type"=>["bail","required",Rule::enum(Type::class)],
            "place"=>"bail|required",
            "picture"=>"image|unique:parkings,picture",
        ])->validate();
        
        $filename=time().$request->picture->getCLientOriginalName();
        $path=$request->picture->storeAs('images',$filename,'public');

        $price=$request->price==null?null:(float)$request->price;
        $parking= new \App\Models\parking();
        $parking->create([
        "location"=>$request->location,
        "picture"=>'/storage/'.$path,
        "mode"=>$request->mode,
        "rule"=>$request->rule,
        "type"=>$request->type,
        "place"=>$request->place,
        "admin_id"=>$id,
        "price_minute"=>$price
        ]);
        session()->flash('fails','Added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.formparking',["parking"=>\App\Models\parking::find($id),"type"=>"update"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $validate=Validator::make($request->all(),[
            "location"=>"bail|required|string",
            "rule"=>"bail|required|string",
            "mode"=>["bail","required",Rule::enum(Mode::class)],
            "type"=>["bail","required",Rule::enum(Type::class)],
            "place"=>"bail|required|numeric",
            "price_minute"=>"required",
            "picture"=>"required"
        ])->validate();
        $filename=time().$request->picture->getCLientOriginalName();
        $path=$request->picture->storeAs('images',$filename,'public');

        $parking=new \App\Models\parking();
        $parking->where('id',"=",$id)->update([
            "location"=>$request->location,
            "picture"=>'/storage/'.$path,
            "mode"=>$request->mode,
            "rule"=>$request->rule,
            "type"=>$request->type,
            "place"=>$request->place, 
            "price_minute"=>(float)$request->price_minute   
        ]);
        session()->flash("success","Mise à jour avec succès");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parking=\App\Models\parking::find($id)->delete();
        return redirect()->back();
    }
}
