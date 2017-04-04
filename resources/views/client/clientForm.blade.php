@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Client</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("clientAdd") }}">
                            {{ csrf_field() }}

                            <div class="form-group"{{ $errors->has('company_name') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="company_name" class="col-4 control-label">Company name</label>
                                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name')}}"  required>




                                </div>
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <div class="form-group"{{ $errors->has('concert_funds') ? ' has-error' : '' }}>
                                <div class="col-md-6">

                                    <label for="concert_funds" class="col-4 control-label">Concert Funds</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-gbp"></span></div>
                                        <input id="concert_funds" type="text" class="form-control" name="concert_funds" placeholder="Concert Funds" value="{{ old('concert_funds')}}" required>

                                    </div>
                                    @if ($errors->has('concert_funds'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('concert_funds') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group"{{ $errors->has('street') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="street" class="col-4 control-label">street</label>
                                    <input id="street" type="text" class="form-control" name="street" value="{{ old('street')}}"  required>




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
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city')}}"  required>




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
                                    <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode')}}"  required>




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
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone')}}"  required>




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
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>

                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email')}}"  required>

                                    </div>


                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('representative_name') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="representative_name" class="col-4 control-label">representative name</label>
                                    <input id="representative_name" type="text" class="form-control" name="representative_name" value="{{ old('representative_name')}}"  required>




                                </div>
                                @if ($errors->has('representative_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('representative_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('representative_surname') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="representative_surname" class="col-4 control-label">representative surname</label>
                                    <input id="representative_surname" type="text" class="form-control" name="representative_surname" value="{{ old('representative_surname')}}"  required>




                                </div>
                                @if ($errors->has('representative_surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('representative_surname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group"{{ $errors->has('other_contact') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="other_contact" class="col-4 control-label">other contact</label>
                                    <textarea id="other_contact" type="textarea" class="form-control" name="other_contact">{{ old('other_contact')}}</textarea>



                                </div>
                                @if ($errors->has('other_contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_contact') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('spam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('spam') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                    <a href="{{ route('manageClientPanel') }}">
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
