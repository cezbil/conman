
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Panel</div>

                    <div class="panel-body">
                        <a href="{{route("contractorAddForm")}}">Add contractor</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of Contractors</div>

                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Company Name</th>
                                        <th>Initial Payment</th>
                                        <th>Full Payment</th>
                                        <th>type</th>
                                        <th>Description</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($contractorRecords as $contractorRecord)
                                        <tr>
                                            <td>{{$contractorRecord->company_name}}</td>
                                            <td><i class="glyphicon glyphicon-gbp"></i>{{$contractorRecord->initial_payment}}</td>
                                            <td><i class="glyphicon glyphicon-gbp"></i> {{$contractorRecord->full_payment}}</td>
                                            <td>{{$contractorRecord->type}}</td>
                                            <td>{{$contractorRecord->description}}</td>

                                            <td>
                                                <a href="{{ route('contractorEditForm', $contractorRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Edit
                                                    </div>
                                                </a>

                                                <a href="{{ route('contractorDeleteForm', $contractorRecord->id) }}">
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
