
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
                    @if(!is_null($match->resultat1))
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
                <span class = "col-2 text-center ">
                    <a class = "text-dark" href = "/pronostics/pronostics_groupe/{{$match->id}}">
                        <strong style ="font-size:1.5em;">{{$match->resultat1}} - {{$match->resultat2}} </strong>
                    </a>
                </span>
                <span class="  mt-2 col-3 text-left pl-0">
                <img  class = "mb-1" src = "/img/country/{{$match->equipe2}}.png" >
                <a class = "mr-1" href = "/equipes/{{$match->id2}}" style="color:black">{{$match->equipe2}}</a>
                </span>
                @if(!is_null($match->resultat1))
                        <span class = "float-right col-2 text-right  "  >
                            <i
                                @if ($tableau[$i-1]["points"] == 0 )
                                    class = "text-danger"
                                @else
                                    class = "text-success"
                                @endif
                                    >{{$tableau[$i-1]["points"]}}

                                @if ($tableau[$i-1]["points"] > 0 )
                                points
                                @else
                                point
                                @endif

                            </i></br>
                                @if (property_exists($match,'pronostic1') && property_exists($match,'pronostic2') && ($match->pronostic1 >=0))
                                    {{$match->pronostic1}} - {{$match->pronostic2}}
                                @endif

                        </span>
                @endif
                        <br>

                </p>
                @php ($i++)
                @endforeach
                </div>
        </form>
    @endif

    <script>



    </script>