<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 15/03/2017
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;


class AgendaController extends Controller
{
    public function addForm()
    {
        return view('agenda\agendaForm');
    }

    public function panelAgenda(Request $request)
    {


        $agendaQuery = Agenda::where('concert_id', $request->session()->get("concertId", function () {
            return redirect()->route("home");
        }))->where('todo', '!=', Agenda::DONE );

        $agendaRecords = $agendaQuery->get();
        $agendaRecordsQuantity = $agendaRecords->count();


        return view('agenda\agenda', [
            'agendaRecords' => $agendaRecords,
            'agendaRecordsQuantity' => $agendaRecordsQuantity,
            'concertId' => $request->session()->get("concertId"),
            'TODO' => Agenda::TODO,
            'INPROG' => Agenda::INPROG,
            'DONE' => Agenda::DONE,

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
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to add new task"]);
            die();
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date_finish' => 'required|date_format:"Y-m-d H:i:s"',
            'date_start' => 'required|date_format:"Y-m-d H:i:s"',
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $todo = Agenda::TODO;
        $description = $request->input('description', '');
        $date_finish = $request->input('date_finish', '');
        $date_start = $request->input('date_start', '');
        $agenda = new Agenda();



        $agenda->concert_id = $concert_id;
        $agenda->name = $name;
        $agenda->todo = $todo;
        $agenda->description = $description;
        $agenda->date_start = $date_start;
        $agenda->date_finish = $date_finish;

        $agenda->save();

        return redirect()->route("manageAgendaPanel");
    }
    public function editForm(Request $request, $id)
    {



        if(Agenda::agendaCheck($id, $request))
        {
            $agendaQuery = Agenda::where('id', $id);

            $agendaRecord = $agendaQuery->first();

            $name = $agendaRecord->name;
            $todo = $agendaRecord->todo;
            $description = $agendaRecord->description;
            $date_start= $agendaRecord->date_start;
            $date_finish= $agendaRecord->date_finish;



            return view('agenda\editagenda', [
                'id' => $id,
                'name' => $name,
                'todo' => $todo,
                'description' => $description,
                'date_start' => $date_start,
                'date_finish' => $date_finish,

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
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to edit task"]);
            die();
        }

        $this->validate($request, [
                'name' => 'required|string|max:255',
                'todo' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'date_finish' => 'required|date_format:"d-m-Y"',
                'date_start' => 'required|date_format:"d-m-Y"',
            ]
        );


        $concert_id = $request->session()->get("concertId");
        $name = $request->input('name', '');
        $todo = $request->input('todo', '');
        $description = $request->input('description', '');
        $date_finish = $request->input('date_finish', '');
        $date_start = $request->input('date_start', '');


        $id = $request->input('id', '');
        $agenda = Agenda::where('id', $id)->first();



        $agenda->concert_id = $concert_id;
        $agenda->name = $name;
        $agenda->todo = $todo;
        $agenda->description = $description;
        $agenda->date_start = $date_start;
        $agenda->date_finish = $date_finish;

        $agenda->save();

        return redirect()->route("manageAgendaPanel");





    }
    public function  deleteForm(Request $request, $id)
    {

        if(Agenda::agendaCheck($id, $request))
        {
            return view('agenda\deleteagenda', [
                'id' => $id,
            ]);
        }

        else
            return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id', '');
        Agenda::where('id', $id)->delete();
        return redirect()->route('manageAgendaPanel');

    }


    public function changestate(Request $request, $id)
    {
        $task = Agenda::findOrFail($id);

        if($task->todo == Agenda::INPROG)
        {
            $task->todo = Agenda::DONE;
        }
        elseif ($task->todo == Agenda::TODO){
            $task->todo = Agenda::INPROG;
        }

        $task->save();

        return redirect()->route('manageAgendaPanel');

    }
}