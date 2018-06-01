@extends('layouts.app')

@section('content')
        <div class = "row">
            <h1 class = "col-12 text-center">Liste des matchs</h1>
 <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>id </th>
        <th>Equipe 1</th>
        <th>Equipe 2</th>
        <th>type</th>
        <th>resultat1</th>
        <th>resultat2</th>
        <th>phase1</th>
        <th>phase2</th>
        <th>date_match</th>
        <th>lieu</th>
        <th>chaine_TV</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($matchs as $match)
      <tr>
        <td>{{$match->id}}</td>
        <td>{{$match->equipe1}}</td>
        <td>{{$match->equipe2}}</td>
        <td>{{$match->type}}</td>
        <td>{{$match->resultat1}}</td>
        <td>{{$match->resultat2}}</td>
        <td>{{$match->phase}}</td>
        <td>{{$match->phase2}}</td>
        <td>{{$match->date_match}}</td>
        <td>{{$match->lieu}}</td>
        <td>{{$match->chaine_TV}}</td>
        <td><a href = "/admin/match/{{$match->id}}/edit" ><i class="btn btn-info fas fa-search"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
        <div class="col-md-8 offset-md-2">
            {{ $matchs->links() }}
        </div>
        </div>
@endsection