@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Contractor</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("contractorAdd") }}">
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

                            <div class="form-group"{{ $errors->has('type') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="type" class="col-4 control-label">type</label>
                                    <input id="type" type="text" class="form-control" name="type" value="{{ old('type')}}"  required>




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
                                    <textarea id="description" type="textarea" class="form-control" name="description" value="{{ old('description')}}"  required>
                                    </textarea>



                                </div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                    <a href="{{ route('manageContractorPanel') }}">
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
