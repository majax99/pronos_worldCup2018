@extends('layouts.app')

@section('content')

    {{ dd($team) }}
    <div class="container" id="homepage">
        <div class = "row" style = "margin-top:50px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading panel-info">
                        <div class = "row">
                            <div class = "col-md-6 text-center">
                                <h5><strong>Name :</strong> {{($team[0]->team_name)}} <img  src = "/img/country/{{$team[0]->country}}.png"></h5>
                                <h5><strong> Country :</strong> {{($team[0]->country)}}</h5>
                                <h5> <strong>Rank : </strong>{{($team[0]->rank)}}</h5>
                            </div>
                            <div class = "col-md-6 text-center">
                                @php(
                                $win = rand(31-$team[0]->rank,31)
                                )
                                @php(
              $draw = rand(0,31 - $win)
               )
                                @php(
                                 $lose = 31 - $draw - $win
                                 )
                                <h5><strong>Matches Win :</strong> {{$win}} </h5>
                                <h5><strong> Matches Lose :</strong> {{$draw}}</h5>
                                <h5> <strong>Matches draw : </strong>{{$lose}}</h5>
                            </div>
                        </div>

                    </div>
                    <div class="panel-heading panel-info">
                        <h3 class = "text-center">List of players</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="tableProno" class="table table-condensed">
                                    <thead>
                                    <th style="width:5%;"></th>
                                    <th class= "text-center" style="vertical-align:middle;">First Name </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Last name </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Age  </th>
                                    <th class= "text-center" style="vertical-align:middle;"> weight </th>
                                    <th class= "text-center" style="vertical-align:middle;"> height  </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Captain  </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($team as $team_stat)
                                        <tr>

                                            <td class = "text-center " style="vertical-align:middle;"><img src = "/img/players/{{$team_stat->firstname}}{{$team_stat->lastname}}.jpg"></td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{$team_stat->firstname}}                             </td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{$team_stat->lastname}}                             </td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{$team_stat->age}}                             </td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{$team_stat->weight}}                             </td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{number_format($team_stat->height,2)}}m                             </td>
                                            @if ( $team_stat->capitain == 1)
                                                <td class="text-center" style="vertical-align:middle;"><img  src = "/img/players/capitaine.png"></td>
                                            @else
                                                <td></td>

                                            @endif

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
@endsection
