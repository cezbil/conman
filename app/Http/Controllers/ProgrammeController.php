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

class ProgrammeController extends Controller
{

    public function index(Request $request)
    {
        $concertId = $request->session()->get("concertId");
        $artists = Concert::find($concertId)->artist()->orderBy("performance_time")->get();

        return view('programme\programme', [
            "artists" => $artists

        ]);
    }
    public function getPdf(Request $request)
    {
        $concertId = $request->session()->get("concertId");
        $artists = Concert::find($concertId)->artist()->orderBy("performance_time")->get();
        return PDF::loadView('programme.pdf', [
            "artists" => $artists

        ])->stream("programme.pdf");
    }

}