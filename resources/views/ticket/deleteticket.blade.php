@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Delete Ticket</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("ticketDelete") }}">
                            {{ csrf_field() }}





                            <input id="id" type="hidden" name="id"  value="{{$id}}" >


                            <div class="form-group">
                                <div class="col-md-4 ">
                                    Do you want to delete?
                                    <button type="submit" class="btn btn-primary">
                                        Delete
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
