@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Partner</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("partnerEdit") }}">
                            {{ csrf_field() }}

                            <div class="form-group"{{ $errors->has('name') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="name" class="col-4 control-label"> name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $name}}"  required>




                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>





                            <div class="form-group"{{ $errors->has('street') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="street" class="col-4 control-label">street</label>
                                    <input id="street" type="text" class="form-control" name="street" value="{{ $street}}"  required>




                                </div>
                                @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('city') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="city" class="col-4 control-label">city</label>
                                    <input id="city" type="text" class="form-control" name="city" value="{{ $city}}"  required>




                                </div>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('postcode') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="postcode" class="col-4 control-label">postcode</label>
                                    <input id="postcode" type="text" class="form-control" name="postcode" value="{{ $postcode}}"  required>




                                </div>
                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('phone') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="phone" class="col-4 control-label">mobile phone</label>
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $phone}}"  required>




                                </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('email') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="email" class="col-4 control-label">email</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-gbp"></span></div>

                                        <input id="email" type="text" class="form-control" name="email" value="{{ $email}}"  required>

                                    </div>


                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('type') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="type" class="col-4 control-label">type</label>
                                    <input id="type" type="text" class="form-control" name="type" value="{{ $type}}"  required>




                                </div>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <div class="form-group"{{ $errors->has('description') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="description" class="col-4 control-label">description</label>
                                    <textarea id="description" type="textarea" class="form-control" name="description" value="{{ $description}}"  >
                                    </textarea>



                                </div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <input id="id" type="hidden" name="id"  value="{{$id}}"  >

                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                    <a href="{{ route('managePartnerPanel') }}">
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
