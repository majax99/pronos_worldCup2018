<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs_end = DB::table('matchs')
            ->where('resultat1', '<>', NULL)
            ->orderBy('date_match', 'DESC')
            ->limit(6)
            ->get();

        $matchs_a_venir = DB::table('matchs')
            ->where('resultat1', '=', NULL)
            ->orderBy('date_match', 'ASC')
            ->limit(6)
            ->get();

        return view('home')->with('matchs_end', $matchs_end)->with('matchs_prono', $matchs_a_venir);
    }
}
