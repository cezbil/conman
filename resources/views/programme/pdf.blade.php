<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'ConMan') }}</title>

    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">



</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-info" role="alert">Chosen concert: {{ Session::get('concertName') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Programme of the selected concert</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>



                                    <th>Performance Time</th>
                                    <th>Name</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($artists as $artist)
                                    <tr>

                                        <td>{{$artist->performance_time}}</td>
                                        <td>{{$artist->name}}</td>



                                        <td>


                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
