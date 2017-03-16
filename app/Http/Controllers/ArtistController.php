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
    public function form()
    {
        return view('artistAdd');
    }
    public function panelArtist(Request $request)
    {
        $artistQuery = Artist::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $artistRecords = $artistQuery->get();
        $artistRecordsQuantity = $artistRecords->count();

/*$z = $request->session()->get("concertId");
var_dump($z);
die();*/
        return view('artist\artist', [
            'artistRecords' => $artistRecords,
            'artistRecordsQuantity' => $artistRecordsQuantity,
            'concertId' => $request->session()->get("concertId")

        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'initial_payment' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'full_payment' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'performance_time' => 'required',
        ]);

        // $user_id = Auth::id();
        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $initial_payment = $request->input('initial_payment', '');
        $full_payment = $request->input('full_payment', '');
        $time = $request->input('performance_time', '');
        $artist = new Artist();



        /*
                ->name = $name;
                ->venue = $venue;
                $concert->performance_time= $time;
                $concert->user_id = $user_id;*/

        //   $concert->save();
        $artist->concert_id = $concert_id;
        $artist->name = $name;
        $artist->initial_payment = $initial_payment;
        $artist->full_payment = $full_payment;
        $artist->performance_time = $time;

        $artist->save();

        return redirect()->route("manageArtistPanel");
    }
    public function editForm()
    {
        return view('artist');
    }

    public function edit()
    {
        return view('artist');
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