@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Artist</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("artistAdd") }}">
                            {{csrf_field()}}

                            <div class="form-group"{{ $errors->has('name') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="name" class="col-4 control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}"  required>




                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('initial_payment') ? ' has-error' : '' }}>
                                <div class="col-md-6">

                                    <label for="initial_payment" class="col-4 control-label">Advance Payment</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-gbp"></span></div>
                                        <input id="initial_payment" type="text" class="form-control" name="initial_payment" placeholder="Advance Payment" value="{{ old('initial_payment')}}" required>

                                    </div>
                                    @if ($errors->has('initial_payment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('initial_payment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group"{{ $errors->has('full_payment') ? ' has-error' : '' }}>
                                <div class="col-md-6">

                                    <label for="full_payment" class="col-4 control-label">Full Payment</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-gbp"></span></div>
                                        <input id="full_payment" type="text" class="form-control" name="full_payment" placeholder="Full Payment" value="{{ old('full_payment') }}" required>

                                    </div>
                                    @if ($errors->has('full_payment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('full_payment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group"{{ $errors->has('performance_time') ? ' has-error' : '' }}>
                                <div class="col-md-6">
                                    <label for="performance_time" class="col-4 control-label">Performance time</label>
                                    <input id="performance_time" type="time" class="form-control" name="performance_time" value="{{ old('performance_time')}}" required>

                                </div>

                            </div>
                            @if ($errors->has('performance_time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('performance_time') }}</strong>
                                    </span>
                            @endif
                            @if ($errors->has('spam'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('spam') }}</strong>
                                    </span>
                            @endif

                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                    <a href="{{ route('manageArtistPanel') }}">
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
