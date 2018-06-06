@extends('layouts.app')

@section('content')

    <div class = "row" style = "margin-top:50px;">
        <div class="col-12 col-md-8 d-block mx-auto">
            <div class="card ">
                <div class="card-header text-center colorBlue text-white">Les pronostics de {{$pseudo}}
                </div>
                <div class="card-body ">
                    <div class = "text-center mb-3">
                        @if(!empty($classement))


                        @foreach ($classement as $match)
                            <p  class = "row">
                <span class = " float-left col-md-2 d-none d-sm-block" >
                    @if ($match["resultat1"] == NULL)
                        <span class = "text-warning">En cours</span>
                    @else
                        <span class = "text-success">Terminé</span>
                    @endif
                </span>

                                <span class="  pr-0  col-3 text-right" >
                    <a class = "mr-1"  style="color:black;" >{{$match["equipe1"]}}</a>
                    <img src = "/img/country/{{$match["equipe1"]}}.png" >
                </span>
                                <!--<span class = "mt-2 text-center  col-3 ml-4 " > -->
                                <span class = "col-2 text-center">
                                <span    class = "text-center  " >
                                          @if (isset($match["pronostic1"]))
                                          {{$match["pronostic1"]}}
                                        @endif
                                </span> <i class = "mx-2"   >-</i>
                                <span    class = "text-center " >
                                          @if (isset($match["pronostic2"]))
                                        {{$match["pronostic2"]}}
                                    @endif
                                </span>
                                    <!--</span>--></span>
                <span class="  col-3 text-left pl-0">
                <img  src = "/img/country/{{$match["equipe2"]}}.png" >
                    <a class = "mr-1"  style="color:black">{{$match["equipe2"]}}</a>
                </span>
                @if ($match["resultat1"] <> NULL)
                <span class = "float-right col-2 text-right
                    @if ($match["points"] > 0)
                         text-success
                    @else
                          text-danger
                    @endif
                ">
                 <span style="white-space:nowrap">{{$match["points"]}}
                     @if ($match["points"] > 0)
                         points
                     @else
                         point
                     @endif
                 </span>
                 </span>
                 @endif
                                <br>

                            </p>
                            @endforeach
                            @else
                            <div class="alert alert-warning" >Aucun match pronostiqué </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
