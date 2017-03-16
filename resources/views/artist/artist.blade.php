
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Panel</div>

                    <div class="panel-body">
                        <a href="{{route("artistAddForm")}}">Add artist</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of Artists</div>

                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Initial Payment</th>
                                        <th>Full Payment</th>
                                        <th>Performance Time</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($artistRecords as $artistRecord)
                                        <tr>
                                            <td>{{$artistRecord->name}}</td>
                                            <td>{{$artistRecord->initial_payment}}</td>
                                            <td>{{$artistRecord->full_payment}}</td>
                                            <td>{{$artistRecord->performance_time}}</td>

                                            <td>
                                                <a href="{{ route('artistEditForm', $artistRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Edit
                                                    </div>
                                                </a>

                                                <a href="{{ route('artistDeleteForm', $artistRecord->id) }}">
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
@endsection
