@extends('layouts.app')

@section('content')
        <div class = "row" style = "margin-top:50px;">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card ">
                    <div class="card-header text-white mb-3 colorBlue"  >Equipes <span class = "float-right"><strong>Groupe {{$teams[0]->type}} </strong></span></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table id="tableProno" class="table table-condensed">
                                    <thead class="thead-dark">
                                    <th style="width:5%;"></th>
                                    <th class= "text-center" style="vertical-align:middle;"> Pays </th>
                                    <th class= "text-center d-none d-sm-block" style="vertical-align:middle;">Nom </th>
                                    <th class= "text-center" style="vertical-align:middle;"> Classement FIFA  </th>
                                    </thead>
                                    <tbody>
                                    @php ($i = 1)
                                    @foreach ($teams as $team)

                                        @if(isset($_GET['page']))
                                            @php( $j = $i + 8 * ($_GET['page'] - 1))
                                        @else
                                            @php( $j = $i )
                                        @endif
                                        @php($pays = str_replace("_", " ", $team->pays))
                                        <tr class='clickable-row' data-href="{{url('equipes',['id'=>$team->id])}}">

                                            <td class = "text-center"><img  src = "/img/country/{{$team->pays}}.png">                     </td>
                                            <td class = "text-center"> {{$pays}}                           </td>
                                            <td class = "text-center d-none d-sm-block"> {{$team->nom}}                             </td>
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
        <div class="col-md-8 offset-md-2">
            {{ $teams->links() }}
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script> jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
                $(".clickable-row").hover(function() {
                    $(this).css( 'cursor', 'pointer')
                        .toggleClass("colorBlue")
                        .siblings(".selected")
                        .removeClass("selected");
                });
            });
        </script>
@endsection
