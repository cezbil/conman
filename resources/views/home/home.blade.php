@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Panel</div>

                    <div class="panel-body">
                        <a href="{{route("profile")}}">Edit profile</a><br>
                        <a href="{{route("addConcertForm")}}">Add concert</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of concerts</div>

                    <div class="panel-body">
                        @if($concertRecordsQuantity >0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Venue</th>
                                        <th>date</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>
                                    @foreach($concertRecords as $concertRecord)

                                        <tbody>
                                        <tr>
                                            <td>{{$concertRecord->name}}</td>
                                            <td>{{$concertRecord->venue}}</td>
                                            <td>{{$concertRecord->date}}</td>


                                            <td>
                                                <a href="{{ route('manageConcertPanel', $concertRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Manage
                                                    </div>
                                                </a>

                                                <a href="{{ route('deleteConcertForm', $concertRecord->id) }}">
                                                    <div class="btn btn-danger">
                                                        Delete
                                                    </div>
                                                </a>

                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                                @else
                                    No concerts to show
                                @endif
                            </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
