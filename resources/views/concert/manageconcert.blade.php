@extends('layouts.concert')

@section('content-con')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Concert Management Panel</div>

                    <div class="panel-body">
                        <a href="{{route("editConcertForm")}}">Edit Concert</a><br>
                        <a href="{{route("manageArtistPanel")}}">Manage Artists</a><br>
                        <a href="{{route("manageClientPanel")}}">Manage Clients</a><br>
                        <a href="{{route("manageContractorPanel")}}">Manage Contractors</a><br>
                        <a href="{{route("managePartnerPanel")}}">Manage Partners</a><br>
                        <a href="{{route("manageAdvertisementPanel")}}">Manage Adverts</a><br>
                        <a href="{{route("programme")}}">Programme of the events</a><br>

                    </div>

                </div>

                <a href="{{ route('home') }}">
                    <div class="btn btn-default">
                        Back
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
