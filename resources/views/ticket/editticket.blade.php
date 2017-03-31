@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Change quantity of the tickets left</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("ticketEdit") }}">
                            {{ csrf_field() }}


                            <div class="form-group"{{ $errors->has('quantity_left_left') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="quantity_left" class="col-4 control-label">Tickets still for sale</label>
                                    <input id="quantity_left" type="text" class="form-control" name="quantity_left" value="{{ old('quantity_left')}}"  required>




                                </div>
                            </div>
                            @if ($errors->has('quantity_left'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('quantity_left') }}</strong>
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
                                        Edit
                                    </button>
                                    <a href="{{ route('manageTicketPanel') }}">
                                        <div class="btn btn-default">
                                            Back
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <input id="id" type="hidden" name="id"  value="{{$id}}"  >

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
