@extends('layouts.app')

@section('content')
        <div class = "row">
            <h1 class = "col-12 text-center">Liste des membres</h1>
 <table class="table table-responsive ">
    <thead class="thead-dark">
      <tr>
        <th class= "text-center">id </th>
        <th class= "text-center">Pseudo</th>
        <th class= "text-center">Email</th>
        <th class= "text-center">Groupe</th>
        <th class= "text-center">Admin</th>
        <th class= "text-center">date création</th>
        <th class= "text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
        <td class= "text-center">{{$user->id}}</td>
        <td class= "text-center">{{$user->pseudo}}</td>
        <td class= "text-center">{{$user->email}}</td>
        <td class= "text-center">{{$user->groupe}}</td>
        <td class= "text-center">{{$user->isAdmin}}</td>
        <td class= "text-center">{{$user->created_at}}</td>
        <td class= "text-center">
            <a href = "/admin/user/{{$user->id}}/edit" ><i class="btn btn-info   fas fa-search"></i></a>
            {!!Form::open(['action' => ['AdminController@user_destroy', $user->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{ Form::button('<i class="fas fa-trash-alt" aria-hidden="true"></i>', ['class' => 'btn btn-danger  ', 'type' => 'submit']) }}
            {!!Form::close()!!}
      </tr>
      @endforeach
    </tbody>
  </table>

        </div>
@endsection
