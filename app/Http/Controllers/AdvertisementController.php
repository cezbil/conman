<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;


class AdvertisementController extends Controller
{
    public function addForm()
    {
        return view('advertisement\advertisementForm');
    }

    public function panelAdvertisement(Request $request)
    {


        $advertisementQuery = Advertisement::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $advertisementRecords = $advertisementQuery->get();
        $advertisementRecordsQuantity = $advertisementRecords->count();


        return view('advertisement\advertisement', [
            'advertisementRecords' => $advertisementRecords,
            'advertisementRecordsQuantity' => $advertisementRecordsQuantity,
            'concertId' => $request->session()->get("concertId")

        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'quantity' => 'numeric|required|min:0|max:100000',
        ], ['regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $type = $request->input('type', '');
        $price = $request->input('price', '');
        $quantity = $request->input('quantity', '');
        $advertisement = new Advertisement();



        $advertisement->concert_id = $concert_id;
        $advertisement->name = $name;
        $advertisement->price = $price;
        $advertisement->type = $type;
        $advertisement->quantity = $quantity;

        $advertisement->save();

        return redirect()->route("manageAdvertisementPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Advertisement::advertisementCheck($id, $request))
        {
            $advertisementQuery = Advertisement::where('id', $id);

            $advertisementRecord = $advertisementQuery->first();

            $name = $advertisementRecord->name;
            $type = $advertisementRecord->type;
            $price = $advertisementRecord->price;
            $quantity= $advertisementRecord->quantity;

            return view('advertisement\editadvertisement', [
                'id' => $id,
                'name' => $name,
                'type' => $type,
                'price' => $price,
                'quantity' => $quantity,

            ]);
        }

        else
            return redirect()->route('home');
    }


    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'quantity' => 'numeric|required|min:0|max:100000',
        ], ['regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $type = $request->input('type', '');
        $price = $request->input('price', '');
        $quantity = $request->input('quantity', '');
        $id = $request->input('id', '');
        $advertisement = Advertisement::where('id', $id)->first();


        $advertisement->concert_id = $concert_id;
        $advertisement->name = $name;
        $advertisement->price = $price;
        $advertisement->type = $type;
        $advertisement->quantity = $quantity;

        $advertisement->save();

        return redirect()->route("manageAdvertisementPanel");





    }
    public function  deleteForm(Request $request, $id)
    {

        if(Advertisement::advertisementCheck($id, $request))
        {
            return view('advertisement\deleteadvertisement', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Advertisement::where('id', $id)->delete();
        return redirect()->route('manageAdvertisementPanel');

    }
}