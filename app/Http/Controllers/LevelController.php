<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $levels = Level::all();
            return view('levels.index', compact('levels'));
        }
        else{
            return redirect('/');
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
        if (Auth::check()) {
            return view('levels.create');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => 'required'
        ]);
        
        // $fillable = array('make', 'model', 'produced_on');
        
        $level = new level([
            'description' => $request->get('description')
        ]);
        
        $level->save();
        return redirect('/levels')->with('success', 'level saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(level $level)
    {
        //
        if (Auth::check()) {
            return view('levels.edit', compact('level'));
        }
        else{
            return redirect('/');
        }
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
        if (Auth::check()) {
            $request->validate([
                'description' => 'required'
            ]);
            
            $level = Level::find($id);
            $level->description = $request->get('description');
            $level->save();
            
            return redirect('/levels')->with('success', 'level updated!');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        //
        if (Auth::check()) {
            
            $level->delete();
            return redirect('/levels')->with('success', 'level deleted!');
        }
        else{
            return redirect('/');
        }
    }
    
    
}
