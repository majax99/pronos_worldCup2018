



<div id="button2" class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="radio" name="options" id="tour1" autocomplete="off" checked> Tour1
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" id="tour2" autocomplete="off"> Tour2
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" id="tour3" autocomplete="off"> Tour3
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" id="Phase Finale" autocomplete="off"> Phase Finale
    </label>
</div>
<div id="choixMatch" class = "text-center">

</div>


<script>
    $("#button2 :input").change(function() {
        element2 = this.id;
        $.get('pronostic/match/'+element+'/'+element2, function( data ) {
            $('#choixMatch').html( data );
        });
    });
</script>