<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pronostic;


class PronosticsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$matchs = DB::table('matchs')
        ->leftJoin('pronostics', 'matchs.id', '=', 'pronostics.match_id')
            ->leftJoin('equipes as equipe1', 'matchs.equipe1', '=', 'equipe1.pays')
            ->leftJoin('equipes as equipe2', 'matchs.equipe2', '=', 'equipe2.pays')
        ->select('matchs.*','pronostics.pronostic1 as pronostic1','pronostics.pronostic2 as pronostic2', 'equipe1.id as id1', 'equipe2.id as id2'  )
        ->where('pronostics.user_id', '=',  auth()->user()->id )
        ->where('date_match','>', now())
         ->orderBy('date_match', 'ASC')
        ->get();
        return view('pronostics/pronostics')->with('matchs', $matchs);*/
        return view('pronostics/pronostics');
    }


    public function afficherTour($element)
    {
        return view('pronostics/pronostic')->with('pronostic', $element);
    }

    public function afficherMatch($choix,$element)
    {
        if($choix == 'match_prono')
            $signe = '>';
        else if ($choix == 'match_end')
            $signe = '<';

        $prono_id  = DB::table('matchs')
            ->leftJoin('pronostics', 'matchs.id', '=', 'pronostics.match_id')
            ->where('pronostics.user_id','=', auth()->user()->id)
            ->where('matchs.phase2','=',$element)
            ->get();
        if (count($prono_id) == 0){
            $matchs = DB::table('matchs')
                ->leftJoin('equipes as equipe1', 'matchs.equipe1', '=', 'equipe1.pays')
                ->leftJoin('equipes as equipe2', 'matchs.equipe2', '=', 'equipe2.pays')
                ->select('matchs.*', 'equipe1.id as id1', 'equipe2.id as id2')
                //->where('pronostics.user_id', '=',  auth()->user()->id )
                //->orWhere('pronostics.user_id', '=',  NULL)
                ->where('date_match',$signe, now())
                ->where('phase2','=', $element)
                ->orderBy('date_match', 'ASC')
                ->get();
        }
        else{
            $matchs = DB::table('matchs')
                ->leftJoin('pronostics', 'matchs.id', '=', 'pronostics.match_id')
                ->leftJoin('equipes as equipe1', 'matchs.equipe1', '=', 'equipe1.pays')
                ->leftJoin('equipes as equipe2', 'matchs.equipe2', '=', 'equipe2.pays')
                ->select('matchs.*','pronostics.pronostic1 as pronostic1','pronostics.pronostic2 as pronostic2', 'equipe1.id as id1', 'equipe2.id as id2','pronostics.user_id as user_id'  )
                //->where('pronostics.user_id', '=',  auth()->user()->id )
                //->orWhere('pronostics.user_id', '=',  NULL)
                ->where('date_match',$signe, now())
                ->where('phase2','=', $element)
                ->where(function($query) {
                    /** @var $query Illuminate\Database\Query\Builder  */
                    return $query->where('pronostics.user_id', '=',  auth()->user()->id)
                        ->orWhere('pronostics.user_id', '=' , NULL);
                })

                ->orderBy('date_match', 'ASC')
                ->get();
        }


        if($choix == 'match_prono'){
            return view('pronostics/match_prono')->with('matchs', $matchs)
                ->with('choix', $choix);
        }
        else if ($choix == 'match_end'){


            $tableau_prono = [];
            $i = 0;
            foreach($matchs as $match){
                $tableau_prono[$i]['equipe1'] = $match->equipe1;
                $tableau_prono[$i]['equipe2'] = $match->equipe2;
                if (property_exists($match,'pronostic1')){
                    $tableau_prono[$i]['pronostic1'] = $match->pronostic1;
                }
                if (property_exists($match,'pronostic2')){
                    $tableau_prono[$i]['pronostic2'] = $match->pronostic2;
                }
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

                if (property_exists($match,'pronostic1') && property_exists($match,'pronostic2')) {
                    if (($match->resultat1 > $match->resultat2 && $match->pronostic1 > $match->pronostic2
                            || $match->resultat1 == $match->resultat2 && $match->pronostic1 == $match->pronostic2
                                    || $match->resultat1 < $match->resultat2 && $match->pronostic1 < $match->pronostic2)
                        && ($match->pronostic1 != NULL || $match->pronostic2 != NULL)) {
                        if (($match->resultat1 <> $match->pronostic1 && $match->resultat2 <> $match->pronostic2) &&
                            (($match->resultat1 - $match->resultat2) <> ($match->pronostic1 - $match->pronostic2)))
                            $tableau_prono[$i]['points'] = 3 * $multiplicateur + $points_8eme;
                        else if (($match->resultat1 == $match->pronostic1 && $match->resultat2 <> $match->pronostic2)
                            || ($match->resultat1 <> $match->pronostic1 && $match->resultat2 == $match->pronostic2))
                            $tableau_prono[$i]['points'] = 4 * $multiplicateur + $points_8eme;
                        else if (($match->resultat1 <> $match->pronostic1 && $match->resultat2 <> $match->pronostic2) &&
                            ($match->resultat1 - $match->resultat2 == $match->pronostic1 - $match->pronostic2))
                            $tableau_prono[$i]['points'] = 5 * $multiplicateur + $points_8eme;
                        else if ($match->resultat1 == $match->pronostic1 && $match->resultat2 == $match->pronostic2)
                            $tableau_prono[$i]['points'] = 8 * $multiplicateur + $points_8eme;
                    }
                    else
                        $tableau_prono[$i]['points']= 0;
                }
                else
                    $tableau_prono[$i]['points']= 0;
                $i++;
            }
            return view('pronostics/match_end')->with('matchs', $matchs)
                ->with('choix', $choix)
                ->with('tableau', $tableau_prono);
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donnees = $request->all();
        //dd($donnees);

        foreach($donnees as $key => $value){
            //echo $key.'<br>';
            //echo $value.'<br>';
            if ($key != '_token'){
                $num = substr($key,0,1);
                if ($num == 1){
                    $match_id = substr($key,10,strlen($key)-10);
                    $prono_id = DB::table('pronostics')
                        ->select('id'  )
                        ->where('pronostics.match_id' , '=', $match_id )
                        ->where('pronostics.user_id', '=',  auth()->user()->id )
                        ->get();
                    $prono1 = $value;
                }

                if ($num == 2 ){
                    if ($prono_id->count()) {
                        $prono = Pronostic::find(intval($prono_id[0]->id));
                        $prono->pronostic1 = $prono1;
                        $prono->pronostic2 = $value;
                    }
                    else{
                        $prono = new Pronostic;
                        $prono->pronostic1 = $prono1;
                        $prono->pronostic2 = $value;
                        $prono->user_id = auth()->user()->id;
                        $prono->match_id = $match_id;
                    }

                    $prono->save();
                }

                   // echo 'SAUVEGARDE AVEC id'.auth()->user()->id.' match_id '.$match_id.' prono1 '.$prono1.' prono2 '.$prono2. '<br>';

            }
        }
        return redirect('pronostics')->with('success', "Vos pronostics ont été validés");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
