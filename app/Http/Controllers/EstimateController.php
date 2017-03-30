<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 22/03/2017
 * Time: 16:00
 */
namespace App\Http\Controllers;

use App\Concert;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class EstimateController extends Controller
{

    public function index(Request $request)
    {
        $concertId = $request->session()->get("concertId");

        $artists = Concert::find($concertId)->artist()->get();
        $artistsCost = 0;

        if ($artists != null )
        {
            foreach($artists as $artist) {
                $artistsCost -= $artist->full_payment;
            }
        }

        $ads = Concert::find($concertId)->advertisement()->get();
        $adsSum = 0;
        if ($ads != null )
        {
            foreach($ads as $ad) {

                $adsSum = $ad->price * $ad->quantity;
            }
        }


        $contractors = Concert::find($concertId)->contractor()->get();

        $clients = Concert::find($concertId)->contractor()->get();
//TODO: tickets
        return view('estimate\estimate', [
            "artists" => $artists,
            "ads" => $ads,
            "adsCost" => $adsSum,
            "contractors" => $contractors,
            "clients" => $clients,
        ]);
    }



}