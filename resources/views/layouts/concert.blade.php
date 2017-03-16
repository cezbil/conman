@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-info" role="alert">Chosen concert: {{ Session::get('concertName') }}</div>
            </div>
        </div>
    </div>
    @yield('content-con')
@endsection