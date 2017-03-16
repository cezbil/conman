@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Concert</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("concertEdit") }}">
                            {{ csrf_field() }}

                            <div class="form-group">

                                <div class="col-md-6">
                                    <label for="name" class="col-4 control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required>




                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">

                                    <label for="venue" class="col-4 control-label">Venue</label>
                                    <input id="venue" type="text" class="form-control" name="venue" value="{{$venue}}"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="date" class="col-4 control-label">Date</label>
                                    <input id="date" type="date" class="form-control" name="date" value="{{$date}}" required>
                                    <!-- TODO: validation -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="date" class="col-4 control-label">Time</label>
                                    <input id="time" type="time" class="form-control" name="time" value="{{$time}}" required>
                                </div>
                            </div>


                                    <input id="id" type="hidden" name="id"  value="{{$id}}"  >


                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                    <a href="{{ route('manageConcertPanel', $id) }}">
                                        <div class="btn btn-default">
                                            Back
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
