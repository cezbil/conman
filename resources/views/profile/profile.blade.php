@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("profileEdit") }}">
                            {{ csrf_field() }}

                            <div class="form-group">

                                <div class="col-md-6">
                                    <label for="firstname" class="col-4 control-label">First name</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ isset($firstname) ? $firstname : ""  }}" required>

                                    <label for="lastname" class="col-4 control-label">Last Name</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ isset($lastname) ? $lastname : ""  }}" required>

                                    <label for="postcode" class="col-4 control-label">Postcode</label>

                                    <input id="postcode" type="text" class="form-control" name="postcode" value="{{ isset($postcode) ? $postcode : ""  }}" required>

                                    <label for="city" class="col-4 control-label">City</label>

                                    <input id="city" type="text" class="form-control" name="city" value="{{ isset($city) ? $city : ""  }}" required>

                                    <label for="street" class="col-4 control-label">Street</label>

                                    <input id="street" type="text" class="form-control" name="street" value="{{ isset($street) ? $street : ""  }}" required>

                                    <label for="phone" class="col-4 control-label">Phone Number</label>

                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ isset($phone) ? $phone : ""  }}" required>

                                </div>
                            </div>



                              <div class="form-group">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <a href="{{ route('home') }}">
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
