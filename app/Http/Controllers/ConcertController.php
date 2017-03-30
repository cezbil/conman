<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConcertController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if(Concert::concertCheck($id))
        {
            $concertRecord = Concert::where("id", $id)->first();

            session(["concertName" => $concertRecord->name, "concertId" => $concertRecord->id]);

            return view('concert\manageconcert', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');


    }
    public function addForm()
    {
        return view('concert\addconcert');
    }


    public function  editForm(Request $request)
    {
        $id = $request->session()->get('concertId');

        if(Concert::concertCheck($id))
        {
            $concertsQuery = Concert::where('id', $id);

            $concertRecord = $concertsQuery->first();

            $name = $concertRecord->name;
            $venue = $concertRecord->venue;
            $datetime = explode(" ", $concertRecord->date);

            $datetime[1] = explode(":", $datetime[1]);
            $datetime[1] = $datetime[1][0] . ":" . $datetime[1][1];

            return view('concert\editconcert', [
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
        /**
         * without this laravel would allow multiple requests to be sent
         * simply by clicking "add/edit" button multiple times
         * it introduces delay in adding and editing so it prevents spam
         **/
        if(isSpam($request, "addArtistSpam")){
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to edit concert"]);
            die();
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date_format:"Y-m-d"',
            'time' => 'required|date_format:"H:i"', //
        ], ['date_format' => 'The entered :attribute was wrong!',
        ]);

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
        /**
         * without this laravel would allow multiple requests to be sent
         * simply by clicking "add/edit" button multiple times
         * it introduces delay in adding and editing so it prevents spam
         **/
        if(isSpam($request, "addArtistSpam")){
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to add new concert"]);
            die();
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date_format:"Y-m-d"',
            'time' => 'required|date_format:"H:i"',
        ], ['date_format' => 'The entered :attribute was wrong!',
            ]);

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

    public function  deleteForm(Request $request, $id)
    {

        if(Concert::concertCheck($id))
        {
            return view('concert\deleteconcert', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Concert::where('id', $id)->delete();
        return redirect()->route('home');

    }

}
