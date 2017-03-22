
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Panel</div>

                    <div class="panel-body">
                        <a href="{{route("clientAddForm")}}">Add client</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of clients</div>

                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Company Name</th>
                                        <th>concert funds</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>representative name</th>
                                        <th>other contact</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($clientRecords as $clientRecord)
                                        <tr>
                                            <td>{{$clientRecord->company_name}}</td>
                                            <td><i class="glyphicon glyphicon-gbp"></i>{{$clientRecord->concert_funds}}</td>
                                            <td>{{$clientRecord->street}} <br>{{$clientRecord->city}} <br>{{$clientRecord->postcode}}</td>
                                            <td>{{$clientRecord->phone}}</td>
                                            <td>{{$clientRecord->email}}</td>
                                            <td>{{$clientRecord->representative_name}} {{$clientRecord->representative_surname}}</td>
                                            <td>{{$clientRecord->other_contact}}</td>

                                            <td>
                                                <a href="{{ route('clientEditForm', $clientRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Edit
                                                    </div>
                                                </a>

                                                <a href="{{ route('clientDeleteForm', $clientRecord->id) }}">
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
