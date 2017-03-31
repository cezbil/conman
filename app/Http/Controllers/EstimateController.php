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
                $artistsCost += $artist->full_payment;
            }
        }

        $ads = Concert::find($concertId)->advertisement()->get();
        $adsSum = 0;
        if ($ads != null )
        {
            foreach($ads as $ad) {

                $adsSum += $ad->price * $ad->quantity;
            }
        }


        $contractors = Concert::find($concertId)->contractor()->get();
        $conSum = 0;
        if ($contractors !=null)
        {
            foreach($contractors as $con)
            {
                $conSum += $con->full_payment;
            }
        }




        $clients = Concert::find($concertId)->client()->get();
        $cliSum = 0;
        if ($clients !=null)
        {
            foreach($clients as $cli)
            {
                $cliSum += $cli->concert_funds;
            }
        }

        $estimateSummary = $cliSum - ($conSum + $artistsCost + $adsSum);
        
        return view('estimate\estimate', [
            "artists" => $artists,
            "ads" => $ads,
            "adsCost" => $adsSum,
            "artistsCost" => $artistsCost,
            "contractors" => $contractors,
            "conSum" => $conSum,
            "cliSum" => $cliSum,
            "clients" => $clients,
            "estimateSummary" => $estimateSummary,
        ]);
    }

    public function getPdf(Request $request)
    {

        ini_set('max_execution_time', 300);

        $concertId = $request->session()->get("concertId");

        $artists = Concert::find($concertId)->artist()->get();
        $artistsCost = 0;

        if ($artists != null )
        {
            foreach($artists as $artist) {
                $artistsCost += $artist->full_payment;
            }
        }

        $ads = Concert::find($concertId)->advertisement()->get();
        $adsSum = 0;
        if ($ads != null )
        {
            foreach($ads as $ad) {

                $adsSum += $ad->price * $ad->quantity;
            }
        }


        $contractors = Concert::find($concertId)->contractor()->get();
        $conSum = 0;
        if ($contractors !=null)
        {
            foreach($contractors as $con)
            {
                $conSum += $con->full_payment;
            }
        }




        $clients = Concert::find($concertId)->client()->get();
        $cliSum = 0;
        if ($clients !=null)
        {
            foreach($clients as $cli)
            {
                $cliSum += $cli->concert_funds;
            }
        }

        $estimateSummary = $cliSum - ($conSum + $artistsCost + $adsSum);

        return PDF::loadView('estimate\pdf', [

            "artists" => $artists,
            "ads" => $ads,
            "adsCost" => $adsSum,
            "artistsCost" => $artistsCost,
            "contractors" => $contractors,
            "conSum" => $conSum,
            "cliSum" => $cliSum,
            "clients" => $clients,
            "estimateSummary" => $estimateSummary,
        ])->stream("concert_estimate.pdf");


    }


}