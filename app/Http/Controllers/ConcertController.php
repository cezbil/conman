<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConcertController extends Controller
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
    public function addForm()
    {
        return view('addconcert');
    }

    public function  editForm($id)
    {
        $concertsQuery = Concert::where('id', $id);
        $concertsNum = $concertsQuery->count();

        if($concertsNum == 1)
        {
            $concertRecord = $concertsQuery->first();

            $name = $concertRecord->name;
            $venue = $concertRecord->venue;
            $datetime = explode(" ", $concertRecord->date);

            return view('editconcert', [
                'id' => $id,
                'name' => $name,
                'venue' => $venue,
                'date' => $datetime[0],
                'time' => $datetime[1],
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function edit(Request $request)
    {
        $name = $request->input('name', '');
        $venue = $request->input('venue', '');
        $date = $request->input('date', '');
        $time = $request->input('time', '');
        $id = $request->input('id', '');

        $datetime = implode(" ", [$date, $time]);

        $concert = Concert::where('id', $id)->first();

        $concert->name = $name;
        $concert->venue = $venue;
        $concert->date = $datetime;

        $concert->save();

        return redirect()->route('home');
    }

    public function add(Request $request)
    {
        $user_id = Auth::id();

        $name = $request->input('name', '');
        $venue = $request->input('venue', '');
        $date = $request->input('date', '');
        $time = $request->input('time', '');
        $concert = new Concert;

        $datetime = implode(" ", [$date, $time]);


        $concert->name = $name;
        $concert->venue = $venue;
        $concert->date = $datetime;
        $concert->user_id = $user_id;

        $concert->save();

        return redirect()->route("home");
    }
}
