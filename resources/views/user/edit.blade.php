@extends('layouts.app')

@section('content')
    <h1>Editer mon profil</h1>
    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}
            <div class="form-group">    
            <h4> Pseudo : {{$user->pseudo}} </h4>
            </div>
            <div class="form-group">    
                {{Form::label('Email', 'Email')}}
                {{form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>  
            <div class="form-group">    
                {{Form::label('Groupe', 'Groupe')}}
                {{form::text('groupe', $user->groupe, ['class' => 'form-control', 'placeholder' => 'Groupe'])}}
            </div>  
            {{Form::hidden('_method','PUT')}}   
            {{Form::submit('Mettre à jour mon ptrofil', ['class'=> 'btn btn-primary'])}}   
    {!! Form::close() !!}
@endsection