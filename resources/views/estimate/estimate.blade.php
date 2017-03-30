
@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Estimate</div><div class="panel-body">
                        <a href="{{route("estimatePdf")}}">generate pdf of estimate</a>

                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Estimate of the selected concert</div>

{{$ads}}

                    @foreach($ads as $ad)




                            {{$ad->name}}

                            @endforeach
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>



                                    <th>Artist Full payment</th>
                                    <th>Name</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($artists as $artist)
                                    <tr>

                                        <td>{{$artist->full_payment}}</td>
                                        <td>{{$artist->name}}</td>



                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>


                                    <th>Advertisement </th>
                                    <th>cost</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($ads as $ad)

                                    <tr>



                                        <td>{{$ad}}</td>
                                        <td>{{$adsCost}}</td>


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
    </div>

@endsection
