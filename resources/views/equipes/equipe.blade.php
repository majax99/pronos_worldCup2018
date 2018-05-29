@extends('layouts.app')

@section('content')
<h3 class = "text-center">TOP 5 des joueurs </h3>
        <div class = "row" style = "margin-top:50px;">
                <div class="card text-center" >
                    <div class="card-header text-white colorBlue  ">
                            <div >
                                <h5 ><strong>Surnom :</strong> {{($data["team"]->nom)}} <img  src = "/img/country/{{$data["team"]->pays}}.png"></h5>
                                <h5><strong> Pays :</strong> {{($data["team"]->pays)}}</h5>
                                <h5> <strong>Classement FIFA : </strong>{{($data["team"]->rang)}}</h5>
                            </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="tableProno" class="table table-condensed">
                                    <thead>
                                    <th style="width:5%;"></th>
                                    <th class= "text-center" style="vertical-align:middle;">Prénom </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Nom </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Capitaine  </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($data["players"] as $team_players)

                                        <tr>

                                            <td class = "text-center " style="vertical-align:middle;"><img src = "/img/players/{{$team_players["prenom"]}}{{$team_players["nom"]}}.jpg"></td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{$team_players["prenom"]}}                             </td>
                                            <td class = "text-center" style="vertical-align:middle;"> {{$team_players["nom"]}}                             </td>                 
                                            @if ( $team_players["capitaine"] == 1)
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
@endsection
