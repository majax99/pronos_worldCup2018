<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ReglesController extends Controller
{
    public function index()
    {
        return view('reglement/reglement');
    }
}