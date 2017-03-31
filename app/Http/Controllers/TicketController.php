<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;


class TicketController extends Controller
{
    public function addForm()
    {
        return view('ticket\ticketForm');
    }

    public function panelTicket(Request $request)
    {


        $ticketQuery = Ticket::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }));

        $ticketRecords = $ticketQuery->get();
        $ticketRecordsQuantity = $ticketRecords->count();


        return view('ticket\ticket', [
            'ticketRecords' => $ticketRecords,
            'ticketRecordsQuantity' => $ticketRecordsQuantity,
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
        if(isSpam($request, "addTicketSpam")){
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to add new ticket"]);
            die();
        }

        $this->validate($request, [
            'description' => 'required|string|max:255',
            'amount' => 'numeric|required|regex:/^\d*(\.\d{1,2})?$/|min:0|max:1000000000',
            'quantity_initial' => 'numeric|required|min:0|max:100000',
            'quantity_left' => 'numeric|required|min:0|max:100000',
        ], ['regex'  => 'The :attribute is currency therefore has to be formatted : x.xx or x.x or x ',
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $description = $request->input('description', '');
        $amount = $request->input('amount', '');
        $quantity_initial = $request->input('quantity_initial', '');
        $quantity_left = $request->input('quantity_left', '');
        $ticket = new Ticket();



        $ticket->concert_id = $concert_id;
        $ticket->description = $description;
        $ticket->amount = $amount;
        $ticket->quantity_initial = $quantity_initial;
        $ticket->quantity_left = $quantity_left;

        $ticket->save();

        return redirect()->route("manageTicketPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Ticket::ticketCheck($id, $request))
        {
            $ticketQuery = Ticket::where('id', $id);

            $ticketRecord = $ticketQuery->first();


            $description = $ticketRecord->description;
            $amount =   $ticketRecord->amount;
            $quantity_initial = $ticketRecord->quantity_initial;
            $quantity_left = $ticketRecord->quantity_left;
            return view('ticket\editticket', [
                'id' => $id,
                'description' => $description,
                'amount' => $amount,
                'quantity_initial' => $quantity_initial,
                'quantity_left' => $quantity_left,

            ]);
        }

        else
            return redirect()->route('home');
    }


    public function edit(Request $request)
    {


        $this->validate($request, [
            'quantity_left' => 'numeric|required|min:0|max:100000',
        ]
        );


        $concert_id = $request->session()->get("concertId");
        $quantity_left = $request->input('quantity_left', '');
        $id = $request->input('id', '');
        $ticket = Ticket::where('id', $id)->first();


        $ticket->concert_id = $concert_id;
        $ticket->quantity_left = $quantity_left;

        $ticket->save();





        return redirect()->route("manageTicketPanel");





    }
    public function  deleteForm(Request $request, $id)
    {

        if(Ticket::ticketCheck($id, $request))
        {
            return view('ticket\deleteticket', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Ticket::where('id', $id)->delete();
        return redirect()->route('manageTicketPanel');

    }
}