@extends('layouts.app')

@section('content')
<a  href="/admin/users" class = "btn btn-secondary">Retour</a>
	<h1>Modifier le membre</h1>
	{!! Form::open(['action' => ['AdminController@user_update', $user->id], 'method' => 'POST']) !!}
			<div class="form-group">	
				{{Form::label('Pseudo', 'Pseudo')}}
				{{form::text('pseudo', $user->pseudo, ['class' => 'form-control', 'placeholder' => 'Pseudo'])}}
			</div>
			<div class="form-group">	
				{{Form::label('Email', 'Email')}}
				{{form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
			</div>
			<div class="form-group">	
				{{Form::label('Groupe', 'Groupe')}}
				{{form::text('groupe', $user->groupe, ['class' => 'form-control', 'placeholder' => 'Groupe'])}}
			</div>
			<div class="form-group">	
				{{Form::label('isAdmin', 'isAdmin')}}
				{{form::text('isAdmin', $user->isAdmin, ['class' => 'form-control', 'placeholder' => 'isAdmin'])}}
			</div>
			{{Form::hidden('_method','PUT')}}	
			{{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}	
	{!! Form::close() !!}
@endsection