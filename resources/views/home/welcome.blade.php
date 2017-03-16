@extends('layouts.app')
@section('styles')
    <link href="{{ URL::asset('css/welcome.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

@endsection
@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                ConMan
            </div>
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="col-md-4">
                        <h2>Manage Concerts!</h2>
                        <div class="caption">
                        <p>Manage your gigs, manage gigs for your clients, we've got all tha tools you need!</p>
                        </div>
                        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Make events stand out!</h2>
                        <div class="caption">
                        <p>Get your concert organised with no hassle, make it stand out  </p>
                        </div>
                            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Increase productivity!</h2>
                        <div class="caption">
                        <p>Create alerts, estimates and todo lists, no more forgetting about tasks ahead!</p>
                        </div>
                        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection