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


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-info" role="alert">Chosen concert: {{ Session::get('concertName') }}</div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Estimate of the selected concert</div>


                <div class="panel-body">

                    <div class="table-responsive">
                        <h1>Clients</h1>
                        <table class="table table-striped">
                            <thead>
                            <tr>



                                <th>Concert funds</th>
                                <th>company Name</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($clients as $client)
                                <tr>

                                    <td>{{$client->concert_funds}}</td>
                                    <td>{{$client->company_name}}</td>



                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total Funds payed by Client: {{$cliSum}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="panel-body">
                    <h1>Artists</h1>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>



                                <th>Artist Full payment</th>
                                <th>Name</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($artists as $artist)
                                <tr>

                                    <td>{{$artist->full_payment}}</td>
                                    <td>{{$artist->name}}</td>



                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total cost of advertisement: {{$artistsCost}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="panel-body">
                    <h1>Advertisements</h1>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>


                                <th>Advertisement </th>
                                <th>cost</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($ads as $ad)

                                <tr>



                                    <td>{{$ad->name}}</td>
                                    <td>{{$ad->price * $ad->quantity}}</td>


                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total cost of advertisement: {{$adsCost}}</td>
                            </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="panel-body">
                    <h1>Contractors</h1>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>


                                <th>Company name </th>
                                <th>cost</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($contractors as $con)

                                <tr>



                                    <td>{{$con->company_name}}</td>
                                    <td>{{$con->full_payment}}</td>


                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total cost of contractors: {{$conSum}}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="panel-body">
                    <h1>Summary</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>


                                <th>CostName </th>
                                <th>cost</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Atrists</td>
                                <td>-{{$artistsCost}}</td>
                            </tr>

                            <tr>

                                <td>Advertisments</td>
                                <td>-{{$adsCost}}</td>

                            </tr>


                            <tr>
                                <td>Contractors</td>
                                <td>-{{$conSum}}</td>
                            </tr>
                            <tr>
                                <td>Clients</td>
                                <td>{{$cliSum}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Summary: {{$estimateSummary}}</td>
                            </tr>
                            </tbody>

                        </table>


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
