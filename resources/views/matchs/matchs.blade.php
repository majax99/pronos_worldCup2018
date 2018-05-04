@extends('layouts.app')

@section('content')


@foreach ($matchs as $match)
{{dd($match->equipe)}}
                        @endforeach
    <div class="container" id="homepage">
        <div class = "row" style = "margin-top:50px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading panel-info">Matches</div>
                    @php ($i = 1)
                    <div class="panel-body">
                        @foreach ($matchs as $match)
                            @if ( $i <= 2 || $i == 5 || ($i>8 && $i<34 && $i%3 ==0 || $i==37 || $i == 41 || $i == 45))
                                <div class = "alert alert-success">
                                    <span>{{ \Carbon\Carbon::parse($match->date_match)->format('l d F Y')}}   </span>
                                </div>
                            @endif
                            <p class='clickable-row' data-href="{{url('matches',['id'=>$i])}}">
                                @if ($match->assists1 == 0)
                                    <span class = "pull-left" style = "width:40%;"> {{ \Carbon\Carbon::parse($match->date_match)->format('H:i')}}</span>
                                @else
                                    <span class = "pull-left text-success" style = "width:40%;" ><strong>FINISHED</strong> </span>
                                @endif
                                <span style= "text-align:center;">
                  <img  src = "/img/country/{{$match->team1}}.png">{{$match->team1}}
                                    @if ($match->assists1 == 0)
                                        VS
                                    @else
                                        <strong>{{$match->goals1}} - {{$match->goals2}} </strong>
                                    @endif

                                    {{$match->team2}}
                                    <img  src = "/img/country/{{$match->team2}}.png"></span>
                                <span class = "pull-right">  {{$match->location}}      </span><br>
                            </p>
                            @php ($i++)
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
            $(".clickable-row").hover(function() {
                $(this).css( 'cursor', 'pointer' )
                    .toggleClass("bg-info")
                    .siblings(".selected")
                    .removeClass("selected");
            });
        });</script>
@endsection
