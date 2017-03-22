
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Programme</div><div class="panel-body">
                        <a href="{{route("pdf")}}">generate pdf</a>

                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Programme of the selected concert</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>



                                    <th>Performance Time</th>
                                    <th>Name</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($artists as $artist)
                                    <tr>

                                        <td>{{$artist->performance_time}}</td>
                                        <td>{{$artist->name}}</td>



                                        <td>


                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('manageConcertPanel', Session::get('concertId')) }}">
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
