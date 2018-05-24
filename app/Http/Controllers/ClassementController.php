<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pronostic;
use DB;

class ClassementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
/*
 * Règle points
Score exact : 2-0
Score pronostiqué : 4-3 : 3points
Score pronostiqué : 3-0: 4 points
Score pronostiqué : 3-1 : 5points
Score pronostiqué : 2-0 : 8 points
Si moins de 20% des gens ont mis le score : *2

Pour les phases finales :
8eme : +2
¼ : *2
½ : *3
Finale : *4

*/
        $matchs = DB::table('pronostics')
        ->leftJoin('matchs', 'matchs.id', '=', 'pronostics.match_id')
        ->leftJoin('users', 'users.id', '=', 'pronostics.user_id')
        ->where('matchs.resultat1', '<>', NULL)
        ->where('users.groupe', '=', auth()->user()->groupe)
        ->get();
        $tableau_point = [];
        foreach($matchs as $match){
            if (!array_key_exists($match->pseudo, $tableau_point)){
                $tableau_point[$match->pseudo] = [];
                $tableau_point[$match->pseudo]['points'] = 0;
                $tableau_point[$match->pseudo]['resultats'] = 0;
                $tableau_point[$match->pseudo]['score_exact'] = 0;
            }

            if ($match->phase == '8eme')
                $points_8eme = 2;
            else
                $points_8eme = 0;

            // multiplicateur pour le calcul des points
            if ( in_array($match->phase,['tour1', 'tour2','tour3']))
                $multiplicateur = 1;
            else if ($match->phase == '8eme')
                $multiplicateur = 1;
            else if ($match->phase == 'quart')
                $multiplicateur = 2;
            else if ($match->phase == 'demi')
                $multiplicateur = 3;
            else if ($match->phase == '3eme_place')
                $multiplicateur = 3;
            else if ($match->phase == 'finale')
                $multiplicateur = 4;


                if (($match->resultat1 > $match->resultat2 && $match->pronostic1 > $match->pronostic2
                || $match->resultat1 = $match->resultat2 && $match->pronostic1 = $match->pronostic2
                || $match->resultat1 < $match->resultat2 && $match->pronostic1 < $match->pronostic2)
                && ($match->pronostic1 != NULL || $match->pronostic2 != NULL ))
                {
                    $tableau_point[$match->pseudo]['resultats']++;
                    if (($match->resultat1 <> $match->pronostic1 && $match->resultat2 <> $match->pronostic2) &&
                        (($match->resultat1 - $match->resultat2) <> ($match->pronostic1 - $match->pronostic2)))
                        $tableau_point[$match->pseudo]['points'] =$tableau_point[$match->pseudo]['points'] + 3*$multiplicateur + $points_8eme;
                    else if (($match->resultat1 == $match->pronostic1 && $match->resultat2 <> $match->pronostic2)
                    || ($match->resultat1 <> $match->pronostic1 && $match->resultat2 == $match->pronostic2))
                        $tableau_point[$match->pseudo]['points'] = $tableau_point[$match->pseudo]['points'] + 4*$multiplicateur + $points_8eme;
                    else if (($match->resultat1 <> $match->pronostic1 && $match->resultat2 <> $match->pronostic2) &&
                        ($match->resultat1 - $match->resultat2 == $match->pronostic1 - $match->pronostic2))
                        $tableau_point[$match->pseudo]['points'] =$tableau_point[$match->pseudo]['points']+  5*$multiplicateur + $points_8eme;
                    else if ($match->resultat1 == $match->pronostic1 && $match->resultat2 == $match->pronostic2){
                        $tableau_point[$match->pseudo]['points'] =$tableau_point[$match->pseudo]['points']+ 8*$multiplicateur + $points_8eme;
                        $tableau_point[$match->pseudo]['score_exact']++;
                    }
                }
                else
                    $tableau_point[$match->pseudo]['points'] =$tableau_point[$match->pseudo]['points'] + 0;
        }

        foreach ($tableau_point as $key => $row) {
            $points[$key]  = $row['points'];
            $score_exact[$key] = $row['score_exact'];
        }
    if (!empty($tableau_point))
        array_multisort($points, SORT_DESC,$score_exact, SORT_DESC, $tableau_point);

        return view('classement/classement')->with('classement', $tableau_point);
    }

    public function show($name)
    {
        $matchs = DB::table('pronostics')
            ->leftJoin('matchs', 'matchs.id', '=', 'pronostics.match_id')
            ->leftJoin('users', 'users.id', '=', 'pronostics.user_id')
            ->where('date_match','<', now())
            ->where('users.pseudo', '=', $name)
            ->orderBy('date_match', 'DESC')
            ->get();

        $tableau_prono = [];
        $i = 0;
        foreach($matchs as $match){
            $tableau_prono[$i]['equipe1'] = $match->equipe1;
            $tableau_prono[$i]['equipe2'] = $match->equipe2;
            $tableau_prono[$i]['pronostic1'] = $match->pronostic1;
            $tableau_prono[$i]['pronostic2'] = $match->pronostic2;
            $tableau_prono[$i]['resultat1'] = $match->resultat1;
            $tableau_prono[$i]['resultat2'] = $match->resultat2;
            if ($match->phase == '8eme')
                $points_8eme = 2;
            else
                $points_8eme = 0;

            // multiplicateur pour le calcul des points
            if ( in_array($match->phase,['tour1', 'tour2','tour3']))
                $multiplicateur = 1;
            else if ($match->phase == '8eme')
                $multiplicateur = 1;
            else if ($match->phase == 'quart')
                $multiplicateur = 2;
            else if ($match->phase == 'demi')
                $multiplicateur = 3;
            else if ($match->phase == '3eme_place')
                $multiplicateur = 3;
            else if ($match->phase == 'finale')
                $multiplicateur = 4;


            if (($match->resultat1 > $match->resultat2 && $match->pronostic1 > $match->pronostic2
                    || $match->resultat1 == $match->resultat2 && $match->pronostic1 == $match->pronostic2
                            || $match->resultat1 < $match->resultat2 && $match->pronostic1 < $match->pronostic2)
                && ($match->pronostic1 != NULL || $match->pronostic2 != NULL ))
            {
                if (($match->resultat1 <> $match->pronostic1 && $match->resultat2 <> $match->pronostic2) &&
                    (($match->resultat1 - $match->resultat2) <> ($match->pronostic1 - $match->pronostic2)))
                    $tableau_prono[$i]['points'] = 3*$multiplicateur + $points_8eme;
                else if (($match->resultat1 == $match->pronostic1 && $match->resultat2 <> $match->pronostic2)
                    || ($match->resultat1 <> $match->pronostic1 && $match->resultat2 == $match->pronostic2))
                    $tableau_prono[$i]['points'] =  4*$multiplicateur + $points_8eme;
                else if (($match->resultat1 <> $match->pronostic1 && $match->resultat2 <> $match->pronostic2) &&
                    ($match->resultat1 - $match->resultat2 == $match->pronostic1 - $match->pronostic2))
                    $tableau_prono[$i]['points']=  5*$multiplicateur + $points_8eme;
                else if ($match->resultat1 == $match->pronostic1 && $match->resultat2 == $match->pronostic2)
                    $tableau_prono[$i]['points'] =8*$multiplicateur + $points_8eme;
            }
            else
                $tableau_prono[$i]['points']= 0;

            $i++;
        }
            return view('classement/pronostic_user')->with('classement', $tableau_prono)->with('pseudo', $name);
    }


}
