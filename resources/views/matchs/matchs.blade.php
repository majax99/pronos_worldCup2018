@extends('layouts.app')

@section('content')


    <div class="container" id="homepage">
        <div class = "row" style = "margin-top:50px;">
            <div class="col-8 d-block mx-auto">
                <div class="card ">
                    <div class="card-header text-center">Matches</div>
                    @php ($i = 1)
                    <div class="card-body ">
                        @foreach ($matchs as $match)

                            @if ( $i <= 2 || $i == 5 || ($i>8 && $i<34 && $i%3 ==0 || $i==37 || $i == 41 || $i == 45))
                                <div class = "alert alert-success ">
                                    {{\Carbon\Carbon::setlocale(LC_TIME, 'fr')}}



                                    <span>{{ \Carbon\Carbon::parse($match->date_match)->format('l d F Y')}}   </span>
                                </div>
                            @endif
                            <p >
                                @if ($match->equipe1 != 'Russie')
                                    <span class = "float-left" style = "width:40%;"> {{ \Carbon\Carbon::parse($match->date_match)->format('H:i')}}</span>
                                @else
                                    <span class = "float-left text-success" style = "width:40%;" ><strong>MATCH FINI</strong> </span>
                                @endif
                                <span  class = "text-justify">
                  <img  src = "/img/country/{{$match->equipe1}}.png">
                                    <span class="ml-1">{{$match->equipe1}}</span>
                                    @if ($match->resultat1 == 0)
                                        VS
                                    @else
                                        <strong >{{$match->resultat1}} - {{$match->resultat2}} </strong>
                                    @endif

                                    <span class="mr-1">{{$match->equipe2}}</span>
                                    <img  src = "/img/country/{{$match->equipe2}}.png"></span>
                                <span class = "float-right">  {{$match->lieu}}      </span><br>
                            </p>
                            @php ($i++)
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
