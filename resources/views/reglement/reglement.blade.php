@extends('layouts.app')

@section('content')

    <div class = "row">
        <div class="col-10 d-block mx-auto">
            <div class="card ">
                <div class="card-header text-center bg-info text-white">Règlement</div>
                <div class="card-body ">
                    <div id="choixTour" class = "text-left" >
                        <ul class="list-group">
                            <li class="list-group-item">Pour chaque match il faut donner le score pour les 2 équipes</li>
                            <li class="list-group-item">Les pronostics peuvent être fait tant que le match n'est pas commencé</li>
                            <li class="list-group-item">A partir de la phase finale, il faut pronostiquer le score à la fin du match (prolongations incluses)
                                <br>
                                <strong>Exemple</strong>, il y a 1-1 entre la France et l'Argentine au bout de 90mn puis 3-1 pour la France à la fin des prolongations.<br> Si j'ai indiquer la France vainqueur, j'aurais des points sinon je n'aurais aucun point pour ce match.
                            </li>
                            <li class="list-group-item">
                                <strong > Tableau récapitulatif du comptage des points </strong><br><br>
                                <table class="table table-striped table-responsive-sm" >
                                    <thead class="thead-light">
                                    <tr >
                                        <th class = "text-center" scope="col">Niveau de la<br> compétition</th>
                                        <th class = "text-center" scope="col">Score <br> exact</th>
                                        <th class = "text-center" scope="col">Ecart <br> de buts</th>
                                        <th class = "text-center" scope="col">Bon score Pour <br> une des 2 équipes</th>
                                        <th class = "text-center" scope="col">Bon <br> vainqueur</th>
                                        <th class = "text-center align-middle" scope="col">Autre</th>
                                    </tr>
                                    </thead>
                                    <tbody class = "text-center " style = "font-size:1.4em;">
                                    <tr>
                                        <td style = "font-size:0.7em;">Phase de <br> poules</td>
                                        <td class = "align-middle " >8</td>
                                        <td class = "align-middle">5</td>
                                        <td class = "align-middle">4</td>
                                        <td class = "align-middle">3</td>
                                        <td class = "align-middle">0</td>
                                    </tr>
                                    <tr>
                                        <td style = "font-size:0.7em;">1/8 de finale</td>
                                        <td class = "align-middle">10</td>
                                        <td class = "align-middle">7</td>
                                        <td class = "align-middle">6</td>
                                        <td class = "align-middle">5</td>
                                        <td class = "align-middle">0</td>
                                    </tr>
                                    <tr>
                                        <td style = "font-size:0.7em;" >1/4 de finale</td>
                                        <td class = "align-middle">16</td>
                                        <td class = "align-middle">10</td>
                                        <td class = "align-middle">8</td>
                                        <td class = "align-middle">6</td>
                                        <td class = "align-middle">0</td>
                                    </tr>
                                    <tr>
                                        <td style = "font-size:0.7em;">1/2 finale</td>
                                        <td class = "align-middle">24</td>
                                        <td class = "align-middle">15</td>
                                        <td class = "align-middle">12</td>
                                        <td class = "align-middle">9</td>
                                        <td class = "align-middle">0</td>
                                    </tr>
                                    <tr>
                                        <td style = "font-size:0.7em;">Match pour la <br> 3ème place</td>
                                        <td class = "align-middle">24</td>
                                        <td class = "align-middle">15</td>
                                        <td class = "align-middle">12</td>
                                        <td class = "align-middle">9</td>
                                        <td class = "align-middle">0</td>
                                    </tr>
                                    <tr>
                                        <td style = "font-size:0.7em;">Finale</td>
                                        <td class = "align-middle">40</td>
                                        <td class = "align-middle">28</td>
                                        <td class = "align-middle">24</td>
                                        <td class = "align-middle">20</td>
                                        <td class = "align-middle">0</td>
                                    </tr>
                                    </tbody>
                                </table>


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection