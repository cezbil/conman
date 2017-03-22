<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;


class ArtistController extends Controller
{
    public function addForm()
    {
        return view('artist\artistForm');
    }

    public function panelArtist(Request $request)
    {


        $artistQuery = Artist::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $artistRecords = $artistQuery->get();
        $artistRecordsQuantity = $artistRecords->count();


        return view('artist\artist', [
            'artistRecords' => $artistRecords,
            'artistRecordsQuantity' => $artistRecordsQuantity,
            'concertId' => $request->session()->get("concertId")

        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'initial_payment' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'full_payment' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'performance_time' => 'required|date_format:H:i',
        ], ['regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
                'date_format' => 'The entered :attribute was wrong!'
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $initial_payment = $request->input('initial_payment', '');
        $full_payment = $request->input('full_payment', '');
        $time = $request->input('performance_time', '');
        $artist = new Artist();



        $artist->concert_id = $concert_id;
        $artist->name = $name;
        $artist->initial_payment = $initial_payment;
        $artist->full_payment = $full_payment;
        $artist->performance_time = $time;

        $artist->save();

        return redirect()->route("manageArtistPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Artist::artistCheck($id, $request))
        {
            $artistQuery = Artist::where('id', $id);

            $artistRecord = $artistQuery->first();

            $name = $artistRecord->name;
            $initial_payment = $artistRecord->initial_payment;
            $full_payment = $artistRecord->full_payment;
            $performance_time= $artistRecord->performance_time;

            return view('artist\editartist', [
                'id' => $id,
                'name' => $name,
                'initial_payment' => $initial_payment,
                'full_payment' => $full_payment,
                'performance_time' => $performance_time,

            ]);
        }

        else
            return redirect()->route('home');
    }


    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'initial_payment' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'full_payment' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'performance_time' => 'required|date_format:H:i', // TODO: z tym formatem nie updatuje bez zmiany
        ], ['regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
                'date_format' => 'The entered :attribute was wrong!'
            ]
        );


        // $user_id = Auth::id();
        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $initial_payment = $request->input('initial_payment', '');
        $full_payment = $request->input('full_payment', '');
        $time = $request->input('performance_time', '');
        $id = $request->input('id', '');
        $artist = Artist::where('id', $id)->first();



        $artist->concert_id = $concert_id;
        $artist->name = $name;
        $artist->initial_payment = $initial_payment;
        $artist->full_payment = $full_payment;
        $artist->performance_time = $time;

        $artist->save();

        return redirect()->route("manageArtistPanel");
    }
    public function  deleteForm(Request $request, $id)
    {

        if(Artist::artistCheck($id, $request))
        {
            return view('artist\deleteartist', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Artist::where('id', $id)->delete();
        return redirect()->route('manageArtistPanel');

    }
}