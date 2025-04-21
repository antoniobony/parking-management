<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Carbon\Carbon;
use App\Models\parkingDuration;
use App\Models\payment;
require_once '../vendor/autoload.php';

class ParkingDurationController extends Controller
{
    public $timezone='Africa/Addis_Ababa';


    public function parkingStart(Request $request,string $driver,string $parking)
    {
        $dt = Carbon::now($this->timezone);
        $p=\App\Models\parking::select("place")->where("id",$parking)->get();
        foreach($p as $pa){
            $p=$pa->place;
        }
        $n=\App\Models\parkingDuration::where("parking_end",null)->count();
            if($p>=$n){
            $validate=Validator::make($request->all(),[
                "carnumber"=>"required"
            ])->validate();
            $pD=\App\Models\parkingDuration::create([
            "parking_start"=>$dt->format('d-m-Y H:i:s'),
            "parking_id"=>$parking,
            "driver_id"=>$driver,
            "carNumber"=>$request->carnumber
            ]);
            session()->flash('info','Le parking a commencé');
            return redirect()->back()->with(["parkingduration"=>1]);
        }
            session()->flash('info','Pas de place disponible');
            return redirect()->back();
    }

    public function parkingEnd(string $id){
        $dt = Carbon::now($this->timezone);
        $pD=\App\Models\parkingDuration::where("id",$id)->update(["parking_end"=>$dt->format('d-m-Y H:i:s')]);
        $p=\App\Models\parkingDuration::find($id);
        return redirect()->route('driver.drivertracking',['driver'=>$p->driver_id]);
    }

    public function showparking(string $driver){
        $n=\App\Models\parkingDuration::where("parking_end",null)->count();
        $parkingduration=\App\Models\parkingDuration::where("driver_id",$driver)->whereNull("parking_end")->get();
        $pa=null;
        foreach($parkingduration as $p){
            $pa=$p->id;
        }
        return view('driver.showparking',["driver"=>$driver,"parking"=>\App\Models\parking::all(),"parkingduration"=>$pa]);
    }

    public function drivertracking(string $driver){
        $array=null;
        $dt = Carbon::now($this->timezone);
        $parkingduration=\App\Models\parkingDuration::where("driver_id",$driver)->get();
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
                    $array=$pa->parking_end==null?array(array("id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end,"montant"=>$pa->parking->price_minute*(($diff->h*60)+$diff->i))):array(array("id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end,"montant"=>$price));}
                else{
                    $array=array(array("id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end));
                }
            }
            else{
                if($pa->parking->mode!=="free"){
                   if($pa->parking_end==null) {
                    array_push($array,array("id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end,"montant"=>$pa->parking->price_minute*(($diff->h*60)+$diff->i)));
                    }
                   else{array_push($array,array("id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end,"montant"=>$price));}
                }
                else{
                    array_push($array,array("id"=>$pa->id,"mode"=>$pa->parking->mode,"idparking"=>$pa->parking->id,"carNumber"=>$pa->carNumber,"duration"=>$h.":".$m,"parking_date"=>"{$date}","place"=>$pa->parking->location,"picture"=>$pa->parking->picture,"active"=>$pa->parking_end));
                }
            }
            $i++;
        }
        return view('driver.parkingtracking',["p"=>$array,"driver"=>$driver]);
        }

    public function checkout(string $id){
        $dt = Carbon::now($this->timezone);
        $p=\App\Models\parkingDuration::find($id);
            $date1 =date_create($p->parking_start);
            $date2=date_create($dt->format('d-m-Y H:i:s'));
            $diff =date_diff($date1, $date2); 
            $montant=$p->parking->price_minute*(((float)$diff->h*60)+(float)$diff->i);
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            session(["montant"=>$montant,"duration"=>$diff,"id"=>$p->id]);
            $session=\Stripe\Checkout\Session::create([
                'line_items'=>[[
                    'price_data'=>[
                        'currency'=>'usd',
                        'product_data'=>[
                            'name'=>$p->parking->location,
                        ],
                        'unit_amount' =>$montant*100
                    ],
                    'quantity'=>1
                ]],
                'mode'=>'payment',
                'success_url'=>route('driver.checkout.success',[],true)."?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url'=>route('driver.checkout.cancel',[],true),
            ]);
        return redirect($session->url);
    }

    public function success(Request $request){
        $dt = Carbon::now($this->timezone);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $Session_id=$request->session_id;
        try{
        $session=\Stripe\Checkout\Session::retrieve($Session_id);
        
        if(!$session){
            throw new NotFoundHttpException;
        }
        
        $payment=\App\Models\payment::create([
            'payment_date'=>$dt->format('d-m-Y H:i:s'),
            'price'=>session()->get('montant')."$",
            'parking_duration_id'=>session()->get('id'),
            'customer'=>'antonio',
            'session_id'=>$Session_id
        ]);
        
        $pD=\App\Models\parkingDuration::where("id",session()->get('id'))->update(["parking_end"=>$dt->format('d-m-Y H:i:s')]);
        $p=\App\Models\parkingDuration::find(session()->get('id'));
        $data=array(
            "image"=>$p->parking->image,
            "username"=>$p->driver->username,
            "location"=>$p->parking->location,
            "price"=>session()->get('motant').'$',
            "duration"=>session()->get('duration'),
            "date"=>$dt->format('d-m-Y H:i:s'),
            "rule"=>$p->parking->rule
        );  
        }
        catch(Exception $e){
            throw new NotFoundHttpException();
        }

        return redirect()->route('driver.drivertracking',['driver'=>$p->driver_id]);
    }
     
}

