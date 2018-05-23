
@php ($i = 1)
@php ($date = 0)

@if (count($matchs) == 0)
        <div class="alert alert-warning" >Aucun match commencé sur ce tour</div>
@endif

@if (count($matchs) > 0)
    <form class="form-horizontal" action="pronostics" method="post">

        {{ csrf_field() }}
        @foreach ($matchs as $match)
            @if($date != \Carbon\Carbon::parse($match->date_match)->format('dmY'))
                <div class = "alert alert-success ">
                    {{Jenssegers\Date\Date::setLocale('fr')}}

                    <span>{{ ucfirst (Jenssegers\Date\Date::parse($match->date_match)->format('l d F Y'))}}   </span>
                </div>
                @php ($date = \Carbon\Carbon::parse($match->date_match)->format('dmY'))
            @endif
            <p  class = "row">
                <span class = "float-left col-2 nowrap" style ="font-size:0.8em;">
                    @if($match->resultat1 != '')
                        <span class = "text-success "  ><strong>MATCH FINI</strong> </span>
                    @else
                        <span class = " text-warning "  ><strong>MATCH EN COURS</strong> </span>
                    @endif
                    </br>
                    <i >{{$match->type}}</i>
                </span>

                <span class="  mt-2 pr-0  col-3 text-right" >
                    <a class = "mr-1" href = "/equipes/{{$match->id1}}" style="color:black;" >{{$match->equipe1}}</a>
                    <img class = "mb-1"  src = "/img/country/{{$match->equipe1}}.png" >
                </span>
                <span class = "col-2 text-center mt-2">
                    <strong >{{$match->resultat1}} - {{$match->resultat2}} </strong>
                </span>
                <span class="  mt-2 col-3 text-left pl-0">
                <img  class = "mb-1" src = "/img/country/{{$match->equipe2}}.png" >
                <a class = "mr-1" href = "/equipes/{{$match->id2}}" style="color:black">{{$match->equipe2}}</a>
                </span>
                        <span class = "float-right col-2 text-right"  >
                                @if (method_exists($match,'pronostic1') && method_exists($match,'pronostic2') )
                                    {{$match->pronostic1}} - {{$match->pronostic2}}
                                @endif
                                </br><i style ="font-size:0.8em;">{{$tableau[$i-1]["points"]}} points</i>

                        </span>
                        <br>

                </p>
                @php ($i++)
                @endforeach
                </div>
        </form>
    @endif

    <script>



    </script>