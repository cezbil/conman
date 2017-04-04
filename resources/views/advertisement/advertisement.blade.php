
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Adverts</div>

                    <div class="panel-body">
                        <a href="{{route("advertisementAddForm")}}">Add advertisement</a>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">List of Advertisements</div>

                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($advertisementRecords as $advertisementRecord)
                                        <tr>
                                            <td>{{$advertisementRecord->name}}</td>
                                            <td>{{$advertisementRecord->type}}</td>
                                            <td><i class="glyphicon glyphicon-gbp"></i>{{$advertisementRecord->price}}</td>
                                            <td>{{$advertisementRecord->quantity}}</td>

                                            <td>
                                                <a href="{{ route('advertisementEditForm', $advertisementRecord->id) }}">
                                                    <div class="btn btn-primary">
                                                        Edit
                                                    </div>
                                                </a>

                                                <a href="{{ route('advertisementDeleteForm', $advertisementRecord->id) }}">
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
