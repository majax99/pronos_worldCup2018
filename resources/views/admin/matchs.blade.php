@extends('layouts.app')

@section('content')
        <div class = "row">
            <h1 class = "col-12 text-center">Liste des matchs</h1>
 <table class="table table-responsive">
    <thead class="thead-dark">
      <tr>
        <th class= "text-center">id </th>
        <th class= "text-center">Equipe 1</th>
        <th class= "text-center">Equipe 2</th>
        <th class= "text-center">type</th>
        <th class= "text-center">resultat1</th>
        <th class= "text-center">resultat2</th>
        <th class= "text-center">phase1</th>
        <th class= "text-center">phase2</th>
        <th class= "text-center">date_match</th>
        <th class= "text-center">lieu</th>
        <th class= "text-center">chaine_TV</th>
        <th class= "text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($matchs as $match)
      <tr>
        <td class= "text-center">{{$match->id}}</td>
        <td class= "text-center">{{$match->equipe1}}</td>
        <td class= "text-center">{{$match->equipe2}}</td>
        <td class= "text-center">{{$match->type}}</td>
        <td class= "text-center">{{$match->resultat1}}</td>
        <td class= "text-center">{{$match->resultat2}}</td>
        <td class= "text-center">{{$match->phase}}</td>
        <td class= "text-center">{{$match->phase2}}</td>
        <td class= "text-center">{{$match->date_match}}</td>
        <td class= "text-center">{{$match->lieu}}</td>
        <td class= "text-center">{{$match->chaine_TV}}</td>
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