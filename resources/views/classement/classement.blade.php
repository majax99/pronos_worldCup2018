@extends('layouts.app')

@section('content')
    <div class = "row" style = "margin-top:50px;">
        <div class="col-12 d-block mx-auto">
            <div class="card ">
                <div class="card-header text-center" >
                    <div class = "row">
                        <h4 class = "text-center col-12 col-md-4 offset-md-4">Classement général</h4>
                        @if(!empty($nb_matchs))
                            <i class = "col-md-3  offset-md-1 float-right">Après {{$nb_matchs->count()}}
                            @if($nb_matchs->count() > 1)
                                matchs joués
                            @else
                                match joué
                            @endif

                            </i>
                        @endif
                    </div>
                </div>

                <div class="card-body ">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class= "text-center" style="vertical-align:middle;">Pseudo</th>
                                    <th class= "text-center" style="vertical-align:middle;">Points</th>
                                    <th class= "text-center">Vainqueurs <br> trouvés</th>
                                    <th class= "text-center">Scores <br> exacts</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($classement))
                                    @php( $i = 1)
                                    @foreach ($classement as $key => $value)
                                    <tr>

                                        <td class= "text-left"><strong>{{$i}}</strong></td>
                                        <td class="text-center"><a href = "/classement/{{$key}}" style="color:black;" >{{$key}}</a></td>
                                        <td class="text-center"  > {{$value["points"]}}  </td>
                                        <td class="text-center" >{{$value["resultats"]}}</td>
                                        <td class="text-center">{{$value["score_exact"]}}</td>
                                    </tr>
                                    @php( $i++)
                                    @endforeach
                                @else
                                    @php( $i = 1)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class= "text-left"><strong>{{$i}}</strong></td>
                                            <td class="text-center">{{$user->pseudo}}</td>
                                            <td class="text-center"  >0</td>
                                            <td class="text-center" >0</td>
                                            <td class="text-center">0</td>
                                        </tr>
                                        @php( $i++)
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                        <!--<div class="alert alert-warning text-center" >Aucun match commencé sur ce tour</div>-->

                        </div>
                    </div>
                </div>
    </div>
@endsection

