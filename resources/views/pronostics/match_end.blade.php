
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
                    {{\Carbon\Carbon::setlocale(LC_TIME, 'fr')}}

                    <span>{{ \Carbon\Carbon::parse($match->date_match)->format('l d F Y')}}   </span>
                </div>
                @php ($date = \Carbon\Carbon::parse($match->date_match)->format('dmY'))
            @endif
            <p  class = "row">
                <span class = "float-left col-2" > {{ \Carbon\Carbon::parse($match->date_match)->format('H:i')}}</br>
                    <i style ="font-size:0.8em;">{{$match->type}}</i>
                </span>

                <span class = "float-left text-success col-2"  ><strong>MATCH FINI</strong> </span>


                <span class="ml-1  col-2 text-right"><a href = "/equipes/{{$match->id1}}" style="color:black" >{{$match->equipe1}}</a>
                    <img src = "/img/country/{{$match->equipe1}}.png" >
                </span>
                            <strong >{{$match->resultat1}} - {{$match->resultat2}} </strong>
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
    </form>
@endif

<script>



</script>