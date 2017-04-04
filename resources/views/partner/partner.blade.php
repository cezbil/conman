
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Partners</div>

                    <div class="panel-body">
                        <a href="{{route("partnerAddForm")}}">Add partner</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of partners</div>

                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>type</th>
                                        <th>description</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>



                                        <tbody>
                                        @foreach($partnerRecords as $partnerRecord)
                                        <tr>
                                            <td>{{$partnerRecord->name}}</td>
                                            <td>{{$partnerRecord->street}} <br>{{$partnerRecord->city}} <br>{{$partnerRecord->postcode}}</td>
                                            <td>{{$partnerRecord->phone}}</td>
                                            <td>{{$partnerRecord->email}}</td>
                                            <td>{{$partnerRecord->type}} </td>
                                            <td>{{$partnerRecord->description}}</td>

                                            <td>
                                                <a href="{{ route('partnerEditForm', $partnerRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Edit
                                                    </div>
                                                </a>

                                                <a href="{{ route('partnerDeleteForm', $partnerRecord->id) }}">
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
