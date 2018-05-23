@extends('layouts.app')

@section('content')
    <div class = "row" style = "margin-top:50px;">
        <div class="col-12 d-block mx-auto">
            <div class="card ">
                <div class="card-header text-center" >Classement général<br>
                </div>

                <div class="card-body ">
                    @if(!empty($classement))
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
                                @php( $i = 1)

                                <tr>@foreach ($classement as $key => $value)
                                    <td class= "text-left"><strong>{{$i}}</strong></td>
                                    <td class="text-center"><a href = "/classement/{{$key}}" style="color:black;" >{{$key}}</a></td>
                                    <td class="text-center"  > {{$value["points"]}}  </td>
                                    <td class="text-center" >{{$value["resultats"]}}</td>
                                    <td class="text-center">{{$value["score_exact"]}}</td>
                                </tr>
                                @php( $i++)
@endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning text-center" >Aucun match commencé sur ce tour</div>
                    @endif
                        </div>
                    </div>
                </div>
    </div>
@endsection

