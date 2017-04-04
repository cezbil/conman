@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new task</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route("agendaAdd") }}">
                            {{csrf_field()}}

                            <div class="form-group"{{ $errors->has('name') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="name" class="col-4 control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}"  required>




                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group"{{ $errors->has('description') ? ' has-error' : '' }}>

                                <div class="col-md-6">
                                    <label for="description" class="col-4 control-label">description</label>
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description')}}"  required>




                                </div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group"{{ $errors->has('date_start') ? ' has-error' : '' }}>
                                <div class="col-md-6">
                                    <label for="description" class="col-4 control-label">date start</label>

                                <div class='input-group date datetimepicker'>

                                    <input  name="date_start" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div>
                                </div>
                            </div>
                            @if ($errors->has('date_start'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date_start') }}</strong>
                                    </span>
                            @endif



                            <div class="form-group"{{ $errors->has('date_finish') ? ' has-error' : '' }}>
                                <div class="col-md-6">
                                    <label for="description" class="col-4 control-label">date finish</label>

                                    <div class='input-group date datetimepicker'>

                                        <input name="date_finish" type='text' class="form-control" />
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('date_finish'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date_finish') }}</strong>
                                    </span>
                            @endif
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $(function () {
                                        $('.datetimepicker').datetimepicker({
                                            format:'YYYY-MM-DD HH:mm:ss'
                                        });
                                    });
                                });
                            </script>


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
                                    <a href="{{ route('manageAgendaPanel') }}">
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
