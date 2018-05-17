
@php ($i = 1)
@php ($date = 0)

@if (count($matchs) == 0)
    @if ($choix == 'match_prono')
        <div class="alert alert-warning" >Aucun match à pronostiquer sur ce tour</div>
    @elseif ($choix == 'match_end')
        <div class="alert alert-warning" >Aucun match commencé sur ce tour</div>
    @endif
@endif

@if (count($matchs) > 0)
<form class="form-horizontal" action="pronostics" method="post"  >
    {{ csrf_field() }}
    @foreach ($matchs as $match)
        @if($date != \Carbon\Carbon::parse($match->date_match)->format('dmY'))
            <div class = "alert alert-success ">
                {{\Carbon\Carbon::setlocale(LC_TIME, 'fr')}}

                <span>{{ \Carbon\Carbon::parse($match->date_match)->format('l d F Y')}}   </span>
            </div>
            @php ($date = \Carbon\Carbon::parse($match->date_match)->format('dmY'))
        @endif
        <p >
            @if ($match->resultat1 == '')
                <span class = "float-left" style = "width:30%;"> {{ \Carbon\Carbon::parse($match->date_match)->format('H:i')}}</span>

            @else
                <span class = "float-left text-success" style = "width:30%;" ><strong>MATCH FINI</strong> </span>
            @endif
            <span  >
              <img  src = "/img/country/{{$match->equipe1}}.png">
                                <span class="ml-1"><a href = "/equipes/{{$match->id1}}" style="color:black">{{$match->equipe1}}</a></span>
                @if ($match->resultat1 == 0)
                    VS
                @else
                    <strong >{{$match->resultat1}} - {{$match->resultat2}} </strong>
                @endif

                <span class="mr-1"><a href = "/equipes/{{$match->id2}}" style="color:black">{{$match->equipe2}}</a></span>
                                <img  src = "/img/country/{{$match->equipe2}}.png">
                            </span>

            <span class = "float-right" >
                            <input class = "text-center " type="number"  name="1pronostic{{$match->id}}" style="width: 30px;height:20px;" min="0"
                                   @if (!empty($match->pronostic1))
                                   value = {{$match->pronostic1}}
                                    @endif
                            > -
                                <input class = "text-center" type="number" name="2pronostic{{$match->id}}"  style="width: 30px;height:20px;" min="0"
                                       @if (!empty($match->pronostic2))
                                       value = {{$match->pronostic2}}
                                        @endif
                                >
                            </span><br>
            <span class = "float-left" style = "width:30%;"><i style ="font-size:0.8em;">{{$match->type}}</i></span>
            <span class = "float-right" style = "width:5%;"><i style ="font-size:0.8em;">{{$match->chaine_TV}}</i></span>
            <br>

        </p>
        @php ($i++)
        @endforeach
        </div>
        @if ($choix == 'match_prono')
        <div class="text-center p-2" ><input class=" btn btn-primary btn-lg" type="submit" value="Valider les pronostics" /></div>
        @endif
</form>
@endif