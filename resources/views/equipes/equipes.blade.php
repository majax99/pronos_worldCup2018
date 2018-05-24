@extends('layouts.app')

@section('content')
        <div class = "row" style = "margin-top:50px;">
            <div class="col-10 col-offset-2">
                <div class="card ">
                    <div class="card-header text-white bg-success mb-3">Equipes</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="tableProno" class="table table-condensed">
                                    <thead class="thead-dark">
                                    <th style="width:5%;"></th>
                                    <th class= "text-center" style="vertical-align:middle;">Nom </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Pays </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Groupe </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Rang  </th>
                                    </thead>
                                    <tbody>
                                    @php ($i = 1)
                                    @foreach ($teams as $team)

                                        @if(isset($_GET['page']))
                                            @php( $j = $i + 8 * ($_GET['page'] - 1))
                                        @else
                                            @php( $j = $i )
                                        @endif
                                        <tr class='clickable-row' data-href="{{url('equipes',['id'=>$team->id])}}">

                                            <td class = "text-center"><img  src = "/img/country/{{$team->pays}}.png">                     </td>
                                            <td class = "text-center"> {{$team->nom}}                             </td>
                                            <td class = "text-center"> {{$team->pays}}                             </td>
                                            <td class = "text-center"> {{$team->type}}                             </td>
                                            <td class = "text-center"> {{$team->rang}}                             </td>

                                        </tr>
                                        @php ($i++)
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="text-center">
            {{ $teams->links() }}
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
            });
        </script>
@endsection
