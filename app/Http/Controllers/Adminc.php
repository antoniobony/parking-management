<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Adminc extends Controller
{
    public $timezone='Africa/Addis_Ababa';
    
    public function getAllDriver(string $admin)
    {
        $array=null;
        $dt = Carbon::now($this->timezone);
        $p=\App\Models\parkingDuration::select('drivers.username', 'drivers.email','drivers.id', DB::raw('count(parking_start) as c'))
        ->join('parkings', 'parkings.id', '=', 'parking_durations.parking_id')
        ->join('drivers', 'parking_durations.driver_id', '=', 'drivers.id')
        ->where('parkings.admin_id',$admin)
        ->groupBy('drivers.username', 'drivers.email','drivers.id')
        ->get();
        foreach($p as $paa){
        $parkingduration=\App\Models\parkingDuration::
        select('parking_durations.id','parking_start','parking_end','parkings.mode','parking_durations.driver_id','parking_durations.parking_id','parking_durations.carNumber','parkings.price_minute')
        ->join('parkings','parkings.id','=','parking_durations.parking_id')
        ->where("parkings.admin_id",$admin)->get();
        $i=null;
        foreach($parkingduration as $pa){
            $payment=\App\Models\payment::where("parking_duration_id",$pa->id)->get();
            $price=null;
            foreach($payment as $pay){$price=$pay->price;}
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
                if($pa->parking->mode!=="free"){
                    $array=$pa->parking_end==null?array(array("iddriver"=>$pa->driver_id,"id"=>$pa->id,"mode"=>$pa->mode,"idparking"=>$pa->parking_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end,"montant"=>$pa->parking->price_minute*(($diff->h*60)+$diff->i))):array(array("iddriver"=>$pa->driver_id,"id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","active"=>$pa->parking_end,"montant"=>$price));}
                else{
                    $array=array(array("iddriver"=>$pa->driver_id,"id"=>$pa->id,"mode"=>$pa->mode,"idparking"=>$pa->parking_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","active"=>$pa->parking_end));
                }
            }
            else{
                if($pa->parking->mode!=="free"){
                   if($pa->parking_end==null) {
                    array_push($array,array("iddriver"=>$pa->driver_id,"id"=>$pa->id,"mode"=>$pa->mode,"idparking"=>$pa->parking_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","active"=>$pa->parking_end,"montant"=>$pa->price_minute*(($diff->h*60)+$diff->i)));
                    }
                   else{array_push($array,array("iddriver"=>$pa->driver_id,"id"=>$pa->id,"mode"=>$pa->mode,"idparking"=>$pa->parking_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","active"=>$pa->parking_end,"montant"=>$price));}
                }
                else{
                    array_push($array,array("iddriver"=>$pa->driver_id,"id"=>$pa->id,"mode"=>$pa->mode,"idparking"=>$pa->parking_id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","active"=>$pa->parking_end));
                }
            }
            $i++;}}
                return view('admin.driverlist',["driver"=>$p,"array"=>$array]);       
    }

}
