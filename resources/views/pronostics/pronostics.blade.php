@extends('layouts.app')

@section('content')



    <div class="container" id="homepage">
        <div class = "row" style = "margin-top:50px;">
            <div class="col-12 d-block mx-auto">
                <div class="card ">
                    <div class="card-header text-center">Faire mes pronostics</div>


                    <div class="card-body ">
                        <div class = "text-center mb-3">
                            <div id="button" class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                                <label class="btn btn-secondary ">
                                    <input type="radio" name="options" id="match_end" autocomplete="off" > Matchs terminés
                                </label>
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="match_prono" autocomplete="off" checked> Matchs à pronostiquer
                                </label>
                            </div>
                        </div>
                            <div id="choixTour" class = "text-center" >

                            </div>
            </div>
        </div>
    </div>
</div>
    </div>

@endsection

@section('javascript')
<script>



        element = 'match_prono'; // points to the clicked input button
        $.get('pronostic/'+element, function( data ) {
            $('#choixTour').html( data );
        });
        var element2 = 'tour1' ;
            $.get('pronostic/match/'+element+'/'+element2, function( data ) {
                $('#choixMatch').html( data );
            });


    //var element = null ;
    $("#button :input").change(function() {
        element = this.id; // points to the clicked input button
        $.get('pronostic/'+element, function( data ) {
            $('#choixTour').html( data );
            var element2 = null ;
            $.get('pronostic/match/'+element+'/'+element2, function( data ) {
                    $('#choixMatch').html( data );
            });
            $("#button2 :input").change(function() {
                element2 = this.id;
                $.get('pronostic/match/'+element+'/'+element2, function( data ) {
                    $('#choixMatch').html( data );
                });
            });
        });
    });


$('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });
// Disable keyboard scrolling
$('input[type=number]').on('keydown',function(e) {
    var key = e.charCode || e.keyCode;
    // Disable Up and Down Arrows on Keyboard
    if(key == 38 || key == 40 ) {
    e.preventDefault();
    } else {
    return;
    }
});

  /*  $(document).ready(function(){
        $("#selectbasic").change(function () {
            $("#selectjour").remove();
            j = $("#selectbasic option:selected").val();
            $.get('bets/'+j, function( data ) {
                $('#bet_world').html( data );
            });
        })

    });*/
</script>
@endsection