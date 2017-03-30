
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Panel</div>

                    <div class="panel-body">
                        <a href="{{route("agendaAddForm")}}">Add agenda</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of Agendas</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>TODO</th>
                                    <th>description</th>
                                    <th>start date</th>
                                    <th>finish date</th>
                                    <th>Change state/Delete</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($agendaRecords as $agendaRecord)
                                    <tr>
                                        <td>{{$agendaRecord->name}}</td>
                                        <td>
                                        @if($agendaRecord->todo == $INPROG)
                                            <a href="/">
                                                <div class="btn btn-warning">
                                                    In progress
                                                </div>
                                            </a>
                                        @elseif($agendaRecord->todo == $DONE)
                                            <a href="/">
                                                <div class="btn btn-success">
                                                    Finished
                                                </div>
                                            </a>
                                        @elseif($agendaRecord->todo == $TODO)

                                                <a href="/">
                                                    <div class="btn btn-danger">
                                                        Not started
                                                    </div>
                                                </a>

                                            </td>
                                        @endif
                                        <td>{{$agendaRecord->description}}</td>
                                        <td>{{$agendaRecord->date_start}}</td>
                                        <td>{{$agendaRecord->date_finish}}</td>
                                        <td>


                                            <a href="{{ route('agendaDeleteForm', $agendaRecord->id) }}">
                                                <div class="btn btn-primary btn-danger">
                                                    Delete
                                                </div>
                                            </a>
                                            @if($agendaRecord->todo == $INPROG)

                                            <a href="{{ route('changestate', $agendaRecord->id) }}">
                                                <div class="btn btn-success">
                                                    Mark as Finished
                                                </div>
                                            </a>
                                                @elseif($agendaRecord->todo == $TODO)
                                                <a href="{{ route('changestate', $agendaRecord->id) }}">
                                                    <div class="btn btn-warning">
                                                        Mark as In progress
                                                    </div>
                                                </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('manageConcertPanel', $concertId) }}">
                                <div class="btn btn-default">
                                    Back
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
