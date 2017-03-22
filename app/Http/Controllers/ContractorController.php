<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\contractor;
use Illuminate\Http\Request;


class ContractorController extends Controller
{
    public function addForm()
    {
        return view('contractor\contractorForm');
    }

    public function panelContractor(Request $request)
    {


        $contractorQuery = contractor::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $contractorRecords = $contractorQuery->get();
        $contractorRecordsQuantity = $contractorRecords->count();


        return view('contractor\contractor', [
            'contractorRecords' => $contractorRecords,
            'contractorRecordsQuantity' => $contractorRecordsQuantity,
            'concertId' => $request->session()->get("concertId")

        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|string|max:255',
            'initial_payment' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'full_payment' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'type' => 'required|string|max:255',

            'description' => 'string|max:255', // TODO: text? string? sprawdzic baze danych validacje
        ],
            ['regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',]
        );

        $concert_id = $request->session()->get("concertId");

        $company_name = $request->input('company_name', '');
        $type = $request->input('type', '');
        $initial_payment = $request->input('initial_payment', '');
        $full_payment = $request->input('full_payment', '');
        $description = $request->input('description', '');

        $contractor = new Contractor();


        $contractor->concert_id = $concert_id;

        $contractor->company_name = $company_name;
        $contractor->type = $type;
        $contractor->initial_payment = $initial_payment;
        $contractor->full_payment = $full_payment;
        $contractor->description = $description;


        $contractor->save();

        return redirect()->route("manageContractorPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Contractor::contractorCheck($id, $request))
        {
            $contractorQuery = Contractor::where('id', $id);

            $contractorRecord = $contractorQuery->first();

            $company_name = $contractorRecord->company_name;
            $concert_funds = $contractorRecord->concert_funds;
            $street = $contractorRecord->street;
            $city = $contractorRecord->city;
            $postcode = $contractorRecord->postcode;
            $phone = $contractorRecord->phone;
            $email = $contractorRecord->email;
            $representative_name = $contractorRecord->representative_name;
            $representative_surname = $contractorRecord->representative_surname;
            $other_contact = $contractorRecord->other_contact;

            return view('contractor\editcontractor', [
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

        $contractor = Contractor::where('id', $id)->first();





        $contractor->company_name = $company_name;
        $contractor->concert_funds = $concert_funds;
        $contractor->street = $street;
        $contractor->city = $city;
        $contractor->postcode = $postcode;
        $contractor->phone = $phone;
        $contractor->email = $email;
        $contractor->representative_name = $representative_name;
        $contractor->representative_surname = $representative_surname;
        $contractor->other_contact = $other_contact;

        $contractor->save();

        return redirect()->route("manageContractorPanel");
    }
    public function  deleteForm(Request $request, $id)
    {

        if(Contractor::contractorCheck($id, $request))
        {
            return view('contractor\deletecontractor', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Contractor::where('id', $id)->delete();
        return redirect()->route('manageContractorPanel');

    }
}