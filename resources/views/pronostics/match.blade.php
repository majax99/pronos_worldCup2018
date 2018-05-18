
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
<form class="form-horizontal" action="pronostics" method="post">
 
    {{ csrf_field() }}
    @foreach ($matchs as $match)
        @if($date != \Carbon\Carbon::parse($match->date_match)->format('dmY'))
            <div class = "alert alert-success ">
                {{\Carbon\Carbon::setlocale(LC_TIME, 'fr')}}

                <span>{{ \Carbon\Carbon::parse($match->date_match)->format('l d F Y')}}   </span>
            </div>
            @php ($date = \Carbon\Carbon::parse($match->date_match)->format('dmY'))
        @endif
        <p  class = "row">
            @if ($match->resultat1 == NULL)
                <span class = "float-left col-2" > {{ \Carbon\Carbon::parse($match->date_match)->format('H:i')}}</br>
                <i style ="font-size:0.8em;">{{$match->type}}</i>
                </span>
            @else
                <span class = "float-left text-success col-2"  ><strong>MATCH FINI</strong> </span>
            @endif
           
                <span class="ml-1  col-2 text-right"><a href = "/equipes/{{$match->id1}}" style="color:black" >{{$match->equipe1}}</a>
                    <img src = "/img/country/{{$match->equipe1}}.png" >
                </span>
                @if ($match->resultat1 == NULL && $choix == 'match_prono')
                <span class = "text-center  col-3 ml-4 ">
                                <input   class = "col-1" style="border:0;"  type="number"  name="1pronostic{{$match->id}}"  min="0"
                                   @if (!empty($match->pronostic1))
                                   value = {{$match->pronostic1}}
                                    @endif
                            > <i >-</i>
                                <input  class = "col-1" style="border:0;" type="number" name="2pronostic{{$match->id}}"   min="0"
                                       @if (!empty($match->pronostic2))
                                       value = {{$match->pronostic2}}
                                        @endif
                                >
                @elseif ($match->resultat1 != NULL && $choix == 'match_end')
                    <strong >{{$match->resultat1}} - {{$match->resultat2}} </strong>
                @endif
                </span>
                <span class="mr-1  col-2 text-left">
                <img  src = "/img/country/{{$match->equipe2}}.png" >
                    <a href = "/equipes/{{$match->id2}}" style="color:black">{{$match->equipe2}}</a>
                </span>
          

            <span class = "float-right col-2 text-right"  >
                            {{$match->lieu}}</br><i style ="font-size:0.8em;">{{$match->chaine_TV}}</i>
                            </span>
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

<script>



</script>