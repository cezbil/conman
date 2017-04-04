
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tickets</div>

                    <div class="panel-body">
                        <a href="{{route("ticketAddForm")}}">Add ticket</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of Tickets</div>

                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>description</th>
                                        <th>Price on ticket</th>
                                        <th>Initial quantity released</th>
                                        <th>number of tickets left</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($ticketRecords as $ticketRecord)
                                        <tr>
                                            <td>{{$ticketRecord->description}}</td>
                                            <td><i class="glyphicon glyphicon-gbp"></i>{{$ticketRecord->amount}}</td>
                                            <td>{{$ticketRecord->quantity_initial}}</td>
                                            <td>{{$ticketRecord->quantity_left}}</td>

                                            <td>
                                                <a href="{{ route('ticketEditForm', $ticketRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Edit
                                                    </div>
                                                </a>

                                                <a href="{{ route('ticketDeleteForm', $ticketRecord->id) }}">
                                                    <div class="btn btn-danger">
                                                        Delete
                                                    </div>
                                                </a>
                                            </td>
                                            <td>


                                            </td>

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
