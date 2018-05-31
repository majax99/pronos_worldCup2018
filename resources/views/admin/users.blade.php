@extends('layouts.app')

@section('content')
        <div class = "row">
            <h1 class = "col-12 text-center">Liste des membres</h1>
 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>id </th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Groupe</th>
        <th>Admin</th>
        <th>date création</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->pseudo}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->groupe}}</td>
        <td>{{$user->isAdmin}}</td>
        <td>{{$user->created_at}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>

        </div>
@endsection
