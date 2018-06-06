@extends('layouts.app')

@section('content')
    <div class = "row" style = "margin-top:50px;">
        <div class="col-12 d-block mx-auto">
            <div class="card ">
                <div class="card-header text-center" ><h3>Pronostics pour le match</h3>
                    <span>{{$pronos->equipe1}} - {{$pronos->equipe2}}</span>
                </div>

                <div class="card-body ">
                    @if(!empty($tableau))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class= "text-center" >Pseudo</th>
                                    <th class= "text-center" >Pronostic</th>
                                    <th class= "text-center">Résultat</th>
                                    <th class= "text-center">Points</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $i = 1)
                                @foreach ($tableau as $key => $value)
                                    <tr>

                                        <td class="text-center">{{$value["pseudo"]}}</td>
                                        <td class="text-center"  > {{$value["pronostic1"]}} - {{$value["pronostic2"]}}   </td>
                                        <td class="text-center" >{{$pronos->resultat1}} - {{$pronos->resultat2}}  </td>
                                        <td class="text-center">{{$value["points"]}}</td>
                                    </tr>
                                    @php( $i++)
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning text-center" >Pas de pronostics disponibles pour ce match</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

