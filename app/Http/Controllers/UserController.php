<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(auth()->user()->id !== $user->id){
            return redirect('/')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page');
        }
        return view('user.show')->with('user', $user);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user/edit')->with('user', $user);
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
    	$user = User::find($id);
        $this->validate($request, [
            'email' => Rule::unique('users')->ignore($user->id)
        ]);

        
        $user->email = $request->input('email');
        $user->groupe = $request->input('groupe');
        $user->save();

        return redirect()->route('profil', [$user->id])->with('success','Le profil a bien été mis à jour');
    }



}
