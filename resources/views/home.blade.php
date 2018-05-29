
@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
         {{ session('status') }}
    </div>
@endif



<div class=" offset-md-2 col-md-8 col-12 mt-5"  >

    <div class = " card">
        <div class="card-body text-center">
            <div class = "row">
                <img class = "offset-3 " src = "img/web_site/logo.jpg" >


        </div>
        </div>
    </div>
</div>

<!-- PROCHAINS MATCHS -->
<div class="row"><br>
    <div class="col-12  col-md-5   mt-5" >
        <div class="card ">
            <div class="card-header text-center text-white " style = "background-color:#28639F">Prochains matchs<br>
            </div>
            <div class="card-body"  style="height:250px;">
                <div class="row">
                    <div class=" col-12 "></div>

                    <table class="table  table-sm">
                        <tbody>

                        {{Jenssegers\Date\Date::setLocale('fr')}}

                        @if (count($matchs_prono) === 0)
                            <tr><td colspan="3" class = "text-center">Aucun match à pronostiquer.</td></tr>
                        @else
                        @foreach ($matchs_prono as $match_prono)
                        <tr>
                            <td>Le {{ Jenssegers\Date\Date::parse($match_prono->date_match)->format('d/m à H:i')}} </td>
                        <td style= "vertical-align:middle;">
                            <img  src = "/img/country/{{$match_prono->equipe1}}.png" style="vertical-align : -3px;">
                            <span class = "text-center">{{$match_prono->equipe1 }}-{{$match_prono->equipe2 }}</span>
                            <img  src = "img/country/{{$match_prono->equipe2 }}.png" style="vertical-align : -3px;" >
                        </td>
                        <td class="text-center" style= "vertical-align:middle;" ><img  src = "img/chaine/{{$match_prono->chaine_TV}}.png" ></td>
                         </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12  col-md-5 offset-md-2 mt-5" >
        <div class="card">
            <div class="card-header text-center text-white " style = "background-color:#28639F">Derniers résultats</div>
            <div class="card-body"  style="height:250px;">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-12 "></div>

                    <table class="table">
                        <tbody>

                        {{Jenssegers\Date\Date::setLocale('fr')}}
                        @if (count($matchs_end) === 0)
                            <tr><td colspan="3" class = "text-center">Aucun match commencé</td></tr>
                        @else
                        @foreach ($matchs_end as $match_end)
                            <tr>
                                <td>Le {{ Jenssegers\Date\Date::parse($match_end->date_match)->format('d/m')}} </td>
                                <!-- <td style= "vertical-align:middle;"> Le '.date_format($date,'d/m').' à '.$heure.'</td>-->
                                <td style= "vertical-align:middle;">
                                    <img  src = "/img/country/{{$match_end->equipe1}}.png" style="vertical-align : -3px;">
                                    <span class = "text-center">{{$match_end->equipe1 }}-{{$match_end->equipe2 }}</span>
                                    <img  src = "img/country/{{$match_end->equipe2 }}.png" style="vertical-align : -3px;" >
                                </td>
                                <td>
                                    <span class = "text-center">{{$match_end->resultat1 }}-{{$match_end->resultat2 }}</span>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection