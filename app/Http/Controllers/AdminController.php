<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Match;
use DB;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users_index()
    {
        $users = User::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->get();
        //$posts = Post::orderBy('title','desc')->take(1)->get();

        //$posts = Post::orderBy('created_at','desc')->paginate(10);
        //return view('posts.index')->with('posts', $posts);
        return view('admin/users')->with('users', $users);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function matchs_index()
    {
        $matchs = Match::orderBy('id','asc')->paginate(16);
        return view('admin/matchs')->with('matchs', $matchs);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function match_edit($id)
    {
        $match = Match::find($id);

        return view('admin/match_edit')->with('match', $match);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function match_update(Request $request, $id)
    {
        $this->validate($request, [
            'resultat1' => 'integer|min:0',
            'resultat2' => 'integer|min:0'
        ]);

        $match = Match::find($id);
        $match->equipe1 = $request->input('equipe1');
        $match->equipe2 = $request->input('equipe2');
        $match->date_match = $request->input('date_match');
        $match->resultat1 = $request->input('resultat1');
        $match->resultat2 = $request->input('resultat2');
        $match->save();

        return redirect('/admin/matchs')->with('success','Match updated');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }


        return view('posts.edit')->with('post', $post);
    }
}
