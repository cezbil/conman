@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Ticket</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("ticketAdd") }}">
                            {{ csrf_field() }}

                            <div class="form-group"{{ $errors->has('description_initial') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="description" class="col-4 control-label">desctription</label>
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description')}}"  required>




                                </div>
                            </div>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif

                       
                            <div class="form-group"{{ $errors->has('amount') ? ' has-error' : '' }}>
                                <div class="col-md-6">

                                    <label for="amount" class="col-4 control-label">Price on ticket on ticket</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-gbp"></span></div>
                                        <input id="amount" type="text" class="form-control" name="amount" placeholder="Price on ticket on ticket" value="{{ old('amount') }}" required>

                                    </div>
                                    @if ($errors->has('amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group"{{ $errors->has('quantity_initial_initial') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="quantity_initial" class="col-4 control-label">initial Quantity of tickets</label>
                                    <input id="quantity_initial" type="text" class="form-control" name="quantity_initial" value="{{ old('quantity_initial')}}"  required>




                                </div>
                            </div>
                                @if ($errors->has('quantity_initial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity_initial') }}</strong>
                                    </span>
                                @endif
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
                                        Add
                                    </button>
                                    <a href="{{ route('manageTicketPanel') }}">
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
