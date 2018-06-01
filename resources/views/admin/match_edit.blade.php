@extends('layouts.app')

@section('content')
	<h1>Modifier le match</h1>
	{!! Form::open(['action' => ['AdminController@match_update', $match->id], 'method' => 'POST']) !!}
			<div class="form-group">	
				{{Form::label('Equipe 1', 'Equipe 1')}}
				{{form::text('equipe1', $match->equipe1, ['class' => 'form-control', 'placeholder' => 'Equipe 1'])}}
			</div>
			<div class="form-group">	
				{{Form::label('Equipe 2', 'Equipe 2')}}
				{{form::text('equipe2', $match->equipe2, ['class' => 'form-control', 'placeholder' => 'Equipe 2'])}}
			</div>
			<div class="form-group">	
				{{Form::label('Date du match', 'Date du match')}}
				{{form::text('date_match', $match->date_match, ['class' => 'form-control', 'placeholder' => 'date_match'])}}
			</div>
			<div class="form-group">	
				{{Form::label('Resultat1', 'Resultat1')}}
				{{form::text('resultat1', $match->resultat1, ['class' => 'form-control', 'placeholder' => 'Resultat 1'])}}
			</div>
			<div class="form-group">	
				{{Form::label('Resultat2', 'Resultat2')}}
				{{form::text('resultat2', $match->resultat2, ['class' => 'form-control', 'placeholder' => 'Resultat 2'])}}
			</div>	
			{{Form::hidden('_method','PUT')}}	
			{{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}	
	{!! Form::close() !!}
@endsection