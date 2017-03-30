@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Advertisement</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("advertisementEdit") }}">
                            {{ csrf_field() }}

                            <div class="form-group"{{ $errors->has('name') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="name" class="col-4 control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{$name}}"  required>




                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('type') ? ' has-error' : '' }}>
                                <div class="col-md-6">

                                    <label for="type" class="col-4 control-label">Type</label>

                                    <input id="type" type="text" class="form-control" name="type" placeholder="Type of ads" value="{{$type}}" required>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group"{{ $errors->has('price') ? ' has-error' : '' }}>
                                <div class="col-md-6">

                                    <label for="price" class="col-4 control-label">Price</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-gbp"></span></div>
                                        <input id="price" type="text" class="form-control" name="price" placeholder="Price" value="{{$price }}" required>

                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group"{{ $errors->has('quantity') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="quantity" class="col-4 control-label">Quantity</label>
                                    <input id="quantity" type="text" class="form-control" name="quantity" value="{{$quantity}}"  required>




                                </div>
                            </div>
                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                            @endif
                            @if ($errors->has('spam'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('spam') }}</strong>
                                    </span>
                            @endif

                                    <input id="id" type="hidden" name="id"  value="{{$id}}"  >


                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                    <a href="{{ route('manageAdvertisementPanel') }}">
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
