<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function voirPdf($id){
        session()->put('id',$id);
        try{
            $pdf=\App::make('dompdf.wrapper')->setPaper('a4','landscape');
            $pdf=loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        }
        catch(\Exception $e){
            return $e; 
        }
    }

   public function convert_orders_data_to_html(){
        $payment=\App\Models\payment::find(session()->get('id'));
        $parkingDuration=\App\Models\parkingDuration::select('parking_start','parking_end')
        ->join("drivers","drivers.id","=","parking_durations.driver_id")
        ->join("payments","payments.driver_id","=","drivers.id")
        ->where("payments.id","=",session()->get('id'))
        ->get();
        
        session()->forget('id');

        $duration=null;
        foreach($parkingDuration as $pd){
            $duration=date_diff($pd->parking_start,$pd->parking_end);
        }

        $array=array(
        "<div>
            <p>Nom du client: {$payment->driver->username}</p>
            <p>Adresse du parking: {$payment->parking->location}</p>
            <p>Date: {$payment->payment_date}</p>
        </div>",
        "
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Règlement</th>
                    <th>Durré du parking</th>
                    <th>Prix du parking</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{$payment->parking->picture}</th>
                    <th>{$payment->parking->rule}</th>
                    <th>{$duration->h}:{$duration->i}:{$duration->s}</th>
                    <th>{$payment->price}</th>
                </tr>
            </tbody>
        </table>
        ");

        $output="
        <div style=\"float:top\">
            <h1>REÇU</h1>
        </div>";

        foreach($array as $a){
            $output.=$a;
        }
        return $output;
    }    
}
