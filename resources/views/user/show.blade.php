@extends('layouts.app')

@section('content')

    <div class = "row" style = "margin-top:50px;">
        <div class="col-12 col-md-8 col-lg-6 d-block mx-auto">
            <div class="card ">
                <div class="card-header text-center colorBlue text-white" ><h3>Profil</h3>
                </div>

                <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class= "text-center"><strong>Pseudo</strong></td>
                                    <td class="text-center">{{$user->pseudo}}</td>
                                </tr>
                                <tr>
                                    <td class= "text-center"><strong>Email</strong></td>
                                    <td class="text-center">{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td class= "text-center"><strong>Groupe</strong></td>
                                    <td class="text-center">{{$user->groupe}}</td>
                                </tr>
                                <tr>
                                    <td class= "text-center"><strong>Inscription</strong></td>
                                    <td class="text-center">Le {{Jenssegers\Date\Date::parse($user->created_at)->format('d/m/Y à H:i')}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a  href="/profil/{{$user->id}}/edit" class = "btn btn-warning text-white float-right">Editer mon profil</a>
                            <a  href="/" class = "btn btn-secondary ">Retour</a>
                        </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection