<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function addForm()
    {
        return view('client\clientForm');
    }

    public function panelClient(Request $request)
    {


        $clientQuery = client::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $clientRecords = $clientQuery->get();
        $clientRecordsQuantity = $clientRecords->count();


        return view('client\client', [
            'clientRecords' => $clientRecords,
            'clientRecordsQuantity' => $clientRecordsQuantity,
            'concertId' => $request->session()->get("concertId")

        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|string|max:255',
            'concert_funds' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'phone' => 'numeric|required|regex:/(07)[0-9]{9}/',
            'email' => 'email|required|string|max:255',
            'representative_name' => 'required|string|max:255',
            'representative_surname' => 'required|string|max:255',
            'other_contact' => 'string|max:255', // TODO: text? string? sprawdzic baze danych validacje
        ],
            ['concert_funds.regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
                'phone.regex'  => 'This field expects a phone number, has to be formatted : 07X XXX XX XXX', //TODO: jak zrobic custom rule do roznych regexow

                'date_format' => 'The entered :attribute was wrong!'
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $company_name = $request->input('company_name', '');
        $concert_funds = $request->input('concert_funds', '');
        $street = $request->input('street', '');
        $city = $request->input('city', '');
        $postcode = $request->input('postcode', '');
        $phone = $request->input('phone', '');
        $email = $request->input('email', '');
        $representative_name = $request->input('representative_name', '');
        $representative_surname = $request->input('representative_surname', '');
        $other_contact = $request->input('other_contact', '');


        $client = new Client();



        $client->concert_id = $concert_id;
        $client->company_name = $company_name;
        $client->concert_funds = $concert_funds;
        $client->street = $street;
        $client->city = $city;
        $client->postcode = $postcode;
        $client->phone = $phone;
        $client->email = $email;
        $client->representative_name = $representative_name;
        $client->representative_surname = $representative_surname;
        $client->other_contact = $other_contact;

        $client->save();

        return redirect()->route("manageClientPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Client::clientCheck($id, $request))
        {
            $clientQuery = Client::where('id', $id);

            $clientRecord = $clientQuery->first();

            $company_name = $clientRecord->company_name;
            $concert_funds = $clientRecord->concert_funds;
            $street = $clientRecord->street;
            $city = $clientRecord->city;
            $postcode = $clientRecord->postcode;
            $phone = $clientRecord->phone;
            $email = $clientRecord->email;
            $representative_name = $clientRecord->representative_name;
            $representative_surname = $clientRecord->representative_surname;
            $other_contact = $clientRecord->other_contact;

            return view('client\editclient', [
                'id' => $id,
                'company_name' => $company_name,
                'concert_funds' => $concert_funds,
                'street' => $street,
                'city' => $city,
                'postcode' => $postcode,
                'phone' => $phone,
                'email' => $email,
                'representative_name' => $representative_name,
                'representative_surname' => $representative_surname,
                'other_contact' => $other_contact,

            ]);
        }

        else
            return redirect()->route('home');
    }


    public function edit(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|string|max:255',
            'concert_funds' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'phone' => 'numeric|required|regex:/(07)[0-9]{9}/',
            'email' => 'email|required|string|max:255',
            'representative_name' => 'required|string|max:255',
            'representative_surname' => 'required|string|max:255',
            'other_contact' => 'string|max:255', // TODO: text? string? sprawdzic baze danych validacje
        ],
            ['concert_funds.regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
                'phone.regex'  => 'This field expects a phone number, has to be formatted : 07X XXX XX XXX ', //TODO: jak zrobic custom rule do roznych regexow

                'date_format' => 'The entered :attribute was wrong!'
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $company_name = $request->input('company_name', '');
        $concert_funds = $request->input('concert_funds', '');
        $street = $request->input('street', '');
        $city = $request->input('city', '');
        $postcode = $request->input('postcode', '');
        $phone = $request->input('phone', '');
        $email = $request->input('email', '');
        $representative_name = $request->input('representative_name', '');
        $representative_surname = $request->input('representative_surname', '');
        $other_contact = $request->input('other_contact', '');
        $id = $request->input('id', '');

        $client = Client::where('id', $id)->first();





        $client->company_name = $company_name;
        $client->concert_funds = $concert_funds;
        $client->street = $street;
        $client->city = $city;
        $client->postcode = $postcode;
        $client->phone = $phone;
        $client->email = $email;
        $client->representative_name = $representative_name;
        $client->representative_surname = $representative_surname;
        $client->other_contact = $other_contact;

        $client->save();

        return redirect()->route("manageClientPanel");
    }
    public function  deleteForm(Request $request, $id)
    {

        if(Client::clientCheck($id, $request))
        {
            return view('client\deleteclient', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Client::where('id', $id)->delete();
        return redirect()->route('manageClientPanel');

    }
}