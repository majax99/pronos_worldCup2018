
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
    <div class="text-center p-2" ><input class=" btn btn-primary btn-lg" type="submit" value="Valider les pronostics" /></div>
    @foreach ($matchs as $match)
        @if($date != \Carbon\Carbon::parse($match->date_match)->format('dmY'))
            <div class = "alert alert-success ">
                {{Jenssegers\Date\Date::setLocale('fr')}}

                <span>{{ ucfirst (Jenssegers\Date\Date::parse($match->date_match)->format('l d F Y'))}}   </span>
            </div>
            @php ($date = Jenssegers\Date\Date::parse($match->date_match)->format('dmY'))
        @endif
        <p  class = "row">

                <span class = " float-left col-2 " > {{ Jenssegers\Date\Date::parse($match->date_match)->format('H:i')}}</br>
                <i style ="font-size:0.8em;">{{$match->type}}</i>
                </span>

                @php($equipe1 = str_replace("_", " ", $match->equipe1))
                @php($equipe2 = str_replace("_", " ", $match->equipe2))
                <span class="  mt-2 pr-0  col-3 text-right" >
                    <a class = "mr-1" href = "/equipes/{{$match->id1}}" style="color:black;" >{{$equipe1}}</a>
                    <img class = "mb-1"  src = "/img/country/{{$match->equipe1}}.png" >
                </span>
                <!--<span class = "mt-2 text-center  col-3 ml-4 " > -->
            <span class = "col-2 text-center">
                                <input    class = "text-center  form_number" style="border:0;border-radius:5px;background-color:#d4edda;height:40px;width:40px;font-size:1.3em"  type="text" onkeyup="this.value=this.value.replace(/[^\d]+/,'')" name="1pronostic{{$match->id}}"  min="0"
                                   @if (isset($match->pronostic1))
                                   value = {{$match->pronostic1}}
                                    @endif
                            > <i class = "mt-3  " >-</i>
                                <input   class = " text-center " style="border:0;border-radius:5px;background-color:#d4edda;height:40px;width:40px;font-size:1.3em" type="text" onkeyup="this.value=this.value.replace(/[^\d]+/,'')" name="2pronostic{{$match->id}}"   min="0"
                                       @if (isset($match->pronostic2))
                                       value = {{$match->pronostic2}}
                                        @endif
                                >
        <!--</span>--></span>
                <span class="  mt-2 col-3 text-left pl-0">
                <img  class = "mb-1" src = "/img/country/{{$match->equipe2}}.png" >
                    <a class = "mr-1" href = "/equipes/{{$match->id2}}" style="color:black">{{$equipe2}}</a>
                </span>
          

            <span class = "float-right col-2 text-right "  >
                            <span style="white-space:nowrap">{{$match->lieu}}</span></br><img  src = "/img/chaine/{{$match->chaine_TV}}.png" >
            </span>
            <br>

        </p>
        @php ($i++)
        @endforeach
        </div>
        <div class="text-center p-2" ><input class=" btn btn-primary btn-lg" type="submit" value="Valider les pronostics" /></div>
</form>
@endif

