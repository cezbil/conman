<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\partner;
use Illuminate\Http\Request;


class PartnerController extends Controller
{
    public function addForm()
    {
        return view('partner\partnerForm');
    }

    public function panelPartner(Request $request)
    {


        $partnerQuery = partner::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $partnerRecords = $partnerQuery->get();
        $partnerRecordsQuantity = $partnerRecords->count();


        return view('partner\partner', [
            'partnerRecords' => $partnerRecords,
            'partnerRecordsQuantity' => $partnerRecordsQuantity,
            'concertId' => $request->session()->get("concertId")

        ]);
    }

    public function add(Request $request)
    {

        /**
         * without this laravel would allow multiple requests to be sent
         * simply by clicking "add/edit" button multiple times
         * it introduces delay in adding and editing so it prevents spam
         **/
        if(isSpam($request, "addArtistSpam")){
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to add new partner"]);
            die();
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'phone' => 'numeric|required|regex:/(07)[0-9]{9}/',
            'email' => 'email|required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'string|max:255', // TODO: text? string? sprawdzic baze danych validacje
        ],
            [  'phone.regex'  => 'This field expects a phone number, has to be formatted : 07X XXX XX XXX', //TODO: jak zrobic custom rule do roznych regexow

            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $street = $request->input('street', '');
        $city = $request->input('city', '');
        $postcode = $request->input('postcode', '');
        $phone = $request->input('phone', '');
        $email = $request->input('email', '');
        $type = $request->input('type', '');
        $description = $request->input('description', '');


        $partner = new Partner();



        $partner->concert_id = $concert_id;
        $partner->name = $name;
        $partner->street = $street;
        $partner->city = $city;
        $partner->postcode = $postcode;
        $partner->phone = $phone;
        $partner->email = $email;
        $partner->type = $type;
        $partner->description = $description;
        $request->session()->regenerateToken();

        $partner->save();


        return redirect()->route("managePartnerPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Partner::partnerCheck($id, $request))
        {
            $partnerQuery = Partner::where('id', $id);

            $partnerRecord = $partnerQuery->first();

            $name = $partnerRecord->name;
            $street = $partnerRecord->street;
            $city = $partnerRecord->city;
            $postcode = $partnerRecord->postcode;
            $phone = $partnerRecord->phone;
            $email = $partnerRecord->email;
            $type = $partnerRecord->type;
            $description = $partnerRecord->description;

            return view('partner\editpartner', [
                'id' => $id,
                'name' => $name,
                'street' => $street,
                'city' => $city,
                'postcode' => $postcode,
                'phone' => $phone,
                'email' => $email,
                'type' => $type,
                'description' => $description,

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
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to edit partner"]);
            die();
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'phone' => 'numeric|required|regex:/(07)[0-9]{9}/',
            'email' => 'email|required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'string|max:255', // TODO: text? string? sprawdzic baze danych validacje
        ],
            [  'phone.regex'  => 'This field expects a phone number, has to be formatted : 07X XXX XX XXX', //TODO: jak zrobic custom rule do roznych regexow

            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $street = $request->input('street', '');
        $city = $request->input('city', '');
        $postcode = $request->input('postcode', '');
        $phone = $request->input('phone', '');
        $email = $request->input('email', '');
        $type = $request->input('type', '');
        $description = $request->input('description', '');


        $id = $request->input('id', '');

        $partner = Partner::where('id', $id)->first();



        $partner->concert_id = $concert_id;
        $partner->name = $name;
        $partner->street = $street;
        $partner->city = $city;
        $partner->postcode = $postcode;
        $partner->phone = $phone;
        $partner->email = $email;
        $partner->type = $type;
        $partner->description = $description;

        $partner->save();


        return redirect()->route("managePartnerPanel");




    }
    public function  deleteForm(Request $request, $id)
    {

        if(Partner::partnerCheck($id, $request))
        {
            return view('partner\deletepartner', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Partner::where('id', $id)->delete();
        return redirect()->route('managePartnerPanel');

    }
}