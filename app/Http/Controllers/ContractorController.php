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
        /**
         * without this laravel would allow multiple requests to be sent
         * simply by clicking "add/edit" button multiple times
         * it introduces delay in adding and editing so it prevents spam
         **/
        if(isSpam($request, "addArtistSpam")){
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to add new contractor"]);
            die();
        }

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
            $initial_payment = $contractorRecord->initial_payment;
            $full_payment = $contractorRecord->full_payment;
            $type = $contractorRecord->type;
            $description = $contractorRecord->description;


            return view('contractor\editcontractor', [
                'id' => $id,
                'company_name' => $company_name,
                'initial_payment' => $initial_payment,
                'full_payment' => $full_payment,
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
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to edit contractor"]);
            die();
        }
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


        $id = $request->input('id', '');

        $contractor = Contractor::where('id', $id)->first();



        $contractor->concert_id = $concert_id;

        $contractor->company_name = $company_name;
        $contractor->type = $type;
        $contractor->initial_payment = $initial_payment;
        $contractor->full_payment = $full_payment;
        $contractor->description = $description;


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