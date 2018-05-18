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
        $matchs = DB::table('matchs')
            ->leftJoin('pronostics', 'matchs.id', '=', 'pronostics.match_id')
            ->leftJoin('equipes as equipe1', 'matchs.equipe1', '=', 'equipe1.pays')
            ->leftJoin('equipes as equipe2', 'matchs.equipe2', '=', 'equipe2.pays')
            ->select('matchs.*','pronostics.pronostic1 as pronostic1','pronostics.pronostic2 as pronostic2', 'equipe1.id as id1', 'equipe2.id as id2'  )
            //->where('pronostics.user_id', '=',  auth()->user()->id )
            //->orWhere('pronostics.user_id', '=',  NULL)
            ->where('date_match',$signe, now())
            ->where('phase','=', $element)
            ->where(function($query) {
                /** @var $query Illuminate\Database\Query\Builder  */
                return $query->where('pronostics.user_id', '=',  auth()->user()->id)
                    ->orWhere('pronostics.user_id', '=',  NULL);
            })

            ->orderBy('date_match', 'ASC')
            ->get();
        return view('pronostics/match')->with('matchs', $matchs)
                                            ->with('choix', $choix);
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
        return redirect('pronostics')->with('success', "pronostics validés");
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
