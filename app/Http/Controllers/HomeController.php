<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concertQuery = Concert::where('user_id', Auth::user()->id);
        $concertRecords = $concertQuery->get();
        $concertRecordsQuantity = $concertQuery->count();


        return view('home\home', [
            'concertRecords' => $concertRecords,
            'concertRecordsQuantity' => $concertRecordsQuantity
    ]);
    }
}
